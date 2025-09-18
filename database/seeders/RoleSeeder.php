<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Settings\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ['id'=>1, 'name'=>'Super Admin','created_at'=>now()],
            ['id'=>2, 'name'=>'Admin','created_at'=>now()],
            ['id'=>3, 'name'=>'PCO/PIO','created_at'=>now()],
            ['id'=>4, 'name'=>'QA','created_at'=>now()],
            ['id'=>5, 'name'=>'Public','created_at'=>now()],
        ];
        Role::insert($items);
    }
}
