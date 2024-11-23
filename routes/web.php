<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('login');
});


Route::get('/register',[AuthController::class, 'register_page'])->name('register.page');