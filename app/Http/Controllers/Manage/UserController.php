<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Main\Media;
use App\Models\Main\Playlist;
use App\Models\Settings\Role;
use App\Models\Settings\UserStatus;
use App\Models\Settings\OrganizationCategory;
use App\Models\Settings\Organization;
// Notifications
use App\Mail\GenericMail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::orderBy('created_at', 'desc')->with(['role','status'])->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'role_id' => 'required|integer',
            'password' => 'required|string',

            'organization_category_id' => 'nullable|required_if:role_id,2,3|integer',
            'organization_id' => 'nullable|required_if:role_id,2,3|string',
        ]);

        $mCurrentUser = auth()->user();
        // $random_password = Str::random(6);
        $random_password = $fields['email'];
        $item = User::create([
            'first_name' => $fields['first_name'],
            'last_name' => $fields['last_name'],
            'email' => $fields['email'],
            'role_id' => $fields['role_id'],
            'password' => Hash::make($random_password),
            'remember_token' => Str::random(50),
            // "email_verified_at"=>date("Y-m-d H:i:s"),
            'status_id' => 2,

            'organization_category_id' => $fields['organization_category_id'],
            'organization_id' => $fields['organization_id'],
        ]);

         //Email
         $email = $item->email;
         $message = "<div>
            <p>Your email is: {$email}, and the password is: {$random_password}</p>
            <p>Click the button below to login.</p>
         </div>";
         $data = array(
            'name' => $item->first_name,
            'subject' => "Created Account",
            //  'url' => '/auth/login',
            'url' => config('app.url').'/auth/login',
            'btn-text' => 'Login',
            'message' => $message,
         );
         Mail::to($email)->send(new GenericMail($data));

        $response =[
            'status' => 'success',
            'message' => 'User created successfully',
            'item' => $item
        ];
        return response($response, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function show(string $id)
    {
        return User::with('role','status')->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $fields = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|unique:users,email,'.$id,
            'role_id' => 'required|integer',
            'status_id' => 'required|integer',
            // 'password' => 'required|string',
            'reset_password' => 'required|boolean',

            'organization_category_id' => 'nullable|required_if:role_id,2,3|integer',
            'organization_id' => 'nullable|required_if:role_id,2,3|string',
        ]);

        $mCurrentUser = auth()->user();
        $item = User::where('id', $id)->update([
            'first_name' => $fields['first_name'],
            'last_name' => $fields['last_name'],
            'email' => $fields['email'],
            'role_id' => $fields['role_id'],
            'status_id' => $fields['status_id'],

            'organization_category_id' => $fields['organization_category_id'],
            'organization_id' => $fields['organization_id'],
        ]);

        // $random_password = Str::random(6);
        $resetPassword = $fields['reset_password'];
        if($resetPassword==true){
            $fields1 = $request->validate([
                'password' => 'required|string',
            ]);
            $random_password = $fields1['password'];

            $item = User::find($id);
            $item->password = Hash::make($random_password);
            $item->save();

            //Email
            $email =  $fields['email'];
            $message = "<div>
            <p>Your email is: {$email}, and the password is: {$random_password}</p>
            <p>Click the button below to login.</p>
            </div>";
            $data = array(
                'name' =>  $fields['first_name'],
                'subject' => "Updated Account",
                // 'url' => '/auth/login',
                'url' => config('app.url').'/auth/login',
                'btn-text' => 'Login',
                'message' => $message,
            );
            Mail::to($email)->send(new GenericMail($data));
        }

        return response([
            'status' => 'success',
            'message' => 'User updated successfully',
            'data' => $item
        ],201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $item = User::find($id);
        $item->delete();

        $response =[
            'message' => 'User removed successfully',
            'item' => $item
        ];
        return response($response, 201);
    }


     /**
     * searchItems
     */
    public function searchItems(Request $request)
    {
        $fields = $request->validate([
            'search_term' => 'required|string'
        ]);

        $term = $fields['search_term'];
        $items = User::with(['role','status'])
        ->where(function($query) use($term){
            $query->where('first_name','LIKE','%'.$term.'%');
            $query->orWhere('last_name','LIKE','%'.$term.'%');
            $query->orWhere('email','LIKE','%'.$term.'%');
            $query->orWhere('role_id','LIKE','%'.$term.'%');
        })->orderBy('id', 'desc')->get();

        $response =[
            'status' => 'success',
            'message' => 'Users search complete',
            'items' => $items
        ];
        return response($response, 201);
    }


    /**
     * unpaginatedItems
     */
    public function unpaginatedItems()
    {
        $roles = Role::orderBy('id', 'asc')->get();
        $statuses = UserStatus::orderBy('name', 'asc')->get();
        $organization_categories = OrganizationCategory::orderBy('name', 'asc')->get();
        $organizations = Organization::orderBy('name', 'asc')->get();

        $response =[
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'roles' => $roles,
                'statuses' => $statuses,
                'organization_categories' => $organization_categories,
                'organizations' => $organizations,
            ]
        ];
        return response($response, 201);
    }


    /**
     * filterOrganizations
     */
    public function filterOrganizations(string $category_id)
    {
        return Organization::where('category_id', $category_id)->orderBy('name', 'asc')->get();
    }

    /**
     * analyticsItems
     */
    public function analyticsItems(string $id)
    {
        $my_total_media = Media::where('user_id', $id)->withCount(['likes', 'comments'])->get();
        $my_total_views = Media::where('user_id', $id)->sum('views');
        $my_total_likes = $my_total_media->sum('likes_count');
        $my_total_comments = $my_total_media->sum('comments_count');
        $my_total_memory = Media::where('user_id', $id)->sum('file_size');

        $total_media = Media::withCount(['likes', 'comments'])->get();
        $total_views = Media::sum('views');
        $total_likes = $total_media->sum('likes_count');
        $total_comments = $total_media->sum('comments_count');
        $total_memory = Media::sum('file_size');

        $total_memory_percentage  = $my_total_memory> 0 ? ($my_total_memory/$total_memory)*100 : 0;
        $total_media_percentage   = $my_total_media->count()> 0 ? ($my_total_media->count()/$total_media->count())*100 : 0;
        $total_comments_percentage= $my_total_likes> 0 ? ($my_total_likes/$total_likes)*100 : 0;
        $total_likes_percentage   = $my_total_comments> 0 ? ($my_total_comments/$total_comments)*100 : 0;
        $total_views_percentage   = $my_total_views> 0 ? ($my_total_views/$total_views)*100 : 0;

        $mYear = date('Y');
        $allMedia = Media::where('user_id',$id)->whereYear('created_at', $mYear)->withCount(['likes', 'comments'])->get()->groupBy(function ($media) {
            // Group_by_month_number(1–12)
            return (int) date('n', strtotime($media->created_at));
        });
        $months = [
            1 => 'jan', 2 => 'feb', 3 => 'march', 4 => 'april', 5 => 'may', 6 => 'june', 7 => 'july', 8 => 'aug', 9 => 'sept', 10 => 'oct', 11 => 'nov', 12 => 'dec',
        ];
        $media_per_month = $views_per_month = $likes_per_month = $comments_per_month = [];
        foreach ($months as $num => $key) {
            $collection = $allMedia[$num] ?? collect();
            $media_per_month[$key]    = $collection->count();
            $views_per_month[$key]    = $collection->sum('views');
            $likes_per_month[$key]    = $collection->sum('likes_count');
            $comments_per_month[$key] = $collection->sum('comments_count');
        }

        $data = [
            'my_total_views'   => $my_total_views,
            'my_total_media'   => $my_total_media->count(),
            'my_total_likes'   => $my_total_likes,
            'my_total_comments' => $my_total_comments,
            'my_total_memory' => $my_total_memory,

            'total_views'   => $total_views,
            'total_media'   => $total_media->count(),
            'total_likes'   => $total_likes,
            'total_comments' => $total_comments,
            'total_memory' => $total_memory,

            'total_memory_percentage'   => $total_memory_percentage,
            'total_media_percentage'   => $total_media_percentage,
            'total_likes_percentage'   => $total_likes_percentage,
            'total_comments_percentage'=> $total_comments_percentage,
            'total_views_percentage'=> $total_views_percentage,

            'media_per_month'=> $media_per_month,
            'views_per_month'=> $views_per_month,
            'likes_per_month'=> $likes_per_month,
            'comments_per_month'=> $comments_per_month,
        ];
        $response =[
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => $data
        ];
        return response($response, 201);
    }

    /**
     * mediaItems
     */
    public function mediaItems(string $id){
        return Media::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * playlistItems
     */
    public function playlistItems(string $id){
        $mCurrentUser = auth()->user();
        if($mCurrentUser->id != $id){
            return Playlist::with('mediaPlaylist')->where('user_id', $id)->where('type_id', 1)->orderBy('created_at', 'desc')->paginate(10);
        }
        return Playlist::with('mediaPlaylist')->where('user_id', $id)->orderBy('created_at', 'desc')->paginate(10);
    }

}
