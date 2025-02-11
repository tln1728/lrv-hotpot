<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
        public function definition(): array
        {
            $category_id = Category::select('id') -> inRandomOrder() -> first();

            return [
                'title'        => fake() -> sentence(),
                'category_id'  => $category_id,
                'user_id'      => User::factory() -> create(),
                'thumbnail' => 'http://picsum.photos/'.rand(700,1000),
                'slug' => fn (array $attributes) => Str::slug($attributes['title']),
                'content'   => fake() -> paragraphs(3,true),
                'tags'      => fake() -> words(3),
                'published' => fake() -> boolean(),
            ];
        }
}
