<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserProfileController extends Controller
{
    public function show()
    {
        return view('pages.user-profile');
    }

    public function update(Request $request)
    {
        // dd($request);
        $attributes = $request->validate([
            'nimnip' => 'required|max:18|min:12',
            'username' => 'required|max:255|min:2',
            'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(auth()->user()->id),],
            'password' => 'nullable|confirmed|min:6',
            'role' => '',
            'avatar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        if($request->file('avatar')){
            // $attributes['avatar'] = request()->file('avatar')->store('avatars');
            $oldpic = auth()->user()->avatar;
            if ($oldpic !== "AvatarDefault.jpg") {
                Storage::delete('avatars/'. $oldpic);
                // Storage::disk('public_html')->delete('avatars/'. $oldpic);
                $avatarname='avatar'.time().'.'.$request->avatar->getClientOriginalExtension();
                $request->avatar->storeAs('avatars',$avatarname);
                // $request->avatar->storeAs('avatars',$avatarname,'public_html');
                user::where('id', auth()->user()->id)->update([
                    'avatar' => $avatarname
                    // $request['avatar'] = $avatarname
                ]);
            }
            else {
                $avatarname='avatar'.time().'.'.$request->avatar->getClientOriginalExtension();
                $request->avatar->storeAs('avatars',$avatarname);
                // $request->avatar->storeAs('avatars',$avatarname,'public_html');
                user::where('id', auth()->user()->id)->update([
                    'avatar' => $avatarname
                    // $request['avatar'] = $avatarname
                ]);
            }

        }
        else {
            user::where('id', auth()->user()->id)->update([
                'avatar' => auth()->user()->avatar
                // $request['avatar']= auth()->user()->avatar
            ]);
        }

        // dd($request);
            if($request['password'] !== NULL){
                user::where('id', auth()->user()->id)->update([
                    'password' => Hash::make($request['password'])
                    // 'password' => $request['password']
                    ]);
            }


            user::where('id', auth()->user()->id)->update([
                'nimnip' => $request['nimnip'],
                'username' => $request['username'],
                'email' => $request['email'],
                'role' => $request['role']
            ]);

            // dd($attributes);
            // user::where('id', auth()->user()->id)->update($attributes);

        return back()->with('succes', 'Profile succesfully updated');

        // $attributes = $request->validate([
        //     'nimnip' => 'required|max:18|min:12',
        //     'username' => 'required|max:255|min:2',
        //     'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(auth()->user()->id),],
        //     'password' => 'nullable|confirmed|min:6',
        //     'role' => '',
        //     'avatar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        // ]);

        // if($request->file('avatar')){
        //     // $attributes['avatar'] = request()->file('avatar')->store('avatars');
        //         $avatarname='avatar'.time().'.'.$request->avatar->getClientOriginalExtension();
        //         $request->avatar->storeAs('avatars',$avatarname);
        //         $oldpic = auth()->user()->avatar;
        //         if ($oldpic !== NULL || $oldpic !== "AvatarDefault.jpg") {
        //             Storage::delete('avatars/'. $oldpic);
        //             $attributes['avatar'] = $avatarname;
        //         }
        //     }
        //     else {
        //         $attributes['avatar']= auth()->user()->avatar;
        //         // $attributes['avatar']= "AvatarDefault.jpg";
        //     }

        //     if($request['password'] !== NULL){
        //         auth()->user()->update([
        //             'password' => $request['password'],
        //             ]);
        //     }

        //     auth()->user()->update([
        //         'nimnip' => $request['nimnip'],
        //         'username' => $request['username'],
        //         'email' => $request['email'],
        //         'role' => $request['role'],
        //         'avatar' => $request['avatar']
        //     ]);
        //     // dd($attributes);
        //     // auth()->user()->update($attributes);

        // return back()->with('succes', 'Profile succesfully updated');
    }
}