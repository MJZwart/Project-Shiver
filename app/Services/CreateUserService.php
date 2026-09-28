<?php

namespace App\Services;

use App\Models\User;

class CreateUserService
{
    // TODO:: fix that type
    public function createNewUser(mixed $credentials) {

        $newUser = new User();
        $newUser->username = $credentials['username'];
        $newUser->password = bcrypt($credentials['password']);
        
        $newUser->save();

        $newUser->player()->create();

        return $newUser;
            
    }
}