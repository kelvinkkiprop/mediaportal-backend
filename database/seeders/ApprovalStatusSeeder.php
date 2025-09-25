<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Settings\ApprovalStatus;

class ApprovalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ['id'=>1, 'name'=>'Under Review', 'alias'=>"Pending Review", 'created_at'=>now()],
            ['id'=>2, 'name'=>'Published', 'alias'=>'Approve', 'created_at'=>now()],
            ['id'=>3, 'name'=>'Rejected', 'alias'=>'Reject', 'created_at'=>now()],
            ['id'=>4, 'name'=>'Blocked', 'alias'=>'Block', 'created_at'=>now()],
        ];
        ApprovalStatus::insert($items);
    }
}
