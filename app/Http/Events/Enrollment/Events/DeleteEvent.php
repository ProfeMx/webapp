<?php

namespace App\Http\Events\Enrollment\Events;

use App\Models\Enrollment;
use App\Http\Requests\Enrollment\DeleteRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DeleteEvent
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $enrollment;

    public $request;

    public $response;

    public $locale;

    public function __construct(Enrollment $enrollment, DeleteRequest $request, $response)
    {
        
        $this->enrollment = $enrollment;

        $this->request = $request;

        $this->response = $response;

        $this->locale = ($this->request->hasSession() && 
            $this->request->getSession()->has('locale')) ? $this->request->getSession()->get('locale') : 
            'en';

        App::setLocale($this->locale);

    }

    public function broadcastOn()
    {
        
        return new PrivateChannel('channel-name');

    }

}