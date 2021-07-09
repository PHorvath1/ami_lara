<?php

namespace Database\Seeders;

use App\Models\Volume;
use Illuminate\Database\Seeder;

class VolumeSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 30; $i++) {
            /** @var Volume $volume */
            $volume = Volume::factory()->make();
            $volume->release_year = random_int(2000, 2022);
            $volume->save();
        }
    }
}
