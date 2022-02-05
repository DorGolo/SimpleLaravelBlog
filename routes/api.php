<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;

Route::post('login', [UserController::class, 'login'])->middleware('guest');
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['middleware' => ['auth:sanctum', 'api']], function () {
    Route::resource('blog', \App\Http\Controllers\BlogController::class, ['except' => ['index', 'show']]);
});

Route::resource('blog', \App\Http\Controllers\BlogController::class, ['only' => ['index', 'show']]);