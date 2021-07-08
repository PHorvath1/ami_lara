<?php

namespace Database\Factories;

use App\Models\Revision;
use Illuminate\Database\Eloquent\Factories\Factory;

class RevisionFactory extends Factory
{
    protected $model = Revision::class;

    public function definition() : array
    {
        return [
            'pdf_path' => 'pdfs/example.pdf',
            'latex_path' => $this->faker->boolean() ? 'latex/example.tex' : ''
        ];
    }
}
