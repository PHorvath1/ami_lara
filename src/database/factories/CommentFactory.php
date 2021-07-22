<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition() : array
    {
        return [
            'content' => $this->faker->paragraph(),
            'review_num' => $this->faker->numberBetween(0,2)
        ];
    }
}
