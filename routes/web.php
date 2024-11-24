<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::middleware(['guest'])->group(function () {

    Route::get('/',[AuthController::class, 'login_page'])->name('login.page');
    Route::post('/login',[AuthController::class, 'doLogin'])->name('login');
    Route::get('/register',[AuthController::class, 'register_page'])->name('register.page');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/home',[HomeController::class, 'home_page'])->name('home');
    Route::post('/logout',[AuthController::class, 'doLogout'])->name('logout');
    Route::get('/profile/{username}',[HomeController::class,'showProfilePage' ])->name('profile');
});