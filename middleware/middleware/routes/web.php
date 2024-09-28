<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('about','about');

//middle ware is only applied to the home route;
Route::view('home','home')->middleware('check1');