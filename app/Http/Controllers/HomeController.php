<?php

namespace App\Http\Controllers;

use App\Models\anamripasien;
use App\Models\kartupasien;
use App\Models\user;

use Illuminate\Http\Request;

class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // return view('pages.dashboard', [
        //     'kartupasiens' => kartupasien::all(),
        //     'anamripasiens' => anamripasien::all()
        // ]);
        // return view('pages.dashboard');

        $users = User::all();
        $userpem = User::where('role',2)->get();
        $usermhs = User::where('role',3)->get();
        // dd($usermhs);
        $kartupasiens = kartupasien::all();
        $kartupasien = kartupasien::wheredate('created_at',today())->get();
        // dd($kartupasien);
        $anamripasiens = anamripasien::all();
        
        return view('pages.dashboard', compact('kartupasiens', 'kartupasien','anamripasiens', 'users', 'usermhs', 'userpem' ));
    }
}
