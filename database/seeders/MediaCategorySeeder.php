<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use Illuminate\Support\Str;
use App\Models\Main\MediaCategory;

class MediaCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Default
        $items = [
            ['id'=>Str::uuid(), 'name'=>'Art',          'alias'=>null, 'created_at'=>now()],
            ['id'=>Str::uuid(), 'name'=>'Documentary',  'alias'=>null, 'created_at'=>now()],
            ['id'=>Str::uuid(), 'name'=>'Experimental', 'alias'=>null, 'created_at'=>now()],
            ['id'=>Str::uuid(), 'name'=>'Film',         'alias'=>null, 'created_at'=>now()],
            ['id'=>Str::uuid(), 'name'=>'Music',        'alias'=>null, 'created_at'=>now()],
            ['id'=>Str::uuid(), 'name'=>'TV',           'alias'=>null, 'created_at'=>now()],
        ];
        MediaCategory::insert($items);
    }
}
