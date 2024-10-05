<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[UserController::class,'showUsers'])->name('list');

Route::get('/user/{id}',[UserController::class,'singleUser'])->name('view.user');

Route::post('/add', [UserController:: class, 'addUser'])->name('addUser');

Route::post('/update/{id}',[UserController::class, 'updateUser'])->name('update.user');

Route::get('/updatepage/{id}',[UserController::class, 'updatePage'])->name('update.page');

Route::get('/delete/{id}',[UserController::class, 'deleteUser'])->name('delete.user');

Route::view('newuser','/adduser');