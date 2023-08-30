<?php

namespace Database\Factories;

/*
 * Docs: https://fakerphp.github.io/ 
 */

use App\Models\Activity;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{

    protected $model = Activity::class;

    public function definition()
    {
        return [
            'name' => 'Actividad 1',
            'type' => 'quiz',
            'status' => 'public',
            'weight' => 50,
            'order' => 1,
            'lesson_id' => Lesson::factory(),
            'activityable_id' => 1,
            'activityable_type' => 'App\\Models\\Quiz',
        ];
    }

}
