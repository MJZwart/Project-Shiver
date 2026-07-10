<?php

use App\Broadcasting\PokeChannel;
use Illuminate\Support\Facades\Broadcast;

// Reminder public channels don't need to be registered here

Broadcast::channel('poke.{userId}', PokeChannel::class);