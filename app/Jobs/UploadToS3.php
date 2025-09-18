<?php

namespace App\Jobs;

use App\Models\Main\Media;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class UploadToS3 implements ShouldQueue
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
        if (!$media) return;

        $localDir = storage_path("app/public/videos/processed/{$this->mediaId}");
        if (!file_exists($localDir)) {
            \Log::error("Processed directory missing: {$localDir}");
            return;
        }

        // Loop through generated files
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($localDir, \FilesystemIterator::SKIP_DOTS)
        );

        foreach ($files as $file) {
            if ($file->isFile()) {
                $filePath = $file->getRealPath();
                $relativePath = str_replace($localDir . DIRECTORY_SEPARATOR, '', $filePath);
                $s3Path = "videos/processed/{$this->mediaId}/{$relativePath}";

                Storage::disk('s3')->put($s3Path, fopen($filePath, 'r+'));
            }
        }

        $media->update([
            'media_status_id'=> 3, // Uploaded
            'processed_path' => "videos/processed/{$this->mediaId}/master.m3u8",
        ]);
    }
}
