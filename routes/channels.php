<?php

use Illuminate\Support\Facades\Broadcast;

// Reminder public channels don't need to be registered here

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});