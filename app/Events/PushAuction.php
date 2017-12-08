<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class PushAuction implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $aid;
    public $bid;
    public $uname;
    public $time;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($aid, $bid, $uname, $time)
    {
        //
        $this->aid = $aid;
        $this->bid = $bid;
        $this->uname = $uname;
        $this->time = $time;
        //dd($aid);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        //  dd("Channel");
        return new Channel('auction');
    }
}
