<?php

// LPG: Eliminar el App para factories de aplicación
namespace Database\Factories;

/*
 * Docs: https://fakerphp.github.io/ 
 */

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{

    protected $model = Course::class;

    public function definition()
    {
        return [
            'name' => 'Curso 1',
            'status' => 'public',
            'payload' => json_encode([]),
        ];
    }

}
