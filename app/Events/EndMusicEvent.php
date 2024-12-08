<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EndMusicEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public array $musicDetails;

    /**
     * Create a new event instance.
     */
    public function __construct(array $musicDetails)
    {
        $this->musicDetails = $musicDetails;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('end-music'),
        ];
    }

    public function broadcastWith(): array
    {
        return $this->musicDetails;
    }
}
