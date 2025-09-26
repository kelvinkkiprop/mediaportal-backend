<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Main\MediaType;

class MediaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ['id'=>1, 'name'=>'Video', 'alias'=>null, 'created_at'=>now()],
            ['id'=>2, 'name'=>'Live', 'alias'=>'Livestream', 'created_at'=>now()],
            ['id'=>3, 'name'=>'Short', 'alias'=>null, 'created_at'=>now()],
        ];
        MediaType::insert($items);
    }
}
