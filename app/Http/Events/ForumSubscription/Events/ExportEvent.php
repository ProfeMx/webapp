<?php

namespace App\Http\Events\ForumSubscription\Events;

use App\Http\Requests\ForumSubscription\ExportRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ExportEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $request;

    public $locale;

    public function __construct(ExportRequest $request)
    {

        $this->request = $request;
        
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