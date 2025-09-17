<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use App\Models\User;
use App\Models\Main\Media;
use App\Models\Main\Organization;
use App\Models\Main\Payment;

class DashboardController extends Controller
{

    /**
    * index
    */
    public function index()
    {
        $data = [
            'total_users'       => User::count(),
            'total_media'       => Media::count(),
            'total_payments'    => Payment::where('status_id', 2)->sum('amount'),
            'total_institutions'=> Organization::count(),
            'recent_users'      => User::with(['role','status','interests'])->orderBy('created_at', 'desc')->get()->take(5),
            'top_media'         => Media::with(['course'])->orderBy('views', 'desc')->take(5)->get(),
        ];

        return response([
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => $data
        ],201);
    }

    /**
    * searchSuggestions
    */
    public function searchSuggestions(Request $request)
    {
        // $q = strtolower($request->query('q', ''));
        // $data = [
        //     'Angular tutorial1',
        //     'Angular autocomplete',
        //     'YouTube search style',
        //     'Debounce input in Angular',
        //     'RxJS subject example',
        //     'TypeScript best practices',
        //     'Angular dropdown component',
        //     'Component communication',
        //     'Keyboard navigation list',
        //     'Recent searches',
        //     'Query suggestions'
        // ];
        // $filtered = collect($data)->filter(fn ($item) => str_contains(strtolower($item), $q))->values()->take(8);
        // return response()->json($filtered);

        $q = strtolower($request->query('q', ''));
        $results = Media::query()->whereRaw('LOWER(title) LIKE ?', ['%' . $q . '%'])->limit(8)->get(['id', 'title']);
        return response()->json($results);
    }

    /**
    * index2
    */
    public function index2()
    {
        $mCurrentUser = auth()->user();
        // $myInterests  = InterestUser::with('interest')->where('user_id', $mCurrentUser->id)->get();
        // if($mCurrentUser->role_id==1){
        //     $myInterests = InterestUser::with('interest')->distinct()->get();
        // }
        $data = [
            'latest_media'      => Media::orderBy('created_at', 'desc')->limit(5)->get(), // Latest
            'featured_media'    => Media::orderBy('views', 'desc')->limit(5)->get(), // Top Views
            // 'recommended_media' => Media::inRandomOrder()->limit(5)->get(), // Random
        ];
        return response([
             'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => $data
        ],201);
    }

}
