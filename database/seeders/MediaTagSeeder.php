<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use Illuminate\Support\Str;
use App\Models\Main\MediaTag;

class MediaTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ['id'=>Str::uuid(), 'name'=>'Live',                  'alias'=>null, 'created_at'=>now()],
            ['id'=>Str::uuid(), 'name'=>'BETA',                  'alias'=>null, 'created_at'=>now()],
            ['id'=>Str::uuid(), 'name'=>'Digital Transformation','alias'=>null, 'created_at'=>now()],
            ['id'=>Str::uuid(), 'name'=>'Citizen Services',      'alias'=>null, 'created_at'=>now()],
            ['id'=>Str::uuid(), 'name'=>'Huduma Kenya',          'alias'=>null, 'created_at'=>now()],
        ];
        MediaTag::insert($items);
    }
}
