<?php

namespace Database\Factories;

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
        $post_title = $this->faker->unique()->text();
        return [
            'title' => $post_title,
            'slug' => Str::slug($post_title),
            'body' => $this->faker->text(500),
        ];
    }
}
