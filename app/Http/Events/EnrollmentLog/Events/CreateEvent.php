<?php

namespace App\Http\Events\EnrollmentLog\Events;

use App\Models\EnrollmentLog;
use App\Http\Requests\EnrollmentLog\CreateRequest;
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

    public $request;

    public $response;

    public $locale;

    public function __construct(EnrollmentLog $enrollmentLog, CreateRequest $request, $response)
    {
        
        $this->enrollmentLog = $enrollmentLog;

        $this->request = $request;

        $this->response = $response;

        $this->locale = ($this->request->hasSession() && 
            $this->request->getSession()->has('locale')) ? 
            $this->request->getSession()->get('locale') : 
            'en';

        App::setLocale($this->locale);

    }

    public function broadcastOn()
    {

        return new PrivateChannel('channel-name');

    }


}