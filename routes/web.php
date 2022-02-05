<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::controller(\App\Http\Controllers\BlogController::class)->group(function () {
    Route::get('/blog', 'index');
    
    Route::get('/blog/{blogPostId}', 'show');
    Route::get('/blog/{blogPostId}/edit', 'edit')->middleware('auth');
    Route::get('/blog/create/post', 'create')->middleware('auth');

    Route::post('/blog/{blogPostId}/edit', 'update')->middleware('auth');
    Route::post('/blog/create/post', 'store')->middleware('auth');
    
    Route::delete('/blog/{blogPostId}', 'destroy')->middleware('auth');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
