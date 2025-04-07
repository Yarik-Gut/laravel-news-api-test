<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class ArticleCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Tech', 'Sport', 'Politics', 'Health', 'Entertainment'];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}
