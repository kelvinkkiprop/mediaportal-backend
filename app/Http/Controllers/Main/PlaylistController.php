<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use Illuminate\Validation\Rule;
use App\Models\Main\Playlist;
use App\Models\Main\Type;
use App\Models\Main\MediaPlaylist;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MediaPlaylist::orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mCurrentUser = auth()->user();
        $fields = $request->validate([
            'name' => 'required|string|unique:playlists,name,'.$mCurrentUser->id,
            'type_id' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $item = Playlist::create([
            'user_id' => $mCurrentUser->id,
            'name' => $fields['name'],
            'type_id' => $fields['type_id'],
            'description' => $fields['description'],
        ]);

        $response =[
            'status' => 'success',
            'message' => 'Playlist created successfully',
            'item' => $item
        ];
        return response($response, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Playlist::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    //    $mCurrentUser = auth()->user();
       $fields = $request->validate([
            'name' => 'required|string|unique:playlists,id,'.$id,
            'type_id' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $item = Playlist::where('id', $id)->update([
            // 'user_id' => $mCurrentUser->id,
            'name' => $fields['name'],
            'type_id' => $fields['type_id'],
            'description' => $fields['description'],
        ]);

        $item = Playlist::with('mediaPlaylist')->find($id);
        return response([
            'status' => 'success',
            'message' => 'Playlist updated successfully',
            'data' => $item
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Playlist::find($id);
        $item->delete();

        $response =[
            'message' => 'Playlist removed successfully',
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
        $items = Playlist::where(function($query) use($term){
            $query->where('name','LIKE','%'.$term.'%');
            $query->orWhere('description','LIKE','%'.$term.'%');
        })->get();

        $response =[
            'status' => 'success',
            'message' => 'Playlist search complete',
            'data' => $items
        ];
        return response($response, 201);
    }


    /**
     * unpaginatedItems
     */
    public function unpaginatedItems()
    {
        $mCurrentUser = auth()->user();
        $playlists = Playlist::where('user_id', $mCurrentUser->id)->orderBy('name', 'asc')->get();
        $types = Type::orderBy('name', 'asc')->get();

        $response =[
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'playlists' => $playlists,
                'types' => $types,
            ]
        ];
        return response($response, 201);
    }







    /**
     * addItem
     */
    public function addItem(Request $request)
    {
       $fields = $request->validate([
            'playlist_id' => 'required|string',
            'media_id' => 'required|string',
        ]);

        $mCurrentUser = auth()->user();
        $item = MediaPlaylist::create([
            'user_id' => $mCurrentUser->id,
            'playlist_id' => $fields['playlist_id'],
            'media_id' => $fields['media_id'],
        ]);

        return response([
            'status' => 'success',
            'message' => 'Item added to the playlist',
            'data' => $item
        ],201);
    }


    /**
     * removeItem
     */
    public function removeItem(Request $request)
    {
       $fields = $request->validate([
            'playlist_id' => 'required|string',
            'media_id' => 'required|string',
        ]);

        $mCurrentUser = auth()->user();
        $item = MediaPlaylist::where('user_id', $mCurrentUser->id)->where('playlist_id', $fields['playlist_id'])->where('media_id', $fields['media_id'])->first();
        if ($item) {
            $item->delete();
        }

        $response =[
            'status' => 'success',
            'message' => 'Item removed from the playlist',
            'item' => $item
        ];
        return response($response, 201);
    }


}
