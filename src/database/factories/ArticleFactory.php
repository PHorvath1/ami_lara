<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'summary' => $this->faker->paragraph(),
            'state' => $this->faker->numberBetween(0,2),
            'page_count' => $this->faker->numberBetween(10, 25),
            'article_type' => $this->faker->word(),
            'note' => $this->faker->text(),
            'language' => $this->faker->boolean(80) ? 'en' : 'hu',
            'category_id' => Category::random()->id
        ];
    }
}
