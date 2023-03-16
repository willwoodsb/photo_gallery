<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $columns = [
            'name' => fake()->unique()->word . ' ' . fake()->unique()->word,
            'category_id' => Category::inRandomOrder()->first()->id
        ];
        $columns['slug'] = str_replace(' ', '-', strtolower($columns['name']));
        return $columns;
    }
}
