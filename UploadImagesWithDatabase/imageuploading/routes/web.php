<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('upload','upload');

Route::post('upload',[ImageController::class,'upload']);

Route::get('display',[ImageController::class,'display']);
