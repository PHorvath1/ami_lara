<?php

namespace Database\Seeders;

use App\Http\Middleware\TrustProxies;
use App\Models\Article;
use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $rp = new Type(['name' => 'Research Paper', 'active' => true]);
        $rp->save();

        $methodological = new Type(['name' => 'Methodological', 'active' => true]);
        $methodological->save();

        $special = new Type(['name' => 'Special', 'active' => false]);
        $special->save();
    }
}
