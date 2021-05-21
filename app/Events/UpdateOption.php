<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Log;
class UpdateOption implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $option, $match;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($option, $match)
    {
        $this->option = $option;
        $this->match = $match;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['update-option'];
    }
}
