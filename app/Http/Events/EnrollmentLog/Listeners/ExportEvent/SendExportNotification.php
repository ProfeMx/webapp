<?php

namespace App\Http\Events\EnrollmentLog\Listeners\ExportEvent;

use App\Notifications\EnrollmentLog\ExportNotification;
use App\Http\Events\EnrollmentLog\Events\ExportEvent;
use Illuminate\Support\Facades\Notification;
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

        $event->user
            ->notify((new ExportNotification($event->data))->locale($event->locale));


    }

}