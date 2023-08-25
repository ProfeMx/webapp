<?php

namespace Database\Factories;

/*
 * Docs: https://fakerphp.github.io/ 
 */

use App\Models\Forum;
use Illuminate\Database\Eloquent\Factories\Factory;

class ForumFactory extends Factory
{

    protected $model = Forum::class;

    public function definition()
    {
        return [
            'name' => 'Foro 1',
            'course_id' => 1
        ];
    }

}
