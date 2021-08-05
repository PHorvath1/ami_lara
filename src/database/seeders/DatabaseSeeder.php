<?php

namespace Database\Seeders;

use DirectoryIterator;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(VolumeSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(BouncerSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(RevisionSeeder::class);
        $this->call(TypeSeeder::class);

        $this->call(ArticleCategoriesSeeder::class);
        $this->call(ArticleTypeSeeder::class);
    }
}
