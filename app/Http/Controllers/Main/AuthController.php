<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Settings\UserDevice ;
// Notifications
use App\Mail\GenericMail;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * register
     */
    public function register(Request $request)
    {
        $fields = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'nullable|string|email|unique:users,email',
            'password' => 'required|string'
        ]);

        $verification_code = rand(1000,9999);
        $user = User::create([
            'first_name' => $fields['first_name'],
            'last_name' => $fields['last_name'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['password']),
            'remember_token' => Str::random(50),
            'verification_code' => $verification_code,
        ]);

        //  Email
         $email = $user->email;
         $message = "<div>
            <p>Welcome to our platform!</p>
            <p>Your account has been successfully created. Please find your login details below:</p>
            <p><b>Email:</b> {$user->email}<br> <b>Password:</b> {$fields['password']}</p>
            <p>Your email verification code is: <b>{$verification_code}</b></p>
            <p>Please click the button below to verify your email address and complete your registration:</p>
         </div>";

        // Email
         $data = array(
            'name' => $user->first_name,
            'subject' => "Verify Your New Account",
            // 'url' => '/auth/login',
            'url' => config('app.url').'/auth/login',
            'btn-text' => 'Login',
            'message' => $message,
            'file' => null,
            'file_name' => null
         );
         Mail::to($email)->send(new GenericMail($data));

        // token
        $token = $user->createToken('token')->plainTextToken;
        $data = [
            'user' => $user,
            'token' => $token,
        ];
        return response([
         'status' => 'success',
         'message' => 'Registration successful',
         'data' => $data
     ], 201);

    }

    /**
     * login
     */
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'device_type_id' => 'nullable|integer',
            'ip_address' => 'nullable|string',
        ]);

        $user = User::with(['role','status'])->where('email', $fields['email'])->first();
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'status' => 'failed',
                'message' => 'Incorrect credentials',
            ],201);

        }else if($user->status_id==3){ // Blocked
            return response([
                'status' => 'warning',
                'message' => 'Blocked account, contact system admin for assistance',
            ],201);
        }

        // SetStatus
        if($user->status_id==1){// Inactive
            $item = User::find($user->id);
            $item->status_id = 2;// Active
            $item->save();
        }

        $device = UserDevice::updateOrCreate(['user_id' => $user->id],[
            'user_id' => $user->id,
            'device_type_id' => $fields['device_type_id'],
            'ip_address' => $fields['ip_address'],
            'login_at' => now(),
        ]);

        // token
        $token = $user->createToken('token')->plainTextToken;
        $data = [
            'user' => $user,
            'token' => $token,
        ];
        return response([
            'status' => 'success',
            'message' => 'Login successful',
            'data' => $data
        ],201);

    }

    /**
     * logout
     */
    public function logout(Request $request)
    {
        // // Revoke all user tokens
        // $user = auth()->user();
        // $user->tokens()->delete();

        // Revoke current session token
        auth()->user()->tokens()->delete();

        return response([
            'status' => 'success',
            'message' => 'Logged out successfully',
        ],201);

    }


    /**
     * resetPassword
     */
    public function resetPassword(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();
        // return $user;
        if(!$user){
            return response([
                'status' => 'failed',
                'message' => 'User not found'
            ],201);

        }else{

             $email = $user->email;
             $message = "<div>
                <p>We received a request to reset the password for <b>{$user->email}</b></p>
                <p>Click the button below to reset your password.<p>
                <p>If you did not request a password reset, please ignore this email.</p>
             </div>";

             //Email
             $data = array(
                'name' => $user->first_name,
                'subject' => "Password Reset Request",
                // 'url' => '/auth/recover-password/'.encrypt($user->id),
                'url' => config('app.url').'/auth/recover-password/'.$user->id,
                'btn-text' => 'Reset Password',
                'message' => $message,
                'file' => null,
                'file_name' => null
             );
             Mail::to($email)->send(new GenericMail($data));

            return response([
                // 'user' => $user,
                'status' => 'success',
                'message' => 'Reset successful, check your email for further instructions'
            ],201);
        }

    }


    /**
     * recoverPassword
     */
    public function recoverPassword(Request $request)
    {
        $fields = $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'id' => 'required|string',
        ]);

        $item = User::find($fields['id']);
        if (!$item) {
            return response([
                'status' => 'failed',
                'message' => 'User not found.',
            ], 404);
        }

        $item->password = Hash::make($fields['password']);
        $item->status_id = 2;
        $item->email_verified_at = date('Y-m-d H:i:s');
        $item->save();

        return response([
            'status' => 'success',
            'message' => 'Password updated successfully'
        ],201);

    }


    /**
     * resendVerificationCode
     */
     public function resendVerificationCode()
     {
        $user = auth()->user();
        $verification_code = rand(1000,9999);

        $item = User::find($user->id);
        $item->verification_code = $verification_code;
        // Email
        $email = $user->email;
        $message = "<div>
            <p>Your verification code is: <b>{$verification_code}</b></p>
            <p>To complete your registration, please click the button below to verify your account:</p>
        </div>";

        // Email
        $data = array(
        'name' => $user->first_name,
        'subject' => "Verify Your Account",
        // 'url' => '/auth/verify-email',
        'url' => config('app.url').'/auth/verify',
        'btn-text' => 'Verify',
        'message' => $message,
        'file' => null,
        'file_name' => null
        );
        Mail::to($email)->send(new GenericMail($data));

        $item->save();

        // token
        $token = $user->createToken('token')->plainTextToken;
        $data = [
            'user' => $item,
            'token' => $token,
        ];
        return response([
            'status' => 'success',
            'message' => 'Code re-sent successfully',
            'data' => $data
        ], 201);

     }


    /**
     * verifyEmail
     */
    public function verifyEmail(Request $request)
    {
        $fields = $request->validate([
            'verification_code' => 'required|integer',
        ]);

        $user = auth()->user();
        $token = $user->createToken('token')->plainTextToken;
        $code = $fields['verification_code'];

        if($code!=$user->verification_code){
            return response([
                'status' => 'failed',
                'message' => 'Incorrect verification code'
            ],201);

        }else{
            $item = User::with(['role','status'])->find($user->id);
            $item->verification_code = $code;
            $item->status_id = 2;
            $item->email_verified_at = date('Y-m-d H:i:s');
            $item->save();

            $data = [
                'user' => $item,
                'token' => $token,
            ];

            return response([
                'status' => 'success',
                'message' => 'Verification successful',
                'data' => $data
            ],201);

        }

    }


    /**
     * changePassword
     */
    public function changePassword(Request $request)
    {
        $fields = $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $mCurrentUser = auth()->user();
        // Check_if_current_password_matches
        if (!Hash::check($fields['current_password'], $mCurrentUser->password)) {
        return response([
            'status' => 'error',
            'message' => 'Current password is incorrect'
        ], 403);
        }

        // Update
        $mCurrentUser->password = Hash::make($fields['password']);
        $mCurrentUser->save();

        return response([
        'status' => 'success',
        'message' => 'Password updated successfully'
        ], 201);
    }

}
