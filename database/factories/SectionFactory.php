<?php

namespace Database\Factories;

/*
 * Docs: https://fakerphp.github.io/ 
 */

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{

    protected $model = Section::class;

    public function definition()
    {
        return [
            'name' => 'Sección 1',
            'order' => 0,
            'course_id' => 1
        ];
    }

}
