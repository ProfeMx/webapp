<?php

namespace App\Http\Events\Attempt\Listeners\ExportEvent;

use App\Notifications\Attempt\ExportNotification;
use App\Http\Events\Attempt\Events\ExportEvent;
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