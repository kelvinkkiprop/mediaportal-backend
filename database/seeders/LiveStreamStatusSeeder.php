<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Main\LiveStreamStatus;

class LiveStreamStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ['id'=>1, 'name'=>'Scheduled', 'alias'=>null, 'created_at'=>now()],
            ['id'=>2, 'name'=>'Starting', 'alias'=>null, 'created_at'=>now()],
            ['id'=>3, 'name'=>'Live', 'alias'=>null, 'created_at'=>now()],
            ['id'=>4, 'name'=>'Ended', 'alias'=>null, 'created_at'=>now()],
            ['id'=>5, 'name'=>'Failed', 'alias'=>null, 'created_at'=>now()],
        ];
        LiveStreamStatus::insert($items);
    }
}
