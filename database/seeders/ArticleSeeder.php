<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\Category;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $categoryIds = Category::pluck('id')->toArray();
        for ($i = 0; $i < 20; $i++) {
            Article::create([
                'title' => $faker->sentence,
                'text' => $faker->paragraphs(3, true),
                'photo' => 'images/news' . rand(1, 5) . '.jpg',
                'likes' => $faker->numberBetween(0, 2000000),
                'category_id' => $faker->randomElement($categoryIds),
            ]);
        }
    }
}
