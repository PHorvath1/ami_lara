<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 50; $i++){
            /** @var Article $article */
            $article = Article::factory()->make();
            $article->save();
        }
    }
}
