<?php

namespace Database\Factories;

use App\Models\Volume;
use Illuminate\Database\Eloquent\Factories\Factory;

class VolumeFactory extends Factory
{
    protected $model = Volume::class;

    public function definition() : array
    {
        return [
            'title' => $this->faker->boolean(90) ? $this->faker->words(2, true) : null,
            'release_year' => $this->faker->year(),
            'description' => $this->faker->paragraph()
        ];
    }
}
