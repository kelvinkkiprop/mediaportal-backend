<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ['id'=>Str::uuid(),'first_name'=>'System','last_name'=>'Admin','username'=>'systemadmin','email'=>'admin@ict.go.ke','phone'=>'0794267685',
            'password'=>Hash::make('ICT@123'),'role_id'=>1,'status_id'=>2,'email_verified_at'=>now(),'remember_token'=>Str::random(50),'created_at'=>now()],
            ['id'=>Str::uuid(),'first_name'=>'Content','last_name'=>'Creator','username'=>'contentcreator','email'=>'creator@ict.go.ke','phone'=> null,
            'password'=>Hash::make('ICT@123'),'role_id'=>2,'status_id'=>2,'email_verified_at'=>now(),'remember_token'=>Str::random(50),'created_at'=>now()],
        ];

        User::insert($items);
    }
}


