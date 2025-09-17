<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\TagEnum;
// Add
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Jobs\TranscodeMedia;
use App\Models\Main\Media;
use App\Models\Main\MediaReaction;
use App\Models\Main\MediaComment;
use App\Models\Main\MediaHistory;
use App\Models\Main\ContentCategory;
use App\Models\Main\MediaCategory;
use App\Models\Main\MediaType;
use App\Models\Settings\Organization;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Media::with('status')->orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
        ]);

        $item = Media::create([
            'name' => $fields['name'],
        ]);

        $response =[
            'status' => 'success',
            'message' => 'Media created successfully',
            'item' => $item
        ];
        return response($response, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return Media::find($id);
        // $item = Media::with(['user', 'likes', 'dislikes','comments','comments.user'])->find($id);
        $item = Media::find($id);
        $item->increment('views');
        // return $item->refresh();
            // update
            $mCurrentUser = auth()->user();
            if ($mCurrentUser) {
                $latestHistory = MediaHistory::where('media_id', $id)->where('user_id', $mCurrentUser->id)->latest()->first();
                if (!$latestHistory && $mCurrentUser) {
                    // no_previous_history
                    MediaHistory::create([
                        'media_id' => $id,
                        'user_id'  => $mCurrentUser->id,
                    ]);
                } else {
                    // time_threshold_create_if_older_than_1_min i.e. lt(less_than)
                    if ($latestHistory->created_at->lt(now()->subMinutes(1))) {
                        MediaHistory::create([
                            'media_id' => $id,
                            'user_id'  => $mCurrentUser->id,
                        ]);
                    }
                }
            }
        return $item->refresh()->load(['user', 'likes', 'dislikes','comments','comments.user','categories']);

        // $item = Media::with(['user', 'likes', 'dislikes','comments','comments.user','categories'])->find($id);

        // // category_IDs
        // $categoryIDs = MediaCategory::where('media_id', $id)->pluck('category_id');
        // // media_IDs_in_those_categories
        // $relatedMediaIDs = MediaCategory::whereIn('category_id', $categoryIDs)->where('media_id', '!=', $id)->pluck('media_id');
        // // Fetch_records
        // $related = Media::whereIn('id', $relatedMediaIDs)->get();


        // $data = [
        //     'item' => $item,
        //     'related' => $related
        // ];
        // return $data;

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $fields = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'type_id' => 'required|integer',
            'category_id' => 'required|array',
            'date_produced' => 'required|date',
            'tags' => 'required|string',
            'organization_id' => 'required|string',
            'allow_comments' => 'required|boolean',
        ]);

        $mCurrentUser = auth()->user();
        $item = Media::where('id', $id)->update([
            'user_id' => $mCurrentUser->id,
            'title' => $fields['title'],
            'description' => $fields['description'],
            'type_id' => $fields['type_id'],
            'category_id' => $fields['category_id'],
            'date_produced' => $fields['date_produced'],
            'tags' => $fields['tags'],
            'organization_id' => $fields['organization_id'],
            'allow_comments' => $fields['allow_comments'],
        ]);

        // Update_all
        MediaCategory::where('media_id', $id)->delete();
        $mCategories = $fields['category_id'];
        if (!empty($mCategories)) {
            $insertData = [];
            foreach ($mCategories as $value) {
                $insertData[] = [
                    'media_id' => $id,
                    'category_id'    => $value,
                ];
            }
            MediaCategory::insert($insertData); //BulkInsert
        }


        return response([
            'status' => 'success',
            'message' => 'Media updated successfully',
            'data' => $item
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Media::find($id);
        //    // Delete
        //     $path_downloads = config('app.paths.file_download');
        //     $file_url = public_path($path_downloads.$item->customer_request);
        //     if(File::exists($file_url)){
        //         File::delete($file_url);
        //     }
            $originalsPublicPath = storage_path("app/public/videos/originals/{$item->id}.mp4");
            $processedPublicPath = storage_path("app/public/videos/processed/{$item->id}");
            // Delete_public_file_if_exists
            if (file_exists($originalsPublicPath)) {
                unlink($originalsPublicPath);
            }
            // Delete_directory_if_it_exists
            if (File::exists($processedPublicPath)) {
                File::deleteDirectory($processedPublicPath);
            }
        $item->delete();

        $response =[
            'message' => 'Media removed successfully',
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
        $items = Media::where(function($query) use($term){
            $query->where('name','LIKE','%'.$term.'%');
            $query->orWhere('alias','LIKE','%'.$term.'%');
        })->get();

        $response =[
            'status' => 'success',
            'message' => 'Media search complete',
            'data' => $items
        ];
        return response($response, 201);
    }

    /**
     * unpaginatedItems
     */
    public function unpaginatedItems()
    {
        $content_categories = ContentCategory::orderBy('name', 'asc')->get();
        $organizations = Organization::orderBy('name', 'asc')->get();
        $media_types = MediaType::orderBy('name', 'asc')->get();

        $response =[
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'content_categories' => $content_categories,
                'organizations' => $organizations,
                'media_types' => $media_types,
            ]
        ];
        return response($response, 201);
    }








    /**
     * myMedia
     */
    public function myMedia(string $id)
    {
        $user_id = $id;
        $my_playlists = Media::with(['mediaStatus'])->where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        $my_media = Media::with(['mediaStatus'])->where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        $live_streams = Media::with(['mediaStatus'])->where('user_id', $user_id)->where('type_id',2)->orderBy('created_at', 'desc')->get();
        $totals = Media::where('user_id', $user_id)->withCount(['likes', 'comments'])->get();
        $total_memory = Media::where('user_id', $user_id)->sum('file_size');
        $total_likes = $totals->sum('likes_count');
        $total_comments = $totals->sum('comments_count');
        $analytics = [
            'total_views'   => Media::where('user_id', $user_id)->sum('views'),
            'total_media'   => Media::where('user_id', $user_id)->count(),
            'total_likes'   => $total_likes,
            'total_comments'=> $total_comments,
            'total_memory'  => $total_memory
        ];

        $response =[
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'my_playlists' => $my_playlists,
                'my_media'     => $my_media,
                'live_streams' => $live_streams,
                'analytics'    => $analytics,
            ]
        ];
        return response($response, 201);
    }

    /**
     * react
     */
    public function react(Request $request, string $id)
    {
        $fields = $request->validate([
            'type_id' => 'required|in:1,2'
        ]);

        $reactionType = $fields['type_id'];
        $mCurrentUser = auth()->user();
        $reaction = MediaReaction::where('media_id', $id)->where('user_id', $mCurrentUser->id)->first();
        if ($reaction) {
            if ($reaction->type_id === $reactionType) {
                // Same_reaction_remove
                $reaction->delete();
                $status = 'removed';
            } else {
                // Different_reaction_update
                $reaction->update([
                    'type_id' => $reactionType
                ]);
                $status = 'updated';
            }
        } else {
            // No_reaction_yet_create_one
            $reaction = MediaReaction::create([
                'media_id' => $id,
                'user_id' => $mCurrentUser->id,
                'type_id' => $reactionType,
            ]);
            $status = 'created';
        }
        // // Retain_views_due_to_refresh
        // $item = Media::find($id);
        $item = Media::with(['user', 'likes', 'dislikes'])->find($id);
        // $item->views = $item->views-1;
        // $item->save();

        // $items = [
        //     'likes' => $item->likes()->count(),
        //     'dislikes' => $item->dislikes()->count(),
        // ];
        $response = [
            'status' => 'success',
            'message' => "Reaction {$status} successfully",
            'data' => $item
        ];
        return response($response, 201);
    }

    /**
     * likedMedia
     */
    public function likedMedia()
    {
        return MediaReaction::with(['media','media.user'])->where('type_id',1)->orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * historyMedia
     */
    public function historyMedia()
    {
        return MediaHistory::with(['media','media.user'])->orderBy('created_at', 'desc')->paginate(10);
    }

    /**
    * comment
    */
    public function comment(Request $request, $id)
    {
        $fields = $request->validate([
            'text' => 'required|string|max:500',
        ]);

        $mCurrentUser = auth()->user();
        $item = MediaComment::create([
            'user_id' => $mCurrentUser->id,
            'media_id' => $id,
            // 'parent_id' => $id,
            'text' => $fields['text']
        ]);

        $item = Media::with(['comments','comments.user','user', 'likes', 'dislikes'])->find($id);
        $response =[
            'status' => 'success',
            'message' => 'Comment added successfully',
            'data' => $item
        ];
        return response($response, 201);
    }





    /**
    * init
    */
    public function init(Request $request)
    {
        $request->validate([
            'filename' => 'required|string',
            'title'    => 'required|string|max:255',
        ]);

        $uploadId = Str::uuid()->toString();

        // Use public disk for chunks as well for consistency
        Storage::disk('public')->makeDirectory("uploads/chunks/$uploadId");

        Log::info('Upload initialized', [
            'upload_id' => $uploadId,
            'filename' => $request->filename,
            'title' => $request->title
        ]);

        return response()->json(['uploadId' => $uploadId]);
    }

    /**
    * chunk
    */
    public function chunk(Request $request)
    {
        $request->validate([
            'uploadId'   => 'required|string',
            'chunkIndex' => 'required|integer',
            'file'       => 'required|file',
        ]);

        $uploadId = $request->uploadId;
        $chunkIndex = $request->chunkIndex;
        $chunkPath = "uploads/chunks/{$uploadId}/chunk_{$chunkIndex}";

        // Use public disk consistently
        Storage::disk('public')->put($chunkPath, file_get_contents($request->file('file')));

        Log::debug("Chunk received", [
            'upload_id' => $uploadId,
            'chunk_index' => $chunkIndex,
            'chunk_size' => $request->file('file')->getSize()
        ]);

        return response()->json(['status' => 'chunk_received']);
    }

    /**
    * complete
    */
    public function complete(Request $request)
    {
        try {
            $request->validate([
                'uploadId'    => 'required|string',
                'totalChunks' => 'required|integer',
                'title'       => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);

            $uploadId = $request->uploadId;
            $totalChunks = $request->totalChunks;

            Log::info('Starting upload completion', [
                'upload_id' => $uploadId,
                'total_chunks' => $totalChunks
            ]);

            // Use public disk consistently
            $disk = Storage::disk('public');
            $finalPath = "videos/originals/{$uploadId}.mp4";

            // Ensure destination directory exists
            $disk->makeDirectory('videos/originals');

            // Get absolute path for file operations
            $absoluteFinalPath = $disk->path($finalPath);

            Log::info('Merging chunks to final file', [
                'final_path' => $finalPath,
                'absolute_path' => $absoluteFinalPath
            ]);

            // Open destination file for writing
            $outStream = fopen($absoluteFinalPath, 'wb'); // Use 'wb' to start fresh
            if (!$outStream) {
                throw new \Exception("Cannot open destination file for writing: {$absoluteFinalPath}");
            }

            $totalSize = 0;
            $missingChunks = [];

            // Merge all chunks
            for ($i = 0; $i < $totalChunks; $i++) {
                $chunkPath = "uploads/chunks/{$uploadId}/chunk_{$i}";

                if ($disk->exists($chunkPath)) {
                    $chunkAbsolutePath = $disk->path($chunkPath);
                    $inStream = fopen($chunkAbsolutePath, 'rb');

                    if (!$inStream) {
                        throw new \Exception("Cannot read chunk file: {$chunkPath}");
                    }

                    $chunkSize = stream_copy_to_stream($inStream, $outStream);
                    $totalSize += $chunkSize;
                    fclose($inStream);

                    Log::debug("Merged chunk {$i}", ['size' => $chunkSize]);
                } else {
                    $missingChunks[] = $i;
                }
            }

            fclose($outStream);

            if (!empty($missingChunks)) {
                throw new \Exception("Missing chunks: " . implode(', ', $missingChunks));
            }

            // Verify the final file exists and has content
            if (!file_exists($absoluteFinalPath)) {
                throw new \Exception("Final file was not created: {$absoluteFinalPath}");
            }

            $finalFileSize = filesize($absoluteFinalPath);
            if ($finalFileSize === 0) {
                throw new \Exception("Final file is empty");
            }

            Log::info('File merge completed successfully', [
                'final_size' => $finalFileSize,
                'total_chunks_size' => $totalSize
            ]);

            // Clean up temporary chunk files
            $disk->deleteDirectory("uploads/chunks/{$uploadId}");

            // Save_media_record
            $mCurrentUser = auth()->user();
            $media = Media::create([
                'id'             => $uploadId,
                'title'          => $request->title,
                'description'    => $request->description,
                'src_path'       => $finalPath, // This should be relative to storage/app/public/
                'file_size'      => $finalFileSize,
                'mime_type'      => 'video/mp4',
                'status_id'      => 1, // Uploaded, pending processing
                'user_id'        => $mCurrentUser->id,
                'media_status_id'=> 1, // Uploaded
            ]);

            Log::info('Media record created', [
                'media_id' => $media->id,
                'src_path' => $media->src_path,
                'file_size' => $finalFileSize
            ]);

            // Verify file is accessible before dispatching job
            $verifyPath = storage_path("app/public/{$finalPath}");
            if (!file_exists($verifyPath)) {
                Log::error('File not accessible at expected path', [
                    'expected_path' => $verifyPath,
                    'actual_path' => $absoluteFinalPath
                ]);
                throw new \Exception("File not accessible at expected path for transcoding");
            }

            // Dispatch transcoding job with a small delay to ensure file system has settled
            TranscodeMedia::dispatch($media->id)->delay(now()->addSeconds(2));

            Log::info('Transcoding job dispatched', ['media_id' => $media->id]);

            return response()->json([
                'success' => true,
                'media'   => $media,
                'status'  => 'upload_complete',
                'file_size' => $finalFileSize
            ]);

        } catch (\Exception $e) {
            Log::error('Upload completion failed', [
                'upload_id' => $request->uploadId ?? 'unknown',
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            // Clean up on failure
            if (isset($uploadId)) {
                Storage::disk('public')->deleteDirectory("uploads/chunks/{$uploadId}");
                if (isset($finalPath)) {
                    Storage::disk('public')->delete($finalPath);
                }
            }

            return response()->json([
                'success' => false,
                'error' => 'Upload failed: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Debug endpoint to check upload status
     */
    public function debug($uploadId)
    {
        $media = Media::find($uploadId);

        if (!$media) {
            return response()->json(['error' => 'Media not found'], 404);
        }

        $publicPath = storage_path("app/public/{$media->src_path}");
        $privatePath = storage_path("app/{$media->src_path}");

        return response()->json([
            'media' => $media,
            'paths' => [
                'src_path' => $media->src_path,
                'public_disk' => [
                    'path' => $publicPath,
                    'exists' => file_exists($publicPath),
                    'size' => file_exists($publicPath) ? filesize($publicPath) : 'N/A'
                ],
                'private_disk' => [
                    'path' => $privatePath,
                    'exists' => file_exists($privatePath),
                    'size' => file_exists($privatePath) ? filesize($privatePath) : 'N/A'
                ]
            ]
        ]);
    }

}
