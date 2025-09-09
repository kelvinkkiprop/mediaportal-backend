<?php

namespace App\Jobs;

use App\Models\Main\Media;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Exception;

class GenerateThumbnail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mediaId;
    public $timeout = 3600; // Optional timeout

    public function __construct($mediaId)
    {
        $this->mediaId = $mediaId;
    }

    public function handle(): void
    {
        $media = Media::find($this->mediaId);
        if (!$media) {
            Log::error("Media not found", ['media_id' => $this->mediaId]);
            return;
        }

        $outputDir = storage_path("app/public/videos/processed/{$this->mediaId}");
        $outputDir = str_replace('\\', '/', $outputDir);
        if (!file_exists($outputDir)) mkdir($outputDir, 0755, true);

        $input = storage_path("app/public/{$media->src_path}");
        $input = str_replace('\\', '/', $input);
        $thumb = "{$outputDir}/thumbnail.jpg";

        $ffmpegPath = $this->getFFmpegPath();

        $cmd = "\"{$ffmpegPath}\" -i \"{$input}\" -ss 00:00:05 -vframes 1 \"{$thumb}\" -y 2>&1";

        $output = [];
        $returnVar = 0;

        exec($cmd, $output, $returnVar);

        if ($returnVar !== 0 || !file_exists($thumb)) {
            Log::error("FFmpeg failed to generate thumbnail", [
                'cmd' => $cmd,
                'output' => $output,
                'media_id' => $this->mediaId,
            ]);
            return;
        }

        $media->update(['thumbnail_path' => "videos/processed/{$this->mediaId}/thumbnail.jpg"]);
        Log::info("Thumbnail generated successfully", ['media_id' => $this->mediaId]);
    }

    private function getFFmpegPath(): string
    {
        // $possiblePaths = [
        //     env('FFMPEG_PATH'), // optionally set in .env
        //     'C:\\ffmpeg\\bin\\ffmpeg.exe',
        //     'C:\\Program Files\\ffmpeg\\bin\\ffmpeg.exe',
        //     'ffmpeg', // system PATH
        // ];

        $possiblePaths = [
            env('FFMPEG_PATH'), // optionally set in .env
            '/usr/bin/ffmpeg',  // typical path on Ubuntu/Debian
            '/usr/local/bin/ffmpeg',
            'ffmpeg',           // rely on PATH
            'C:\\ffmpeg\\bin\\ffmpeg.exe', // Windows
            'C:\\Program Files\\ffmpeg\\bin\\ffmpeg.exe',
        ];

        foreach ($possiblePaths as $path) {
            if (!$path) continue;

            if ($path === 'ffmpeg') {
                exec('where ffmpeg 2>nul', $output, $returnVar);
                if ($returnVar === 0 && !empty($output)) return 'ffmpeg';
            } elseif (file_exists($path)) {
                return $path;
            }
        }

        throw new Exception("FFmpeg not found. Please install FFmpeg and ensure it's accessible.");
    }

    public function failed(Exception $exception): void
    {
        Log::error("GenerateThumbnail job failed for media ID {$this->mediaId}: " . $exception->getMessage());
    }
}
