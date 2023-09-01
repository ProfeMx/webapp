<?php

namespace Database\Factories;

/*
 * Docs: https://fakerphp.github.io/ 
 */

use App\Models\Submission;
use App\Models\Homework;
use App\Models\Enrollment;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubmissionFactory extends Factory
{

    protected $model = Submission::class;

    public function definition()
    {
        return [
            'status' => 'send',
            'content' => 'Hola mundo',
            'submission_file' => null,
            'grade' => null,
            'grade_override' => null,
            'weight' => 1, // El peso que agrega a la calificación final del curso
            'feedback' => 'Suerte para la próxima',
            'feedback_file' => null,
            'homework_id' => Homework::factory(),
            'enrollment_id' => Enrollment::factory(),
        ];
    }

}
