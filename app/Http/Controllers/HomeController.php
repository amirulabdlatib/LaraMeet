<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function home_page()
    {
        $users = User::where('id','!=',Auth::user()->id)->get();

        return view('home',compact('users'));
    }

}