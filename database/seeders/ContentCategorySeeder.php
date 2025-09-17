<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use Illuminate\Support\Str;
use App\Models\Main\ContentCategory;

class ContentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Default
        $items = [
            ['id'=>Str::uuid(), 'name'=>'Committee Hearings',   'alias'=>null, 'created_at'=>now()],
            ['id'=>Str::uuid(), 'name'=>'Parliament Sessions',  'alias'=>null, 'created_at'=>now()],
            ['id'=>Str::uuid(), 'name'=>'Public Consultations', 'alias'=>null, 'created_at'=>now()],
            ['id'=>Str::uuid(), 'name'=>'Press Conferences',    'alias'=>null, 'created_at'=>now()],
            ['id'=>Str::uuid(), 'name'=>'National Campaigns',    'alias'=>null, 'created_at'=>now()],
            ['id'=>Str::uuid(), 'name'=>'Health & Safety',    'alias'=>null, 'created_at'=>now()],
            ['id'=>Str::uuid(), 'name'=>'Youth Engagement',    'alias'=>null, 'created_at'=>now()],
            ['id'=>Str::uuid(), 'name'=>'Training Content',    'alias'=>null, 'created_at'=>now()],
            ['id'=>Str::uuid(), 'name'=>'Documentaries',    'alias'=>null, 'created_at'=>now()],
            ['id'=>Str::uuid(), 'name'=>'Project Launches',    'alias'=>null, 'created_at'=>now()],
            ['id'=>Str::uuid(), 'name'=>'Progress Reports',    'alias'=>null, 'created_at'=>now()],
            ['id'=>Str::uuid(), 'name'=>'Innovation & ICT',    'alias'=>null, 'created_at'=>now()],
            ['id'=>Str::uuid(), 'name'=>'Sports & Culture',    'alias'=>null, 'created_at'=>now()],
            ['id'=>Str::uuid(), 'name'=>'National Events',    'alias'=>null, 'created_at'=>now()],
        ];
        ContentCategory::insert($items);
    }
}
