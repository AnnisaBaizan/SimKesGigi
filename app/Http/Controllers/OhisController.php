<?php

namespace App\Http\Controllers;

use App\Models\Ohis;
use App\Models\Kartupasien;
use App\Models\gigi;
use App\Models\User;
use Illuminate\Http\Request;

class OhisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role === 1) {
            $ohiss = ohis::all();
        } 
        elseif (auth()->user()->role === 2) {
            $ohiss = ohis::where('pembimbing', auth()->user()->nimnip)->get();
        } 
        else {
            $ohiss = ohis::where('user_id', auth()->id())->get();
        }

        return view('pages.ohis.index')->with('ohiss', $ohiss);

        // return view('pages.ohis.index', [
        //     'ohiss' => Ohis::all()
        // ]);
        // return view('pages.ohis.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        if (auth()->user()->role === 1) {
            $kartupasiens = kartupasien::all();
            $users = User::where('role', 3)->get();
        } 
        elseif (auth()->user()->role === 2) {
            $kartupasiens = kartupasien::where('pembimbing', auth()->user()->nimnip)->get();
        } 
        else {
            $kartupasiens = kartupasien::where('user_id', auth()->id())->get();
        }

        // $kartupasiens = kartupasien::all();
        // $gigis = Gigi::all();
        
        return view('pages.ohis.create')->with([
            'kartupasiens' => $kartupasiens,
            'users' => $users ?? null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOhisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ohis  $ohis
     * @return \Illuminate\Http\Response
     */
    public function show(Ohis $ohis)
    {
        return view('pages.ohis.show')->with('ohis', $ohis);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ohis  $ohis
     * @return \Illuminate\Http\Response
     */
    public function edit(Ohis $ohis)
    {
        if (auth()->user()->role === 1) {
            $kartupasiens = kartupasien::all();
            $users = User::where('role', 3)->get();
        } 
        elseif (auth()->user()->role === 2) {
            $kartupasiens = kartupasien::where('pembimbing', auth()->user()->nimnip)->get();
        } 
        else {
            $kartupasiens = kartupasien::where('user_id', auth()->id())->get();
        }

        return view('pages.ohis.edit')->with([
            'kartupasiens' => $kartupasiens,
            'ohis' => $ohis,
            'users' => $users ?? null
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOhisRequest  $request
     * @param  \App\Models\Ohis  $ohis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ohis $ohis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ohis  $ohis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ohis $ohis)
    {
        Ohis::destroy($ohis->id);
        return back()->with('succes', 'Data Ohis berhasil dihapus');
    }
}
