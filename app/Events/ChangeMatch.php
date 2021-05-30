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
class ChangeMatch implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $match_id, $status, $text;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($match_id, $status, $text)
    {
        $this->match_id = $match_id;
        $this->status = $status;
        $this->text = $text;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['change-match'];
    }
}
