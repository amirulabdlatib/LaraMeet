<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/home',[AuthController::class, 'home_page'])->name('home');
Route::get('/',[AuthController::class, 'login_page'])->name('login.page');
Route::post('/login',[AuthController::class, 'doLogin'])->name('login');
Route::get('/register',[AuthController::class, 'register_page'])->name('register.page');