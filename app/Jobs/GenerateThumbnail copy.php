<?php

namespace App\Jobs;

use App\Models\Main\Media;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Jobs\UploadToS3;
use Illuminate\Support\Facades\Log;

class GenerateThumbnail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mediaId;

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
        if (!file_exists($outputDir)) {
            mkdir($outputDir, 0755, true);
        }

        $input = storage_path("app/public/{$media->src_path}");
        $thumb = "{$outputDir}/thumbnail.jpg";

        // Use full path to ffmpeg if not in PATH
        $ffmpegPath = env('FFMPEG_PATH', 'ffmpeg'); // set FFMPEG_PATH in .env if needed
        $cmd = "\"{$ffmpegPath}\" -i \"{$input}\" -ss 00:00:05 -vframes 1 \"{$thumb}\"";

        $output = [];
        $returnVar = 0;

        exec($cmd . ' 2>&1', $output, $returnVar);

        if ($returnVar !== 0 || !file_exists($thumb)) {
            Log::error("FFmpeg failed to generate thumbnail", [
                'cmd' => $cmd,
                'output' => $output,
                'media_id' => $this->mediaId,
            ]);
            return;
        }

        $media->update(['thumbnail_path' => "videos/processed/{$this->mediaId}/thumbnail.jpg"]);

        // UploadToS3::dispatch($media->id);

        Log::info("Thumbnail generated successfully", ['media_id' => $this->mediaId]);
    }
}
