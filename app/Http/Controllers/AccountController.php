<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function edit($account)
    {
        if( Auth::user()->id != $account){
            abort(403);
        }

        return view('account');
    }

    public function update(Request $request,$account)
    {

        $user = Auth::user();
        
        abort_if($user->id != $account,403,"Unauthorized access");

        $validated_data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', Rule::unique('users')->ignore($user->id)],
            'username' => ['nullable', 'string', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|mimes:png,jpg'
        ]);

        if ($request->hasFile('profile_image')) {

            if ($user->profile_image && Storage::disk('public')->exists($user->profile_image)) {
                Storage::disk('public')->delete($user->profile_image);
            }

            $extension = $request->file('profile_image')->extension();
            $path = "images\\users\\{$user->username}.{$extension}";
            
            Storage::disk('public')->putFileAs('', $request->file('profile_image'), $path);
            $validated_data['profile_image'] = $path;
        }

        if (isset($validated_data['password'])) {
            $validated_data['password'] = Hash::make($validated_data['password']);
        } else {
            unset($validated_data['password']);
        }

        $user->update($validated_data);

        return back()->with('success','Account Updated!!!');

    }
}
