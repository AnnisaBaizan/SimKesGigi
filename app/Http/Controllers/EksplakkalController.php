<?php

namespace App\Http\Controllers;

use App\Models\Eksplakkal;
use App\Models\kartupasien;
use App\Models\permukaangigi;
use App\Models\User;
use Illuminate\Http\Request;

class EksplakkalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role === 1) {
            $eksplakkals = Eksplakkal::all();
        } 
        elseif (auth()->user()->role === 2) {
            $eksplakkals = Eksplakkal::where('pembimbing', auth()->user()->nimnip)->get();
        } 
        else {
            $eksplakkals = Eksplakkal::where('user_id', auth()->id())->get();
        }

        return view('pages.eksplakkal.index')->with('eksplakkals', $eksplakkals);

        // return view('pages.eksplakkal.index', [
        //     'eksplakkals' => Eksplakkal::all()
        // ]);
        // return view('pages.eksplakkal.index');
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
        
        $permukaangigis = permukaangigi::all();
        
        return view('pages.eksplakkal.create')->with([
            'kartupasiens' => $kartupasiens,
            'permukaangigis' => $permukaangigis,
            'users' => $users ?? null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_kartu'=> 'required|max:9999999999999|min:1|numeric',
            'nama' => 'required|max:40|min:4',
            'no_iden' => 'required|max:20',
            'tgl_lhr' => 'required|max:20|date',
            'umur' => 'required|max:999|min:1|numeric',
            'jk' => 'required|max:10',
            'suku' => 'required|max:40',
            'pekerjaan' => 'required|max:100',
            'hub' => 'required|max:50',
            'no_hp' => 'required|max:9999999999999|min:1|numeric',
            'no_tlpn' => 'required|max:9999999999999|min:1|numeric',
            'alamat' =>'required|max:255'
        ]);

        Eksplakkal::create($validatedData);

        return redirect('/eksplakkal')->with('succes', 'Data Eskternal & Internal Oral (Plak & Kalkulus)

        Eskternal & Internal Oral (Plak & Kalkulus) Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eksplakkal  $eksplakkal
     * @return \Illuminate\Http\Response
     */
    public function show(Eksplakkal $eksplakkal)
    {
        return view('pages.eksplakkal.show')->with('eksplakkal', $eksplakkal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eksplakkal  $eksplakkal
     * @return \Illuminate\Http\Response
     */
    public function edit(Eksplakkal $eksplakkal)
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

        
        return view('pages.eksplakkal.create')->with([
            'kartupasiens' => $kartupasiens,
            'eksplakkal'=> $eksplakkal,
            'users' => $users ?? null
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Eksplakkal  $eksplakkal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eksplakkal $eksplakkal)
    {
        
        $validatedData = $request->validate([
            'kode' => 'required|max:9999999999999|digits_between:1,4|numeric',
            'soal' =>'required'
        ]);
        Eksplakkal::where('id', $eksplakkal->id)
            ->update($validatedData);

        return back()->with('succes', 'Data Eskternal & Internal Oral (Plak & Kalkulus) Eskternal & Internal Oral (Plak & Kalkulus) berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eksplakkal  $eksplakkal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eksplakkal $eksplakkal)
    {
        Eksplakkal::destroy($eksplakkal->id);
        return back()->with('succes', 'Data Eskternal & Internal Oral (Plak & Kalkulus) Eskternal & Internal Oral (Plak & Kalkulus) berhasil dihapus');
    }
}
