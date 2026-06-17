<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewAccountRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(CreateNewAccountRequest $request)
    {
        $credentials = $request->validated();

        $newUser = new User();
        $newUser->username = $credentials['username'];
        $newUser->password = bcrypt($credentials['password']);
        $newUser->save();

        // Automatic login ???
        Auth::login($newUser);
        $request->session()->regenerate();

        return new UserResource($newUser);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            return new UserResource($user);
        }

        return new JsonResponse(['error' => 'Wrong credentials'], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function me()
    {
        $user = Auth::user();

        if (!$user) {
            return new JsonResponse(['error' => 'Not logged in'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return new UserResource($user);
    }
}
