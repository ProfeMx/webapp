<?php

namespace App\Http\Events\Enrollment\Listeners\ExportEvent;

use App\Notifications\Enrollment\ExportNotification;
use App\Http\Events\Enrollment\Events\ExportEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendExportNotification
{

    public function __construct()
    {
        //
    }

    public function handle(ExportEvent $event)
    {

        $event->request
            ->user()
            ->notify((new ExportNotification($event->request))->locale($event->locale));

    }

}