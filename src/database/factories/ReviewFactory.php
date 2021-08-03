<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition() : array
    {
        return [
            'state' => $this->faker->numberBetween(0,6),
            'content' => $this->faker->paragraph()
        ];
    }
}
