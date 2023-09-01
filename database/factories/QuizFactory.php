<?php

namespace Database\Factories;

/*
 * Docs: https://fakerphp.github.io/ 
 */

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{

    protected $model = Quiz::class;

    public function definition()
    {
        return [
            'title' => 'Examen',
            'version' => '1.0.0',
            'payload' => (new Quiz)->buildPayload()
        ];
    }

}
