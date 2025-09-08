<?php

namespace App\Jobs;

use App\Models\Main\Media;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GenerateThumbnail;

class TranscodeMedia implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mediaId;

    public function __construct($mediaId) {
        $this->mediaId = $mediaId;
    }

    public function handle(): void
    {
        $media = Media::find($this->mediaId);
        if (!$media) return;

        $disk = app()->environment('production') ? 's3' : 'public';
        $originalPath = Storage::disk($disk)->path($media->src_path);
        $outputDir = storage_path("app/public/videos/processed/{$this->mediaId}");

        if (!file_exists($outputDir)) {
            mkdir($outputDir, 0777, true);
        }

        $renditions = [
            ['name'=>'360p','scale'=>'640:360','bitrate'=>'800k'],
            ['name'=>'480p','scale'=>'854:480','bitrate'=>'1400k'],
            ['name'=>'720p','scale'=>'1280:720','bitrate'=>'2800k'],
            ['name'=>'1080p','scale'=>'1920:1080','bitrate'=>'5000k'],
        ];

        $masterPlaylist = "#EXTM3U\n";

        foreach ($renditions as $r) {
            $renditionDir = "{$outputDir}/{$r['name']}";
            if (!file_exists($renditionDir)) mkdir($renditionDir, 0777, true);

            $playlistPath = "{$renditionDir}/index.m3u8";

            $cmd = "ffmpeg -i {$originalPath} -vf scale={$r['scale']} "
                 . "-c:a aac -ar 48000 -c:v h264 -profile:v main "
                 . "-crf 20 -sc_threshold 0 "
                 . "-b:v {$r['bitrate']} -maxrate {$r['bitrate']} -bufsize 2M "
                 . "-hls_time 6 -hls_playlist_type vod "
                 . "-hls_segment_filename {$renditionDir}/fileSequence%d.ts "
                 . "{$playlistPath} -y";

            exec($cmd);

            $bw = preg_replace('/[^0-9]/','',$r['bitrate']) * 1000;
            $masterPlaylist .= "#EXT-X-STREAM-INF:BANDWIDTH={$bw},RESOLUTION={$r['scale']}\n";
            $masterPlaylist .= "{$r['name']}/index.m3u8\n";
        }

        file_put_contents("{$outputDir}/master.m3u8", $masterPlaylist);

        $media->update([
            'status_id' => 2, // Ready
            'hls_master'=>"videos/processed/{$this->mediaId}/master.m3u8"
        ]);

        // Queue_thumbnail_job
        GenerateThumbnail::dispatch($media->id);
    }
}
