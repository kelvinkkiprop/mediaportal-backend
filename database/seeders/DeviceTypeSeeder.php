<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Settings\DeviceType;

class DeviceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ['id' => 1, 'name' => 'Laptop/Computer', 'alias' => 'Computer', 'created_at' => now()],
            ['id' => 2, 'name' => 'Phone/Smartphone', 'alias' => 'Phone', 'created_at' => now()],
            ['id' => 3, 'name' => 'Tablet', 'alias' => 'Tablet', 'created_at' => now()],
            ['id' => 4, 'name' => 'TV/Smart TV', 'alias' => 'TV', 'created_at' => now()],
            ['id' => 5, 'name' => 'Gaming Console', 'alias' => 'Console', 'created_at' => now()],
            ['id' => 6, 'name' => 'Other', 'alias' => 'Other', 'created_at' => now()],
        ];
        DeviceType::insert($items);
    }
}
