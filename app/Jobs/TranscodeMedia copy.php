<?php

namespace App\Jobs;

use App\Models\Main\Media;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TranscodeMedia implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mediaId;

    /**
     * Create a new job instance.
     */
    public function __construct($mediaId)
    {
        $this->mediaId = $mediaId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $media = Media::find($this->mediaId);

        if (!$media) {
            return;
        }

        // Example: call FFmpeg or another transcoding service
        // This is just a placeholder — you'd plug in real ffmpeg logic here
        // For now, just mark media as processed
        $media->update([
            'status' => 'processed',
            'processed_path' => $media->src_path, // Replace with actual transcoded file path
        ]);
    }
}
