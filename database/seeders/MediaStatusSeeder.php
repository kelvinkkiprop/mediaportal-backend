<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Main\MediaStatus;

class MediaStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ['id'=>1, 'name'=>'Queued', 'alias'=>'Processing', 'created_at'=>now()],
            ['id'=>2, 'name'=>'Ready', 'alias'=>'Ready', 'created_at'=>now()],
            ['id'=>3, 'name'=>'Failed', 'alias'=>'Fail', 'created_at'=>now()],
        ];
        MediaStatus::insert($items);
    }
}
