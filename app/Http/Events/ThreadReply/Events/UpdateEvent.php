<?php

namespace App\Http\Events\ThreadReply\Events;

use App\Models\ThreadReply;
use Illuminate\Support\Facades\App;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateEvent
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $threadReply;

    public $data;

    public $response;

    public $locale;

    public function __construct(ThreadReply $threadReply, array $data, $response, $locale = 'en')
    {
        
        $this->threadReply = $threadReply;

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