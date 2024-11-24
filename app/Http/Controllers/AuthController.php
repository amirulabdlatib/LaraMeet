<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function doRegister(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username',
        ]);

        $user = User::create([
            'name' => $validated_data['name'],
            'email' => $validated_data['email'],
            'password' => Hash::make($validated_data['password']),
            'username' => $validated_data['username'],
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return to_route('home');
    }

    public function doLogout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login.page');
    }
}
