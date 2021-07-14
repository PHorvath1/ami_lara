<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\ServiceProvider;

class TagServiceProvider extends ServiceProvider
{
    public function register(){}
    public function boot(){}

    /**
     * Takes an array of tags and attaches all to an article
     * @param string[] $tag_names
     * @param Article $article
     */
    public static function attachAll(array $tag_names, Article $article): void {
        foreach ($tag_names as $tag_name) {
            $tag = Tag::where('name', $tag_name)->firstOrCreate(['name' => $tag_name]);
            $article->tags()->attach($tag);
        }
    }
}
