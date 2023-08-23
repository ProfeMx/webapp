<?php

namespace App\Http\Events\Lesson\Listeners\DeleteEvent;

use App\Http\Events\Lesson\Events\DeleteEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DefaultOperation
{
    
    public function __construct()
    {
        //
    }

    public function handle(DeleteEvent $event)
    {

        // Modificar los parámtros de desempeño de los alumnos

    }

}
