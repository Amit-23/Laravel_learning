<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\LoginController;


Route::get('/admin/login', [LoginController::class, 'showLoginPage'])->name('admin.login.page');

Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');


Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');

Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

Route::get('logout', [DashboardController::class, 'logout'])->name('admin.logout');