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

    public function showProfilePage(Request $request,$username)
    {
        $user = User::where('username',$username)->firstorFail();
        $users = User::where('id','!=',Auth::user()->id)->get();

        return view('profile',compact('user','users'));
    }

    public function search(Request $request)
    {
        $query = $request->input('search');

        // Get searched users excluding the current user
        $users = User::where('id', '!=', Auth::user()->id)
                    ->where(function($q) use ($query) {
                        $q->where('username', 'like', "%$query%")
                        ->orWhere('name', 'like', "%$query%");
                    })
                    ->get();

        return view('home', compact('users'));
    }

}
