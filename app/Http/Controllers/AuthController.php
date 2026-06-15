<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewAccountRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(CreateNewAccountRequest $request)
    {
        $validated = $request->validated();

        $newUser = new User();
        $newUser->username = $validated['username'];
        $newUser->password = bcrypt($validated['password']);
        $newUser->save();

        // Automatic login
        Auth::login($newUser);
        $request->session()->regenerate();

        // Think about what to send, probably only the username or otherwise let the user know they are logged in.
        // Then in the frontend use this to show that the user is logged in (in router and stuff).
        // Also test that this actually logs the user in properly.
        return $newUser;
    }
}
