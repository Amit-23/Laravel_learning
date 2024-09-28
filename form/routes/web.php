<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/user',function(){
    return view('user-form');
});

Route::post('adduser',[UserController::class,'addUser']);

Route::view('/url/work/tcs','url')->name('ab');
//name make easier to write lengthy route name now other function can refer this route as ab; 

Route::view('/url1','url');