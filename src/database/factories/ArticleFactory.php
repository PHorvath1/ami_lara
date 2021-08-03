<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition() : array
    {
        return [
            'title' => $this->faker->sentence(),
            'abstract' => $this->faker->paragraph(),
            'article_state' => $this->faker->numberBetween(0, 2)
        ];
    }
}
