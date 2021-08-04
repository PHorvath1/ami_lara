<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Revision;
use Illuminate\Database\Seeder;

class RevisionSeeder extends Seeder
{
    public function run(): void
    {
        Article::all()->each(function (Article $article){
            for ($i = 0; $i < random_int(1, 10); $i++){
                /** @var Revision $revision */
                $revision = Revision::factory()->make();
                $revision->article_id = $article->id;
                $revision->save();
            }
        });
    }
}
