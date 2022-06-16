<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiTokenController;
use App\Http\Controllers\DreamController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//SignUp
Route::post('auth/signup', [ApiTokenController::class, 'signup']);

//Login
Route::post('auth/login', [ApiTokenController::class, 'login']);

//Create New Dream
Route::middleware('auth:sanctum')->post('dreams', [DreamController::class, 'create']);