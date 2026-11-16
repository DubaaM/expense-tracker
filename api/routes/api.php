<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/ping', fn () => response()->json(['status' => 'ok']));

//login route
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
//register route
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);



//midllwware routes 
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('/me', [\App\Http\Controllers\AuthController::class, 'me']);
});