<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;

Route::middleware(['guest'])->group(function () {

    Route::get('/',[AuthController::class, 'login_page'])->name('login.page');
    Route::post('/login',[AuthController::class, 'doLogin'])->name('login');
    Route::get('/register',[AuthController::class, 'register_page'])->name('register.page');
    Route::post('/register',[AuthController::class, 'doRegister'])->name('register');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/home',[HomeController::class, 'home_page'])->name('home');
    Route::post('/logout',[AuthController::class, 'doLogout'])->name('logout');
    Route::get('/profile/{username}',[HomeController::class,'showProfilePage' ])->name('profile');
    Route::get('/search',[HomeController::class, 'search'])->name('search.user');
    Route::get('/account-settings/{account}',[AccountController::class, 'edit'])->name('account.edit');
    Route::put('/account-settings/{account}',[AccountController::class, 'update'])->name('account.update');

});