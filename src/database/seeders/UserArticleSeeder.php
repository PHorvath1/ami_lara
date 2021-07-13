<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserArticleSeeder extends Seeder
{
    public function run(): void
    {
        User::all()->each(function (User $user) {
            $user->articles()->attach(Article::random());
            $user->save();
        });
    }
}
