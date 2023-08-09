<?php

namespace App\Http\Events\ThreadReply\Listeners\ExportEvent;

use App\Notifications\ThreadReply\ExportNotification;
use App\Http\Events\ThreadReply\Events\ExportEvent;
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