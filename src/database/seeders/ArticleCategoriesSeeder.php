<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ArticleCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        Article::all()->each(function (Article $article){
            $categories = Category::sample(random_int(1, 10));
            foreach ($categories as $category) {
                $article->categories()->attach($category->id);
            }
            $article->save();
        });
    }
}
