<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    public function register(){}
    public function boot(){}

    /**
     * Takes an array of categories and attaches all to an article
     * @param string[] $category_names
     * @param Article $article
     */
    public static function attachAll(array $category_names, Article $article): void {
        foreach ($category_names as $category_name) {
            $category = Category::where('name', $category_name)->firstOrCreate(['name' => $category_name]);
            $article->categories()->attach($category);
        }
    }
}
