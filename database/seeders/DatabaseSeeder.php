<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::transaction(function () {
            Category::factory(5) -> hasPosts(3) -> create(); // +5 cate +15 posts(un author)   
            User::factory(5) -> hasPosts(10) -> create();    // +50 posts +5 users

            Post::factory(5) 
                -> hasAttached(
                    User::factory(2),  // +2 users each post
                    ['point' => 50],
                    'authors')
                -> hasComments(2)                      // +10 cmts
                -> create();                           // +5 posts 

            Comment::factory(15) -> create();   // +15 reply_cmts
        });

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '123',
            'role'     => User::ROLE_ADMIN
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '123',
            'role' => User::ROLE_USER
        ]);
    }
}