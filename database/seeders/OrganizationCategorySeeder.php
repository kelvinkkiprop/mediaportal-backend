<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Settings\OrganizationCategory;

class OrganizationCategorySeeder extends Seeder
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
            ['id'=>1, 'name'=>'Counties', 'created_at'=>now()],
            ['id'=>2, 'name'=>'Ministries', 'created_at'=>now()],
            ['id'=>3, 'name'=>'State Departments', 'created_at'=>now()],
            ['id'=>4, 'name'=>'Government Agencies', 'created_at'=>now()],
            ['id'=>5, 'name'=>'Private Companies', 'created_at'=>now()],
        ];
        OrganizationCategory::insert($items);
    }
}
