<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(BouncerSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(RevisionSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(VolumeSeeder::class);
        $this->call(VolumeArticlesSeeder::class);
        $this->call(UserArticleSeeder::class);
    }
}
