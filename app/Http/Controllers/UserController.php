<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Exports\ExportUser;
use App\Imports\ImportUser;
use App\Models\anamripasien;
use App\Models\Anomalimukosa;
use App\Models\Diagnosa;
use App\Models\Eksplakkal;
use App\Models\kartupasien;
use App\Models\Odontogram;
use App\Models\Ohis;
use App\Models\Pengsiperi;
use App\Models\Periodontal;
use App\Models\Vitalitas;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.user.index', [
            'users' => user::all()
        ]);
        // return view('pages.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.create', [
            'pembimbings' => User::where('role', '2')->get()
        ]);
        // return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $attributes = $request->validate([
            'nimnip' => 'required|max:18|min:12',
            'username' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'role' => 'required',
            'pembimbing' => 'max:18|min:12',
            'avatar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'terms' => 'required'
        ]);

        if ($request->file('avatar')) {
            // $attributes['avatar'] = request()->file('avatar')->store('avatars');
            $avatarname = 'avatar' . time() . '.' . $request->avatar->getClientOriginalExtension();
            $attributes['avatar']->storeAs('avatars', $avatarname);
            // $attributes['avatar']->storeAs('avatars', $avatarname, 'public_html');
            $attributes['avatar'] = $avatarname;
        } else {
            $attributes['avatar'] = "AvatarDefault.jpg";
        }

        user::create($attributes);

        return redirect('/user')->with('success', 'User Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {

        return view('pages.user.show', [
            'pembimbings' => User::where('role', '2')->get(),
            'user' => $user
        ]);
        // return view('pages.user.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        // dd($user);
        return view('pages.user.edit', [
            'pembimbings' => User::where('role', '2')->get(),
            'user' => $user
        ]);
        // return view('pages.user.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        // dd($request);
        $attributes = $request->validate([
            'nimnip' => 'required|max:18|min:12',
            'username' => 'required|max:255|min:2',
            'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore($user->id),],
            'password' => 'nullable|confirmed|min:6',
            'role' => 'required',
            'pembimbing' => 'max:18|min:12',
            'avatar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        if ($request->file('avatar')) {
            // $attributes['avatar'] = request()->file('avatar')->store('avatars');
            $avatarname = 'avatar' . time() . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->storeAs('avatars', $avatarname);
            // $request->avatar->storeAs('avatars', $avatarname, 'public_html');
            $oldpic = $user->avatar;
            if ($oldpic !== "AvatarDefault.jpg") {
                Storage::delete('avatars/' . $oldpic);
                // Storage::disk('public_html')->delete('avatars/' . $oldpic);
                user::where('id', $user->id)->update([
                    'avatar' => $avatarname
                    // $request['avatar'] = $avatarname
                ]);
            }
        } else {
            user::where('id', $user->id)->update([
                'avatar' => $user->avatar
                // $request['avatar']= $user->avatar
            ]);
        }

        // dd($request);
        if ($request['password'] !== NULL) {
            user::where('id', $user->id)->update([
                'password' => Hash::make($request['password'])
                // 'password' => $request['password']
            ]);
        }


        user::where('id', $user->id)->update([
            'nimnip' => $request['nimnip'],
            'username' => $request['username'],
            'email' => $request['email'],
            'role' => $request['role'],
            'pembimbing' => $request['pembimbing'],
        ]);

        // dd($attributes);
        // user::where('id', $user->id)->update($attributes);

        return back()->with('success', 'Data User succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        if ($user->id !== 1) {
            if ($user->avatar !== "AvatarDefault.jpg") {
                Storage::delete('avatars/' . $user->avatar);
                // Storage::disk('public_html')->delete('avatars/' . $user->avatar);
            }

            User::destroy($user->id);

            if ($user->role === 2) {
                kartuPasien::where('pembimbing', $user->nimnip)->delete();
                anamripasien::where('pembimbing', $user->nimnip)->delete();
                Pengsiperi::where('pembimbing', $user->nimnip)->delete();
                Eksplakkal::where('pembimbing', $user->nimnip)->delete();
                Ohis::where('pembimbing', $user->nimnip)->delete();
                Odontogram::where('pembimbing', $user->nimnip)->delete();
                Anomalimukosa::where('pembimbing', $user->nimnip)->delete();
                Vitalitas::where('pembimbing', $user->nimnip)->delete();
                Periodontal::where('pembimbing', $user->nimnip)->delete();
                Diagnosa::where('pembimbing', $user->nimnip)->delete();
            } else {
                kartuPasien::where('user_id', $user->id)->delete();
                anamripasien::where('user_id', $user->id)->delete();
                Pengsiperi::where('user_id', $user->id)->delete();
                Eksplakkal::where('user_id', $user->id)->delete();
                Ohis::where('user_id', $user->id)->delete();
                Odontogram::where('user_id', $user->id)->delete();
                Anomalimukosa::where('user_id', $user->id)->delete();
                Vitalitas::where('user_id', $user->id)->delete();
                Periodontal::where('user_id', $user->id)->delete();
                Diagnosa::where('user_id', $user->id)->delete();
            }

            return back()->with('success', 'User dan data-data terkait berhasil dihapus');
        }
        else{
            abort(403, 'User Ini Tidak Dapat Anda Hapus.');
        }
    }

    public function export()
    {
        return Excel::download(new ExportUser, 'Data_User.xlsx');
        return back()->with('success', 'Data User Berhasil di eksport');
    }

    public function import(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'importuser' => 'required|nullable|mimes:xls,xlsx|max:100'
        ]);

        // $user->syncRoles([$request->input('role_id')]);
        request()->file('importuser');
        Excel::import(new ImportUser, request()->file('importuser'));
        return back()->with('success', 'Data User Berhasil di import');
    }
}