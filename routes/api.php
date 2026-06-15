<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Route;

Route::post('/up', [BaseController::class, 'up']);

Route::group(['middleware' => ['web']], function() {
    Route::post('/register', [AuthController::class, 'register']);
});