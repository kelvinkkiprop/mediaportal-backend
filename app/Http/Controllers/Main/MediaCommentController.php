<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use App\Models\Main\MediaComment;
use App\Models\Main\Media;

class MediaCommentController extends Controller
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
        $fields = $request->validate([
            'media_id' => 'required|string',
            'text' => 'required|string|max:500',
        ]);

        $mCurrentUser = auth()->user();
        $mediaID = $fields['media_id'];
        $item = MediaComment::create([
            'user_id' => $mCurrentUser->id,
            'media_id' => $mediaID,
            // 'parent_id' => $id,
            'text' => $fields['text']
        ]);

        $comment = MediaComment::with('user')->find($item->id);
        $item = Media::with('user')->find($mediaID);
         $data = [
            'item' => $item,
            'comment' => $comment,
        ];

        $response =[
            'status' => 'success',
            'message' => 'Comment added successfully',
            'data' => $data
        ];
        return response($response, 201);

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
        $fields = $request->validate([
            'text' => 'required|string|max:500',
        ]);
        $item = MediaComment::where('id', $id)->update([
            'text' => $fields['text'],
        ]);

        $comment = MediaComment::with('user')->find($id);
        return response([
            'status' => 'success',
            'message' => 'Comment updated successfully',
            'data' => $comment
        ],201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = MediaComment::with('media')->find($id);
        $item->delete();

        $response =[
            'message' => 'Comment removed successfully',
            'item' => $item
        ];
        return response($response, 201);
    }


    /**
     * filteredMediaComments
     */
    public function filteredMediaComments(string $id)
    {
        return MediaComment::with(['user'])->orderBy('created_at', 'desc')->where('media_id', $id)->paginate(10);
    }

}
