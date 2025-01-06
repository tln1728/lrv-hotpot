<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Comment::factory() chỉ tạo reply comment
        $user_id = fake()->randomElement(User::pluck('id'));
        $cmt     = fake()->randomElement(Comment::pluck('id'));

        return [
            'user_id'           => $user_id,
            'commentable_id'    => $cmt,
            'commentable_type'  => Comment::class,
            'comment'           => fake()->sentence(),
        ];
    }
}
