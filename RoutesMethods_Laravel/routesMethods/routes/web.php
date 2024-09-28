<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('user',[UserController::class,'get']);

Route::post('user',[UserController::class,'post']);

Route::put('user',[UserController::class,'put']);

// Route::any('user',[UserController::class,'any']);

Route::match(['get', 'post'], '/users', [UserController::class, 'handle']);




Route::view('form','user');