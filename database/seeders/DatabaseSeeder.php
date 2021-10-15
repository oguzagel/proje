<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Oğuz Demir',
            'email' => 'oguz@pikselist.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'), // password
            'remember_token' => Str::random(10),
        ]);

        //User::factory()->count(10)->create();
        //User::factory()->count(5)->create();
        //User::factory()->has(BlogPost::factory()->count(3))->count(5)->create();
        User::factory()->has(BlogPost::factory()->has(Comment::factory()->count(2))->count(3))->count(5)->create();

    }
}
