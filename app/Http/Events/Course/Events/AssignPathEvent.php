<?php

namespace App\Http\Events\Course\Events;

use App\Models\Course;
use App\Http\Requests\Course\AssignPathRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AssignPathEvent
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $course;

    public $request;

    public $response;

    public $locale;

    public function __construct(Course $course, AssignPathRequest $request, $response)
    {
        
        $this->course = $course;

        $this->request = $request;

        $this->response = $response;

        $this->locale = ($this->request->hasSession() && $this->request->getSession()->has('locale')) ? 
            $this->request->getSession()->get('locale') : 
            'en';

        App::setLocale($this->locale);

    }

    public function broadcastOn()
    {
        
        return new PrivateChannel('channel-name');

    }

}