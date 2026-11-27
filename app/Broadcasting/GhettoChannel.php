<?php

namespace App\Broadcasting;

use App\Models\User;

// Not sure what I'm even going to do here
class GhettoChannel
{
    /**
     * Create a new channel instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     */
    public function join(User $user, int $userId): array|bool
    {
        return $user->id === $userId;
    }
}
