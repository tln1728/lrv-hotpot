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
            Category::factory(5) -> hasPosts(1) -> create(); // +5 cate +5 posts +5 users   
            User::factory(5) -> hasPosts(10) -> create();    // +50 posts +55 users

            Post::factory(40) 
                -> hasComments(2)   // +80 cmts
                -> create();        // +40 posts +40 users

            // Comment::factory(15) -> create();   // +15 cmts
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