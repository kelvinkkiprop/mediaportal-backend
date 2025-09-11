<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Settings\UserStatus;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ['id'=>1, 'name'=>'Inactive', 'alias'=>'Deactivate', 'created_at'=>date('Y-m-d H:i:s')],
            ['id'=>2, 'name'=>'Active', 'alias'=>'Activate', 'created_at'=>date('Y-m-d H:i:s')],
            ['id'=>3, 'name'=>'Blocked', 'alias'=>'Block', 'created_at'=>date('Y-m-d H:i:s')],
        ];
        UserStatus::insert($items);
    }
}
