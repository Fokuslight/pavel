<?php

namespace Database\Factories;

use App\Models\Category;
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
        $title = fake()->sentence(4);
        $slug = Str::slug($title);
        return [
            'title' => $title,
            'slug' => $slug,
            'description' => fake()->text(300),
            'content' => fake()->realText(400),
            'category_id' => fake()->randomElement(Category::all()->pluck('id')->toArray()),
        ];
    }
}
