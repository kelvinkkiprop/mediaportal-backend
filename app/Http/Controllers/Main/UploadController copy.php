<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use Illuminate\Support\Facades\Storage;
use App\Models\Main\Media;
use App\Jobs\TranscodeMedia;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function init(Request $request)
    {
        $request->validate([
            'filename' => 'required|string',
            'title'    => 'required|string|max:255',
        ]);
        $uploadId = Str::uuid()->toString();
        Storage::disk('local')->makeDirectory("uploads/chunks/$uploadId");
        return response()->json(['uploadId' => $uploadId]);
    }

    public function chunk(Request $request)
    {
        $request->validate([
            'uploadId'   => 'required|string',
            'chunkIndex' => 'required|integer',
            'file'       => 'required|file',
        ]);
        $chunkPath = "uploads/chunks/{$request->uploadId}/chunk_{$request->chunkIndex}";
        Storage::disk('local')->put($chunkPath, file_get_contents($request->file('file')));
        return response()->json(['status' => 'chunk_received']);
    }

    public function complete(Request $request)
    {
        $request->validate([
            'uploadId'    => 'required|string',
            'totalChunks' => 'required|integer',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $disk     = Storage::disk('private'); // use private disk instead of local
        $uploadId = $request->uploadId;
        $final    = "videos/originals/{$uploadId}.mp4";

        // Make sure destination directory exists
        $disk->makeDirectory('videos/originals');

        // Open destination file for writing
        $out = $disk->path($final); // absolute path on local disk
        $outStream = fopen($out, 'ab');

        for ($i = 0; $i < $request->totalChunks; $i++) {
            $chunkPath = "uploads/chunks/$uploadId/chunk_$i";

            if ($disk->exists($chunkPath)) {
                $inStream = fopen($disk->path($chunkPath), 'rb');
                stream_copy_to_stream($inStream, $outStream);
                fclose($inStream);
            }
        }

        fclose($outStream);

        // Clean up temporary chunk files
        $disk->deleteDirectory("uploads/chunks/$uploadId");

        // Save media record
        $media = Media::create([
            'id'          => $uploadId,
            // 'user_id'     => $request->user()->id,
            'title'       => $request->title,
            'description' => $request->description,
            // 'status'      => 'queued',
            'src_path'    => $final,
        ]);

        // Dispatch transcoding job
        TranscodeMedia::dispatch($media->id);

        return response()->json([
            'media'  => $media,
            'status' => 'upload_complete'
        ]);
    }

}
