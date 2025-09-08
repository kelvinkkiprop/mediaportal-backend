<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class MediaController extends Controller
{

    public function stream($id, $file)
    {
        $path = storage_path("app/public/videos/processed/$id/$file");

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, Authorization');
    }

    // public function stream($videoId, $file)
    // {
    //     $path = "videos/processed/{$videoId}/{$file}";

    //     if (!Storage::disk('public')->exists($path)) {
    //         abort(404, "File not found");
    //     }

    //     return response()->file(storage_path("app/public/{$path}"))
    //         ->header('Access-Control-Allow-Origin', '*')
    //         ->header('Access-Control-Allow-Methods', 'GET, OPTIONS')
    //         ->header('Access-Control-Allow-Headers', 'Content-Type');
    // }


    public function streamMaster($videoId)
    {
        $path = "videos/processed/{$videoId}/master.m3u8";
        // return $path;
        if (!Storage::disk('public')->exists($path)) {
            abort(404, "Master playlist not found");
        }
        return response()->file(Storage::disk('public')->path($path), [
            'Content-Type' => 'application/vnd.apple.mpegurl'
        ]);
    }

    // e.g., 360p/index.m3u8, etc
    public function streamVariant($videoId, $resolution, $file)
    {
        $path = "videos/{$videoId}/{$resolution}/{$file}";

        if (!Storage::disk('public')->exists($path)) {
            abort(404, "Variant or segment not found");
        }

        $extension = pathinfo($file, PATHINFO_EXTENSION);

        $contentType = $extension === 'm3u8'
            ? 'application/vnd.apple.mpegurl'
            : 'video/MP2T';

        return response()->file(Storage::disk('public')->path($path), [
            'Content-Type' => $contentType
        ]);
    }







    public function streamOriginal($id): StreamedResponse
    {
        $path = "videos/originals/{$id}.mp4";

        // Use the disk where your files are actually stored
        $disk = 'public'; // change to 'private' if your videos are on private storage

        if (!Storage::disk($disk)->exists($path)) {
            abort(404, 'Video not found');
        }

        $fullPath = Storage::disk($disk)->path($path);

        return response()->stream(function () use ($fullPath) {
            $stream = fopen($fullPath, 'rb');
            fpassthru($stream);
            fclose($stream);
        }, 200, [
            'Content-Type' => 'video/mp4',
            'Accept-Ranges' => 'bytes'
        ]);
    }



    /**
     * Stream HLS playlist or segments
     *
     * @param string $id   Video folder ID
     * @param string $file File name (master.m3u8 or .ts segment)
     * @return StreamedResponse
     */
    public function streamHLS($id, $file): StreamedResponse
    {
        // Build path relative to storage disk
        $path = "videos/processed/{$id}/{$file}";

        // Files are under public disk
        $disk = 'public';

        if (!Storage::disk($disk)->exists($path)) {
            abort(404, 'File not found');
        }

        $fullPath = Storage::disk($disk)->path($path);

        // Determine content type
        $contentType = match(pathinfo($file, PATHINFO_EXTENSION)) {
            'm3u8' => 'application/vnd.apple.mpegurl',
            'ts'   => 'video/MP2T',
            default => 'application/octet-stream'
        };

        return response()->stream(function () use ($fullPath) {
            $stream = fopen($fullPath, 'rb');
            fpassthru($stream);
            fclose($stream);
        }, 200, [
            'Content-Type' => $contentType,
            'Accept-Ranges' => 'bytes',
        ]);
    }



    public function getProcessedPath($mediaId, $file)
{
    // Path relative to public disk
    $relativePath = "processed/{$mediaId}/{$file}";

    // Full path on disk
    $fullPath = Storage::disk('public')->path($relativePath);

    // Check if file exists
    if (!Storage::disk('public')->exists($relativePath)) {
        throw new \Exception("Processed file not found: {$relativePath}");
    }

    return $fullPath;
}

}
