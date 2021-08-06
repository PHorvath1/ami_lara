<?php

namespace Database\Seeders;

use App\Models\Volume;
use Illuminate\Database\Seeder;

class VolumeSeeder extends Seeder
{
    public function run(): void
    {
        Volume::factory(30)->create();
    }
}
