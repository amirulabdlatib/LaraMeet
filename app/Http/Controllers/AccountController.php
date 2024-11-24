<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function edit($account)
    {
        if( Auth::user()->id != $account){
            abort(403);
        }

        return view('account');
    }

    public function update(Request $request)
    {

    }
}
