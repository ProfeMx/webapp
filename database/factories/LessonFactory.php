<?php

namespace Database\Factories;

/*
 * Docs: https://fakerphp.github.io/ 
 */

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{

    protected $model = Lesson::class;

    public function definition()
    {
        return [
            'name' => 'Lección 1',
            'order' => 0,
            'section_id' => 1,
        ];
    }

}
