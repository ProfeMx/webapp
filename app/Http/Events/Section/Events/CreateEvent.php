<?php

namespace App\Http\Events\Section\Events;

use App\Models\Section;
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

    public $section;

    public $data;

    public $response;

    public $locale;

    public function __construct(Section $section, array $data, $response, $locale = 'en')
    {
        
        $this->section = $section;

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