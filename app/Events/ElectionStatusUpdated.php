<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Election;

class ElectionStatusUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $election;

    /**
     * Create a new event instance.
     *
     * @param  \App\Models\Election  $election
     * @return void
     */
    public function __construct(Election $election)
    {
        $this->election = $election;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('election-status-channel'),
        ];
    }
}
