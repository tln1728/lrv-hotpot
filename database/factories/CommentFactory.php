<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
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
        // only add reply comments
        // $parentID = Comment::select('id') -> whereNull('parent_id') -> inRandomOrder() -> first() -> id;
        return [
            'user_id'           => User::select('id') -> inRandomOrder() -> first() -> id,
            // 'commentable_type'  => Comment::class,
            // 'commentable_id'    => $parentID,
            'content'           => fake()->sentence(),
            // 'parent_id'         => $parentID,
        ];
    }
}
