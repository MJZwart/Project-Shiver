<?php

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Route;

Route::post('/up', [BaseController::class, 'up']);