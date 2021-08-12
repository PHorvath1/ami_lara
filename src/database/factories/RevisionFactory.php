<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Revision;
use Illuminate\Database\Eloquent\Factories\Factory;

class RevisionFactory extends Factory
{
    protected $model = Revision::class;

    public function definition() : array
    {
        return [
            'note' => $this->faker->text(),
            'pdf_path' => 'pdfs/example.pdf',
            'article_id' => Article::random()
        ];
    }
}
