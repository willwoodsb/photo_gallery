<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $columns = ['name' => fake()->unique()->word . ' ' . fake()->unique()->word];
        $columns['slug'] = str_replace(' ', '-', strtolower($columns['name']));
        return $columns;
    }
}
