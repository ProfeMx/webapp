<?php

namespace Database\Factories;

/*
 * Docs: https://fakerphp.github.io/ 
 */

use App\Models\ThreadReply;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThreadReplyFactory extends Factory
{

    protected $model = ThreadReply::class;

    public function definition()
    {
        return [
            'content' => 'Contenido de la respuesta',
            'thread_id' => \App\Models\Thread::factory()->create()->id,
            'user_id' => \App\Models\User::factory()->create()->id,
        ];
    }

}
