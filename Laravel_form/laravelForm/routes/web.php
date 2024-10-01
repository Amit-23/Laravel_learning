<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('add','add-student');

Route::post('add',[StudentController::class,'add']);

Route::get('list',[StudentController::class,'list']);

Route::get('delete/{id}',[StudentController::class,'delete']);

Route::get('edit/{id}',[StudentController::class,'edit']);//to populate the input fiels;

Route::put('edit-student/{id}',[StudentController::class,'editStudent']);

Route::get('search',[StudentController::class,'search']);