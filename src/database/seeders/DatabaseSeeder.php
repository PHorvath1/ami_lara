<?php

namespace Database\Seeders;

use DirectoryIterator;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(BouncerSeeder::class);
    }
}
