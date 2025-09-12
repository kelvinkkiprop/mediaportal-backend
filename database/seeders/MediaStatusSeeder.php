<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Settings\MediaStatus;

class MediaStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ['id'=>1, 'name'=>'Pre-upload', 'alias'=>null, 'created_at'=>now()],
            ['id'=>2, 'name'=>'Queued', 'alias'=>null, 'created_at'=>now()],
            ['id'=>3, 'name'=>'Ready', 'alias'=>null, 'created_at'=>now()],
        ];
        MediaStatus::insert($items);
    }
}
