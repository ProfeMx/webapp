<?php

namespace Database\Factories;

/*
 * Docs: https://fakerphp.github.io/ 
 */

use App\Models\Thread;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThreadFactory extends Factory
{

    protected $model = Thread::class;

    public function definition()
    {
        return [
            'title' => 'Thread uno',
            'content' => 'Contenido del hilo',
            'forum_id' => 1,
            'user_id' => 1,
        ];
    }

}
