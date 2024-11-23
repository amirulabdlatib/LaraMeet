<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/home',[HomeController::class, 'home_page'])->name('home');
Route::get('/',[AuthController::class, 'login_page'])->name('login.page');
Route::post('/login',[AuthController::class, 'doLogin'])->name('login');
Route::get('/register',[AuthController::class, 'register_page'])->name('register.page');
Route::post('/logout',[AuthController::class, 'doLogout'])->name('logout');