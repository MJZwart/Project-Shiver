<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    // TODO:: Sort out where these routes and functions really belong

    /**
     * Increase energy bar (for debugging purposes, I swear)
     *
     * @param Request $request
     * @return void
     */
    public function payToWin(Request $request)
    {
        $authUser = Auth::user();

        $authUser->player->cheatEnergy();

        return $authUser->player;
        
    }

    //  TODO:: name?
    public function me()
    {
        $authUser = Auth::user();

        // maek resource
        return $authUser->player;
    }    

    public function gainEnergy(Request $request)
    {
        $authUser = Auth::user();
 
        $authUser->player->gainEnergy();

        return $authUser->player;
    }

    public function spendEnergy(Request $request)
    {
        $authUser = Auth::user();

        $authUser->player->spendEnergy();

        return $authUser->player;
    }


}
