<?php

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('upload','upload');

Route::post('upload',[UploadController::class,'upload']);
