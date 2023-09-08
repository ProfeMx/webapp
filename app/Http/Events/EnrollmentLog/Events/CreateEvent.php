<?php

namespace App\Http\Events\EnrollmentLog\Events;

use App\Models\EnrollmentLog;
use Illuminate\Support\Facades\App;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateEvent
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $enrollmentLog;

    public $data;

    public $response;

    public $locale;

    public function __construct(EnrollmentLog $enrollmentLog, array $data, $response, $locale = 'en')
    {
        
        $this->enrollmentLog = $enrollmentLog;

        $this->data = $data;

        $this->response = $response;

        $this->locale = $locale

        App::setLocale($this->locale);

    }

    public function broadcastOn()
    {

        return new PrivateChannel('channel-name');

    }


}