<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ArticleTagSeeder extends Seeder
{
    public function run(): void
    {
        Article::all()->each(function (Article $article){
            $tags = Tag::sample(random_int(1, 10));
            foreach ($tags as $tag) {
                $article->tags()->attach($tag);
            }
        });
    }
}
