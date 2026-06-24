<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\PokeController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['web']], function() {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/me', [AuthController::class, 'me']);
    Route::any('/logout', [AuthController::class, 'logout']);
    
    Route::post('/up', [BaseController::class, 'up']);
});

// TODO make auth middleware
Route::group(['middleware' => ['web']], function() {
    Route::controller(PokeController::class)->group(function() {
        Route::get('/users', 'getUsers');
        Route::post('/poke/{user}', 'pokeUser');
    });
});