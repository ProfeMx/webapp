<?php

namespace App\Http\Events\Career\Events;

use App\Models\Career;
use App\Http\Requests\Career\AssignPathRequest;
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

    public $career;

    public $request;

    public $response;

    public $locale;

    public function __construct(Career $career, AssignPathRequest $request, $response)
    {
        
        $this->career = $career;

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