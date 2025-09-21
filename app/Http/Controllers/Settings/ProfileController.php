<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Models\Main\InterestUser;
use App\Models\Main\SpecialityUser;
use App\Models\Manage\Interest;
use App\Models\Settings\ClassLevel;
use App\Models\Settings\Subject;
use App\Models\Settings\InstructorType;
use App\Models\Other\County;
use App\Models\Other\Constituency;
use App\Models\Other\Ward;

class ProfileController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'role_id' => 'required|integer',
            'first_name' => 'nullable|string|required_if:role_id,4',
            'last_name' => 'nullable|string|required_if:role_id,4',
            'username' => 'nullable|string|unique:users,username|required_if:role_id,4',
            'country_id' => 'nullable|integer',
            'class_level_id' => 'nullable|required_if:role_id,2,3|integer',
            'instructor_type_id' => 'nullable|required_if:role_id,3|integer',
            'institution_id' => 'nullable|required_if:role_id,3|integer',
            'dob' => 'nullable|required_if:role_id,2|date|before:today',
            'interests' => 'nullable|required_if:role_id,2|array',
            'specialities' => 'nullable|required_if:role_id,3|array',
        ]);

        $mCurrentUser = auth()->user();
        $user = null;
        if (!empty($fields['username'])) {
            $verification_code = rand(1000, 9999);
            $random_password = Str::random(6);
            $user = User::create([
                'first_name'         => $fields['first_name'],
                'last_name'          => $fields['last_name'],
                'username'           => $fields['username'],
                'parent_id'          => $mCurrentUser->id,
                'country_id'         => $fields['country_id'],
                // 'password'           => Hash::make($fields['password']),
                'password'           => Hash::make($random_password),
                'remember_token'     => Str::random(50),
                'verification_code'  => $verification_code,
                'created_at'         => now(),
            ]);
        }

         $item = User::where('id', $mCurrentUser->id)->update([
            'country_id'        => $fields['country_id'],
            'role_id'           => $fields['role_id'],
            'class_level_id'    => $fields['class_level_id'],
            'instructor_type_id'=> $fields['instructor_type_id'],
            'institution_id'    => $fields['institution_id'],
            'dob'               => $fields['dob'],
            'child_id'          => $user ? $user->id : null,
        ]);
        // return $item;

        $interestIds = Arr::wrap($fields['interests']);
        // Clear_everything_first
        InterestUser::where('user_id', $mCurrentUser->id,)->delete();
        foreach ($interestIds as $interestId) {
            InterestUser::updateOrCreate([
                'user_id' => $mCurrentUser->id,
                'interest_id' => $interestId,
            ],[
                'user_id' => $mCurrentUser->id,
                'interest_id' => $interestId,
            ]);
        }
        $specialitIds = Arr::wrap($fields['specialities']);
        // Clear_everything_first
        SpecialityUser::where('user_id', $mCurrentUser->id,)->delete();
        foreach ($specialitIds as $specialitId) {
            SpecialityUser::updateOrCreate([
                'user_id' => $mCurrentUser->id,
                'subject_id' => $specialitId,
            ],[
                'user_id' => $mCurrentUser->id,
                'subject_id' => $specialitId,
            ]);
        }

        $user = User::with(['role','status'])->find($mCurrentUser->id);
        $token = $user->createToken('token')->plainTextToken;
        $data = [
            'user' => $user,
            'token' => $token,
        ];
        return response([
            'status' => 'success',
            'message' => 'Profile created successfully',
            'data' => $data
        ],201);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fields = $request->validate([
            'phone' => 'required|numeric',
            'county_id' => 'required|integer',
            'constituency_id' => 'required|integer',
            'ward_id' => 'required|integer',
        ]);

        $mCurrentUser = auth()->user();
        $item = User::where('id', $id)->update([
            'phone' => $fields['phone'],
            'county_id' => $fields['county_id'],
            'constituency_id' => $fields['constituency_id'],
            'ward_id' => $fields['ward_id'],
        ]);
        return response([
            'status' => 'success',
            'message' => 'Profile updated successfully',
            'data' => $item
        ],201);

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::find($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = User::find($id);
        $item->delete();

        $response =[
            'message' => 'Profile removed successfully',
            'item' => $item
        ];
        return response($response, 201);
    }


    /**
     * updateNotifications
     */
    public function updateNotifications(Request $request)
    {
        $fields = $request->validate([
            'receive_notifications' => 'required|boolean',
        ]);

        $mCurrentUser = auth()->user();
        $item = User::where('id', $mCurrentUser->id)->update([
            // 'receive_notifications' => ($request['receive_notifications']=='on') ? true : false
            'receive_notifications' => $fields['receive_notifications'],
        ]);

        $user = User::with(['role','status'])->find($mCurrentUser->id);
        $token = $user->createToken('token')->plainTextToken;
        $data = [
            'user' => $user,
            'token' => $token,
        ];

        return response([
            'status' => 'success',
            'message' => 'Notifications updated successfully',
            'data' => $data
        ],201);
    }


    /**
     * updateAutoplay
     */
    public function updateAutoplay(Request $request)
    {
        $fields = $request->validate([
            'autoplay' => 'required|boolean',
        ]);

        $mCurrentUser = auth()->user();
        $item = User::where('id', $mCurrentUser->id)->update([
            // 'autoplay' => ($request['autoplay']=='on') ? true : false
            'autoplay' => $fields['autoplay'],
        ]);

        $user = User::with(['role','status'])->find($mCurrentUser->id);
        $token = $user->createToken('token')->plainTextToken;
        $data = [
            'user' => $user,
            'token' => $token,
        ];
        return response([
            'status' => 'success',
            'message' => 'Autoplay updated successfully',
            'data' => $data
        ],201);
    }



    /**
     * unpaginatedItems
     */
    public function unpaginatedItems()
    {
        // $interests = Interest::orderBy('name', 'asc')->get();
        $counties = County::orderBy('id', 'asc')->get();
        $constituencies = Constituency::orderBy('id', 'asc')->get();
        $wards = Ward::orderBy('id', 'asc')->get();

        $response =[
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'counties' => $counties,
                'constituencies' => $constituencies,
                'wards' => $wards,
            ]
        ];
        return response($response, 201);
    }

    /**
     * filterConstituencies
     */
    public function filterConstituencies($county_id)
    {
        return Constituency::where('county_id', $county_id)->orderBy('name', 'asc')->get();
    }

    /**
     * filterWards
     */
    public function filterWards($constituency_id)
    {
        return Ward::where('constituency_id', $constituency_id)->orderBy('name', 'asc')->get();
    }
}
