<?php

namespace Database\Factories;

/*
 * Docs: https://fakerphp.github.io/ 
 */

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{

    protected $model = Question::class;

    public function definition()
    {
        return [
            'version' => '1.0.0',
            'type' => 'true_false',
            'order' => 1,
            'weight' => 1,
            'payload' => (new Question)->buildPayload(),
            'quiz_id' => Quiz::factory(),
        ];
    }

}
