<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        Type::factory(['name' => 'Research Paper', 'active' => true])->create();
        Type::factory(['name' => 'Methodological', 'active' => true])->create();
        Type::factory(['name' => 'Special', 'active' => false])->create();
    }
}
