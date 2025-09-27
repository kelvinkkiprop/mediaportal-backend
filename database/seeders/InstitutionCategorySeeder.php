<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Settings\InstitutionCategory;

class InstitutionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default
        $items = [
            ['id'=>2, 'name'=>'Ministries', 'alias'=>'Ministries', 'created_at'=>now()],
            ['id'=>3, 'name'=>'State Departments', 'alias'=>'Departments', 'created_at'=>now()],
            ['id'=>4, 'name'=>'Government Agencies', 'alias'=>'Agencies', 'created_at'=>now()],
            ['id'=>1, 'name'=>'Counties', 'alias'=>'Counties', 'created_at'=>now()],
        ];
        InstitutionCategory::insert($items);
    }
}
