<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Featured;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::factory(1)->create();

        Category::factory()->create([
            'name' => 'Adventure',
            'slug' => 'adventure'
        ]);
        Category::factory()->create([
            'name' => 'Elements',
            'slug' => 'elements'
        ]);
        Category::factory()->create([
            'name' => 'Sport',
            'slug' => 'sport'
        ]);
        Category::factory()->create([
            'name' => 'Lifestyle',
            'slug' => 'lifestyle'
        ]);
        Category::factory()->create([
            'name' => 'Team Clambin',
            'slug' => 'team-clambin'
        ]);
        //SubCategory::factory(30)->create();
        //Post::factory(100)->create();
        //foreach (Category::all() as $category) {

        //     Featured::factory()->create([
        //         'post_id' => $category->posts->random()->id,
        //     ]);
        // }
    }
}
