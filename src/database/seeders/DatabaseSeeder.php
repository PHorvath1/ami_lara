<?php

namespace Database\Seeders;

use DirectoryIterator;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        foreach (new DirectoryIterator(__DIR__) as $fileInfo) {
            if($fileInfo->isDot()) continue;
            if($fileInfo->getFilename() === 'DatabaseSeeder.php') continue;
            $this->call('Database\Seeders\\' . \Str::before($fileInfo->getFileName(), '.php'));
        }
    }
}
