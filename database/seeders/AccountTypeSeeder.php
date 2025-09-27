<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Settings\AccountType;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ['id'=>1, 'name'=>'Individual', 'alias'=>null, 'created_at'=>now()],
            ['id'=>2, 'name'=>'Institution', 'alias'=>null, 'created_at'=>now()],
        ];
        AccountType::insert($items);
    }
}
