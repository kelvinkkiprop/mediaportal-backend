<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            UserStatusSeeder::class,
            RoleSeeder::class,
            CountySeeder::class,
            ConstituencySeeder::class,
            WardSeeder::class,
            OrganizationCategorySeeder::class,
            OrganizationSeeder::class,
            CategorySeeder::class,
            MediaTypeSeeder::class,
            MediaLiveStreamSeeder::class,
            MediaStatusSeeder::class,
            LiveStreamStatusSeeder::class,
            ApprovalStatusSeeder::class,
        ]);


    }
}
