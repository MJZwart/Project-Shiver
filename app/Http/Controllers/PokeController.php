<?php

namespace App\Http\Controllers;

use App\Events\UserPoked;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class PokeController extends Controller
{
    public function getUsers(): AnonymousResourceCollection
    {
        $users = User::all();

        return UserResource::collection($users);
    }

    /**
     * Sends a simple message through websockets to provided user
     *
     * @param User $user
     */
    public function pokeUser(User $user): void
    {
        $authUser = Auth::user();
        UserPoked::broadcast($user, $authUser->username);
    }
}