<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/about','about');

Route::view('/post','post');

Route::view('/test','test');
