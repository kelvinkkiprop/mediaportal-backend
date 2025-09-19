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
            ['id'=>Str::uuid(),'first_name'=>'Super','last_name'=>'Admin','username'=>'superadmin','email'=>'superadmin1@ict.go.ke','password'=>Hash::make('ICT@123'),'role_id'=>1,'status_id'=>2,'email_verified_at'=>now(),'created_at'=>now()],
            ['id'=>Str::uuid(),'first_name'=>'System','last_name'=>'Admin','username'=>'systemadmin','email'=>'admin1@ict.go.ke','password'=>Hash::make('ICT@123'),'role_id'=>2,'status_id'=>2,'email_verified_at'=>now(),'created_at'=>now()],
            ['id'=>Str::uuid(),'first_name'=>'PCO','last_name'=>'1','username'=>'PCO1','email'=>'pco1@ict.go.ke','password'=>Hash::make('ICT@123'),'role_id'=>3,'status_id'=>2,'email_verified_at'=>now(),'created_at'=>now()],
            ['id'=>Str::uuid(),'first_name'=>'QA','last_name'=>'1','username'=>'QA1','email'=>'qa1@ict.go.ke','password'=>Hash::make('ICT@123'),'role_id'=>4,'status_id'=>2,'email_verified_at'=>now(),'created_at'=>now()],
            ['id'=>Str::uuid(),'first_name'=>'Public','last_name'=>'1','username'=>'public1','email'=>'public1@ict.go.ke','password'=>Hash::make('ICT@123'),'role_id'=>5,'status_id'=>2,'email_verified_at'=>now(),'created_at'=>now()],
        ];

        User::insert($items);
    }
}


