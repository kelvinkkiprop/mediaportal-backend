<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Main\Media;
use App\Models\Main\Organization;
use App\Models\Main\Payment;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    /**
     * analyticsItems
     */
    public function analyticsItems()
    {
        $mCurrentUser = auth()->user();
        $my_total_media = Media::where('user_id', $mCurrentUser->id)->withCount(['likes', 'comments'])->get();
        $my_total_views = Media::where('user_id', $mCurrentUser->id)->sum('views');
        $my_total_likes = $my_total_media->sum('likes_count');
        $my_total_comments = $my_total_media->sum('comments_count');
        $my_total_memory = Media::where('user_id', $mCurrentUser->id)->sum('file_size');

        $total_media = Media::withCount(['likes', 'comments'])->get();
        $total_views = Media::sum('views');
        $total_likes = $total_media->sum('likes_count');
        $total_comments = $total_media->sum('comments_count');
        $total_memory = Media::sum('file_size');

        $total_memory_percentage    = $my_total_memory> 0 ? ($my_total_memory/$total_memory)*100 : 0;
        $total_media_percentage    = $my_total_media->count()> 0 ? ($my_total_media->count()/$total_media->count())*100 : 0;
        $total_comments_percentage = $my_total_likes> 0 ? ($my_total_likes/$total_likes)*100 : 0;
        $total_likes_percentage    = $my_total_comments> 0 ? ($my_total_comments/$total_comments)*100 : 0;
        $total_views_percentage    = $my_total_views> 0 ? ($my_total_views/$total_views)*100 : 0;

        $mYear = date('Y');
        $allMedia = Media::where('user_id',$mCurrentUser->id)->whereYear('created_at', $mYear)->withCount(['likes', 'comments'])->get()
        ->groupBy(function ($media) {
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
     * insightsItems
     */
    public function insightsItems()
    {
        $data = [
            'total_users'       => User::count(),
            'total_media'       => Media::count(),
            'total_payments'    => Payment::where('status_id', 2)->sum('amount'),
            'total_organization'=> Organization::count(),
            'recent_users'      => User::with(['role','status','interests'])->orderBy('created_at', 'desc')->get()->take(5),
            'top_media'         => Media::with(['course'])->orderBy('views', 'desc')->take(5)->get(),
        ];

        return response([
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => $data
        ],201);
    }

}
