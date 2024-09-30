<?php

use Illuminate\Support\Facades\Route;


Route::middleware('SetLang')->group(function () {


    Route::get('/', function () {
        return view('welcome');
    });

    Route::view('about', 'about');


    Route::get('setlang/{lang}', function ($lang) {
        Session::put('lang', $lang);
        return redirect('/');
    });
});
