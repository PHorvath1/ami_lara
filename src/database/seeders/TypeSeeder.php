<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        Type::factory(10)->create();
    }
}
