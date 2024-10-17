<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\ContactController;

Route::middleware(['admin_guest'])->group(function () {
Route::get('/admin/login', [LoginController::class, 'showLoginPage'])->name('admin.login.page');

Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');

});

Route::get('/admin/contact',[ContactController::class,'register'])->name('contact.create');


Route::post('/admin/contact',[ContactController::class,'create'])->name('admin.create');


// Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');


Route::middleware(['admin_auth'])->group(function () {



    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('logout', [DashboardController::class, 'logout'])->name('admin.logout');
    Route::get('userdashboard', [DashboardController::class, 'user'])->name('user.dashboard');
});

//  Route::get('userdashboard', [DashboardController::class, 'user'])->name('user.dashboard');
