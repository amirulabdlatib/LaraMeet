<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('',[AuthController::class, 'login_page'])->name('login.page');
Route::post('',[AuthController::class, 'doLogin'])->name('login');
Route::get('/register',[AuthController::class, 'register_page'])->name('register.page');