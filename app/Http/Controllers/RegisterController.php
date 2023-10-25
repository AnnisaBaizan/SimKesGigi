<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'nimnip' => 'required|max:18|min:12',
            'username' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'role' => 'required',
            'avatar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        if(request()->file('avatar')){
            // $attributes['avatar'] = request()->file('avatar')->store('avatars');
                $avatarname='avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
                $attributes['avatar']->storeAs('avatars',$avatarname);
                $attributes['avatar'] = $avatarname;
            }
            else { 
                $attributes['avatar']= "AvatarDefault.jpg";
            }

        $user = User::create($attributes);
        auth()->login($user);

        return redirect('/dashboard')->with('succes', 'Akun Berhasil Dibuat');
    }
}
