<?php

namespace App\Jobs;

use App\Models\Main\Media;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Jobs\GenerateThumbnail;
use Exception;

class TranscodeMedia implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mediaId;
    public $timeout = 3600; // 1 hour timeout for video processing
    public $tries = 3;

    public function __construct($mediaId)
    {
        $this->mediaId = $mediaId;
    }

    public function handle(): void
    {
        try {
            $media = Media::find($this->mediaId);
            if (!$media) {
                Log::error("Media not found with ID: {$this->mediaId}");
                return;
            }

            // Update status to processing
            $media->update(['media_status_id' => 1]); // Processing
            Log::info("Starting transcoding for media ID: {$this->mediaId}");
            $this->transcodeVideo($media);

        } catch (Exception $e) {
            Log::error("TranscodeMedia job failed for media ID {$this->mediaId}: " . $e->getMessage());
            // Update media status to failed
            if ($media = Media::find($this->mediaId)) {
                $media->update(['media_status_id' => 3]); // Failed
            }
            throw $e; // Re-throw to trigger job retry if attempts remaining
        }
    }

    private function transcodeVideo(Media $media): void
    {
        // Validate input file exists
        $originalPath = $this->getOriginalFilePath($media);
        if (!$originalPath) {
            throw new Exception("Original video file not found for media ID: {$this->mediaId}");
        }

        // Create output directory with proper permissions
        $outputDir = $this->createOutputDirectory();
        // Define renditions
        $renditions = [
            ['name' => '360p', 'scale' => '640:360', 'bitrate' => '800k', 'maxrate' => '856k'],
            ['name' => '480p', 'scale' => '854:480', 'bitrate' => '1400k', 'maxrate' => '1498k'],
            ['name' => '720p', 'scale' => '1280:720', 'bitrate' => '2800k', 'maxrate' => '2996k'],
            ['name' => '1080p', 'scale' => '1920:1080', 'bitrate' => '5000k', 'maxrate' => '5350k'],
        ];
        // $renditions = [
        //     ['name' => '144p',  'scale' => '256:144',  'bitrate' => '200k',  'maxrate' => '214k'],
        //     ['name' => '240p',  'scale' => '426:240',  'bitrate' => '400k',  'maxrate' => '428k'],
        //     ['name' => '360p',  'scale' => '640:360',  'bitrate' => '800k',  'maxrate' => '856k'],
        //     ['name' => '480p',  'scale' => '854:480',  'bitrate' => '1400k', 'maxrate' => '1498k'],
        //     ['name' => '720p',  'scale' => '1280:720', 'bitrate' => '2800k', 'maxrate' => '2996k'],
        //     ['name' => '1080p', 'scale' => '1920:1080','bitrate' => '5000k', 'maxrate' => '5350k'],
        //     ['name' => '1440p', 'scale' => '2560:1440','bitrate' => '8000k', 'maxrate' => '8560k'],
        //     ['name' => '2160p', 'scale' => '3840:2160','bitrate' => '14000k','maxrate' => '15000k'],
        // ];


        $masterPlaylist = "#EXTM3U\n#EXT-X-VERSION:3\n";
        $successfulRenditions = [];

        foreach ($renditions as $rendition) {
            try {
                if ($this->createRendition($originalPath, $outputDir, $rendition)) {
                    $successfulRenditions[] = $rendition;

                    // Add to master playlist
                    $bandwidth = (int)preg_replace('/[^0-9]/', '', $rendition['bitrate']) * 1000;
                    $resolution = str_replace(':', 'x', $rendition['scale']);

                    $masterPlaylist .= "#EXT-X-STREAM-INF:BANDWIDTH={$bandwidth},RESOLUTION={$resolution}\n";
                    $masterPlaylist .= "{$rendition['name']}/index.m3u8\n";
                }
            } catch (Exception $e) {
                Log::warning("Failed to create {$rendition['name']} rendition: " . $e->getMessage());
                continue; // Continue with other renditions
            }
        }

        if (empty($successfulRenditions)) {
            throw new Exception("All renditions failed to process");
        }
        // Save master playlist
        $masterPlaylistPath = "{$outputDir}/master.m3u8";
        if (!file_put_contents($masterPlaylistPath, $masterPlaylist)) {
            throw new Exception("Failed to write master playlist");
        }

        // Update media record
        // $media->update([
        //     'media_status_id' => 2, // Ready
        //     'hls_master' => "videos/processed/{$this->mediaId}/master.m3u8",
        // ]);
        $media->hls_master = "videos/processed/{$this->mediaId}/master.m3u8";
        $media->media_status_id = 2;
        $media->save();

        Log::info("Successfully transcoded media ID: {$this->mediaId} with " . count($successfulRenditions) . " renditions");

        // Queue thumbnail generation
        GenerateThumbnail::dispatch($media->id);
    }

    private function getOriginalFilePath(Media $media): ?string
    {
        // Try multiple possible paths
        $possiblePaths = [
            storage_path("app/public/{$media->src_path}"),
            storage_path("app/{$media->src_path}"),
            public_path("storage/{$media->src_path}"),
        ];

        foreach ($possiblePaths as $path) {
            $normalizedPath = str_replace('\\', '/', $path);
            if (file_exists($normalizedPath) && is_readable($normalizedPath)) {
                Log::info("Found original file at: {$normalizedPath}");
                return $normalizedPath;
            }
        }

        Log::error("Original file not found. Tried paths: " . implode(', ', $possiblePaths));
        Log::error("Media src_path: {$media->src_path}");
        return null;
    }

    private function createOutputDirectory(): string
    {
        $outputDir = storage_path("app/public/videos/processed/{$this->mediaId}");
        $outputDir = str_replace('\\', '/', $outputDir);

        if (!file_exists($outputDir)) {
            if (!mkdir($outputDir, 0755, true)) {
                throw new Exception("Failed to create output directory: {$outputDir}");
            }
        }
        if (!is_writable($outputDir)) {
            throw new Exception("Output directory is not writable: {$outputDir}");
        }
        return $outputDir;
    }

    private function createRendition(string $inputPath, string $outputDir, array $rendition): bool
    {
        $renditionDir = "{$outputDir}/{$rendition['name']}";

        if (!file_exists($renditionDir)) {
            if (!mkdir($renditionDir, 0755, true)) {
                throw new Exception("Failed to create rendition directory: {$renditionDir}");
            }
        }

        $playlistPath = "{$renditionDir}/index.m3u8";
        $segmentPattern = "{$renditionDir}/fileSequence%d.ts";

        // Get FFmpeg path
        $ffmpegPath = $this->getFFmpegPath();

        // Build FFmpeg command with better error handling
        $cmd = sprintf(
            '"%s" -i "%s" ' .
            '-vf "scale=%s:force_original_aspect_ratio=decrease:force_divisible_by=2" ' .
            '-c:a aac -ar 48000 -ac 2 -ab 128k ' .
            '-c:v libx264 -profile:v main -level 3.1 ' .
            '-crf 23 -maxrate %s -bufsize %s ' .
            '-sc_threshold 0 -keyint_min 60 -g 60 ' .
            '-hls_time 6 -hls_playlist_type vod ' .
            '-hls_segment_filename "%s" ' .
            '"%s" -y 2>&1',
            $ffmpegPath,
            $inputPath,
            $rendition['scale'],
            $rendition['maxrate'] ?? $rendition['bitrate'],
            $this->calculateBufferSize($rendition['bitrate']),
            $segmentPattern,
            $playlistPath
        );

        Log::info("Executing FFmpeg command for {$rendition['name']}: " . $cmd);

        $output = [];
        $returnCode = 0;

        exec($cmd, $output, $returnCode);

        if ($returnCode !== 0) {
            $errorOutput = implode("\n", $output);
            Log::error("FFmpeg failed for {$rendition['name']}", [
                'cmd' => $cmd,
                'output' => $errorOutput,
                'return_code' => $returnCode
            ]);
            throw new Exception("FFmpeg processing failed for {$rendition['name']}: " . $errorOutput);
        }

        // Verify output files were created
        if (!file_exists($playlistPath) || filesize($playlistPath) === 0) {
            throw new Exception("Playlist file was not created or is empty: {$playlistPath}");
        }

        Log::info("Successfully created {$rendition['name']} rendition");
        return true;
    }

    private function getFFmpegPath(): string
    {
        // // Check multiple possible FFmpeg locations
        // $possiblePaths = [
        //     'C:\\ffmpeg\\bin\\ffmpeg.exe',
        //     'C:\\Program Files\\ffmpeg\\bin\\ffmpeg.exe',
        //     'ffmpeg', // System PATH
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
            if ($path === 'ffmpeg') {
                // Check if ffmpeg is in system PATH
                exec('where ffmpeg 2>nul', $output, $returnCode);
                if ($returnCode === 0 && !empty($output)) {
                    return 'ffmpeg';
                }
            } elseif (file_exists($path)) {
                return $path;
            }
        }
        Log::error("FFmpeg not found. Please install FFmpeg and ensure it's accessible");
        throw new Exception("FFmpeg not found. Please install FFmpeg and ensure it's accessible.");
    }

    private function calculateBufferSize(string $bitrate): string
    {
        $bitrateNum = (int)preg_replace('/[^0-9]/', '', $bitrate);
        $bufferSize = $bitrateNum * 2; // 2x bitrate for buffer
        return "{$bufferSize}k";
    }

    public function failed(Exception $exception): void
    {
        Log::error("TranscodeMedia job permanently failed for media ID {$this->mediaId}: " . $exception->getMessage());
        // Update media status to failed
        if ($media = Media::find($this->mediaId)) {
            $media->update(['media_status_id' => 3]); // Failed
        }
    }
}
