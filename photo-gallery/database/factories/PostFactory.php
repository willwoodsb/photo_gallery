<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SubCategory;

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
        $columns = [
            'title' => fake()->sentence(),
            'sub_category_id' => SubCategory::inRandomOrder()->first()->id,
            'photo' => 'https://picsum.photos/seed/'.fake()->unique()->word.'/1920/1080'
        ];

        $columns['slug'] = str_replace(' ', '-', strtolower($columns['title']));

        return $columns;
    }
}
