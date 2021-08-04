<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        Article::all()->each(function (Article $article){
            /**@var Type $type */
            $type = Type::factory()->make();
            $article->type_id = $type->id;
            $article->save();
        });
    }
}
