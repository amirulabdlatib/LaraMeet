<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login_page()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt($credentials)){
            
            $request->session()->regenerate();
            return to_route('home');
        }

        return back()->with('error','Email or password is incorrect');

    }

    public function register_page()
    {
        return view('register');
    }
}
