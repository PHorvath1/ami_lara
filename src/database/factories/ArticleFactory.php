<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->paragraph(),
            'summary' => $this->faker->paragraph(),
            'state' => $this->faker->randomElement([ 'SUBMITTED', 'UNDER_REVIEW', 'ACCEPTED', 'REJECTED' ])
        ];
    }
}
