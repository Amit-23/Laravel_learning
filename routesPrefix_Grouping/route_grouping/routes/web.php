<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});


/*
Route::view('student/home','home');


Route::get('student/show',[HomeController::class,'show']);

Route::get('student/add',[HomeController::class,'add']);

//here we have common prefix student which sometimes becomes messy when we have many pages so instead of writing common prefix many times we group them so that we do not need to specify common prefix again and again
*/


//solution using grouping of common prefix

Route::prefix('student')->group(function () {
    Route::view('/home', 'home');


    Route::get('/show', [HomeController::class, 'show']);

    Route::get('/add', [HomeController::class, 'add']);
});


/*

/////////////////////////////////
//in the below code you can see controller name is (HomeController) repeating many times , so this we can create a group

 Route::get('get', [HomeController::class, 'get']);
 Route::get('set', [HomeController::class, 'set']);
*/
//route grouping with controller
Route::controller(HomeController::class)->group(function(){

    Route::get('get','get');
 Route::get('set','set');

 Route::get('about/{name}','about');

});

// Route::get('about/{name}',[HomeController::class,'about']);

