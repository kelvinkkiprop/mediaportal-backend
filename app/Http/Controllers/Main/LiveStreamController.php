<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Main\Media;

class LiveStreamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Media::with('liveStreamStatus')->where('type_id', 2)->orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $fields = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'scheduled_at' => 'required|string',
            'thumbnail' => 'required|file|image|max:2048',
        ]);

        $uuid = Str::uuid();
        // Build_output_dir_in_storage
        $outputDir = storage_path("app/public/videos/processed/{$uuid}");
        $outputDir = str_replace('\\', '/', $outputDir);
        File::ensureDirectoryExists($outputDir, 0755, true);

        // Move_uploaded_file_to_destination
        $uploadedFile = $request->file('thumbnail');
        $thumbPath = "{$outputDir}/thumbnail.jpg"; // always .jpg

        // Read_file_contents
        $imageData = file_get_contents($uploadedFile->getRealPath());
        // Create image resource from uploaded file
        $imageResource = imagecreatefromstring($imageData);
        if (!$imageResource) {
            return response()->json(['error' => 'Invalid image file'], 422);
        }
        // Convert_to_JPG_with_quality_90
        imagejpeg($imageResource, $thumbPath, 90);
        // Free_memory
        imagedestroy($imageResource);
        // Build_relative_path_for_DB
        $relativePath = "videos/processed/{$uuid}/thumbnail.jpg";

        $mCurrentUser = auth()->user();
        $item = Media::create([
            'id' => $uuid,
            'user_id' => $mCurrentUser->id,
            'title' => $fields['title'],
            'description' => $fields['description'],
            'scheduled_at' => $fields['scheduled_at'],
            // 'thumbnail' => $fields['thumbnail'],
            'stream_key' => bin2hex(random_bytes(16)),
            'type_id'=>2,
        ]);

        $response =[
            'status' => 'success',
            'message' => 'Live stream created successfully',
            'item' => $item
        ];
        return response($response, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $fields = $request->validate([
            'name' => 'required|string',
        ]);

        $item = Media::where('id', $id)->update([
            'name' => $fields['name'],
        ]);

        return response([
            'status' => 'success',
            'message' => 'Live stream updated successfully',
            'data' => $item
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

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
        $items = Media::where('type_id', 2)->where(function($query) use($term){
            $query->where('name','LIKE','%'.$term.'%');
            $query->orWhere('alias','LIKE','%'.$term.'%');
        })->get();

        $response =[
            'status' => 'success',
            'message' => 'Live stream search complete',
            'data' => $items
        ];
        return response($response, 201);
    }



    /**
     * verify_called_by_nginx_on_publish
     */
    public function verify(Request $request) {
        // nginx passes stream name, etc. Validate the stream key
        $name = $request->get('name'); // stream key used by publisher
        $item = Stream::where('stream_key', $name)->first();
        if (!$item){
            return response('Denied', 403);
        }
        $item->update([
            'live_stream_status_id'=>3 //Live
        ]);
        // optionally broadcast "stream started" via websockets
        return response('Allowed', 200);
    }


    /**
     * stop_called_by_nginx_on_stop
     */
    public function stop(Request $request) {
        $name = $request->get('name');
        $item = Stream::where('stream_key', $name)->first();
        if ($item) $item->update([
            'live_stream_status_id'=>4 //Ended
        ]);
        return response('OK', 200);
    }

}
