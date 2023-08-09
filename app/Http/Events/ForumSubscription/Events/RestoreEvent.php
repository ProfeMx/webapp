<?php

namespace App\Http\Events\ForumSubscription\Events;

use App\Models\ForumSubscription;
use App\Http\Requests\ForumSubscription\RestoreRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RestoreEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $forumSubscription;

    public $request;

    public $response;

    public $locale;

    public function __construct(ForumSubscription $forumSubscription, RestoreRequest $request, $response)
    {
        
        $this->forumSubscription = $forumSubscription;

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