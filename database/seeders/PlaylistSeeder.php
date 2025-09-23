<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Main\Playlist;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = User::all();
        // Default
        $items = [
            ['id'=>Str::uuid(), 'user_id'=>$users[0]->id, 'name'=>'My Favorite', 'type_id'=>1,  'created_at'=>now()],
            ['id'=>Str::uuid(), 'user_id'=>$users[0]->id, 'name'=>'My Watch Later', 'type_id'=>1,  'created_at'=>now()],
            ['id'=>Str::uuid(), 'user_id'=>$users[0]->id, 'name'=>'Interviews', 'type_id'=>2,  'created_at'=>now()],
        ];
        Playlist::insert($items);
    }
}
