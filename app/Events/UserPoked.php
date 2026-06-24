<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserPoked implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
// TODO Find out if user is needed here, or otherwise don't send the user each time
    /**
     * Create a new event instance.
     */
    public function __construct(public User $userPoked, public string $pokerUsername)
    {}

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('poke.'. $this->userPoked->id),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'username' => $this->pokerUsername,
        ];
    }
}
