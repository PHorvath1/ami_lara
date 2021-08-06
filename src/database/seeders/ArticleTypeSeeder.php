<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Type;
use Illuminate\Database\Seeder;

class ArticleTypeSeeder extends Seeder
{
    public function run(): void
    {
        Article::all()->each(function (Article $article){
            /**@var Type $type */
            $type = Type::random();
            $article->type_id = $type->id;
            $article->save();
        });
    }
}
