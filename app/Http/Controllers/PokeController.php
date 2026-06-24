<?php

namespace App\Http\Controllers;

use App\Events\UserPoked;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PokeController extends Controller
{
    public function getUsers()
    {
        $users = User::all();

        return UserResource::collection($users);
    }

    public function pokeUser(User $user)
    {
        $authUser = Auth::user();
        UserPoked::broadcast($user, $authUser->username);
    }
}