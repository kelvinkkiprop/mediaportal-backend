<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Main\Media;

class MediaLiveStreamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $uuid = Str::uuid();
        // Build_output_dir_in_storage
        $outputDir = storage_path("app/public/videos/processed/{$uuid}");
        $outputDir = str_replace('\\', '/', $outputDir);

        // Ensure_directory_exists
        File::ensureDirectoryExists($outputDir, 0755, true);
        $source = public_path('images/live_resume_shortly.png');
        $thumb = "{$outputDir}/thumbnail.jpg";

        // Copy_image_as_thumbnail
        File::copy($source, $thumb);
        // Default
        $users = User::all();
        $items = [
            ['id'=>$uuid, 'user_id'=>$users[0]->id, 'title'=>'Test Live Stream', 'description'=>'<p>Test description</p>', 'scheduled_at'=>now(), 'type_id'=>2,
            'live_stream_key_hash'=>'https://demo.unified-streaming.com/k8s/features/stable/video/tears-of-steel/tears-of-steel.ism/.m3u8', 'created_at'=>now()],
        ];
        Media::insert($items);
    }
}
