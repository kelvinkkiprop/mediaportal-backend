<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
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

        // Use public disk for chunks as well for consistency
        Storage::disk('public')->makeDirectory("uploads/chunks/$uploadId");

        Log::info('Upload initialized', [
            'upload_id' => $uploadId,
            'filename' => $request->filename,
            'title' => $request->title
        ]);

        return response()->json(['uploadId' => $uploadId]);
    }

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

            // Save media record
            $media = Media::create([
                'id'          => $uploadId,
                'title'       => $request->title,
                'description' => $request->description,
                'src_path'    => $finalPath, // This should be relative to storage/app/public/
                'file_size'   => $finalFileSize,
                'mime_type'   => 'video/mp4',
                'status_id'   => 0, // Uploaded, pending processing
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
