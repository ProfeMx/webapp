<?php

namespace App\Http\Events\Path\Events;

use App\Models\Path;
use App\Http\Requests\Path\DeallocateCourseRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DeallocateCourseEvent
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $path;

    public $request;

    public $response;

    public $locale;

    public function __construct(Path $path, DeallocateCourseRequest $request, $response)
    {
        
        $this->path = $path;

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