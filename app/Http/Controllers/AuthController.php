<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login_page()
    {

    }

    public function register_page()
    {
        return view('register');
    }
}
