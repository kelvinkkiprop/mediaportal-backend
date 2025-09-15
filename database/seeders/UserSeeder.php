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
            ['id'=>Str::uuid(),'first_name'=>'System','last_name'=>'Admin','username'=>'systemadmin','email'=>'admin@ict.go.ke','password'=>Hash::make('ICT@123'),'role_id'=>1,'status_id'=>2,'email_verified_at'=>now(),'created_at'=>now()],
            ['id'=>Str::uuid(),'first_name'=>'Super','last_name'=>'Admin','username'=>'superadmin','email'=>'superadmin@ict.go.ke','password'=>Hash::make('ICT@123'),'role_id'=>1,'status_id'=>2,'email_verified_at'=>now(),'created_at'=>now()],
            ['id'=>Str::uuid(),'first_name'=>'PCO','last_name'=>'1','username'=>'PCO1','email'=>'VIP1@ict.go.ke','password'=>Hash::make('ICT@123'),'role_id'=>3,'status_id'=>2,'email_verified_at'=>now(),'created_at'=>now()],
            ['id'=>Str::uuid(),'first_name'=>'VIP','last_name'=>'1','username'=>'VIP1','email'=>'PCO1@ict.go.ke','password'=>Hash::make('ICT@123'),'role_id'=>4,'status_id'=>2,'email_verified_at'=>now(),'created_at'=>now()],
            ['id'=>Str::uuid(),'first_name'=>'Citizen','last_name'=>'1','username'=>'citizen1','email'=>'citizen@ict.go.ke','password'=>Hash::make('ICT@123'),'role_id'=>5,'status_id'=>2,'email_verified_at'=>now(),'created_at'=>now()],
        ];

        User::insert($items);
    }
}


