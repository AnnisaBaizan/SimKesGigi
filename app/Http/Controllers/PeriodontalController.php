<?php

namespace App\Http\Controllers;

use App\Models\Periodontal;
use App\Models\Kartupasien;
use App\Models\User;
use Illuminate\Http\Request;

class PeriodontalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if (auth()->user()->role === 1) {
            $periodontals = Periodontal::all();
        } 
        elseif (auth()->user()->role === 2) {
            $periodontals = Periodontal::where('pembimbing', auth()->user()->nimnip)->get();
        } 
        else {
            $periodontals = Periodontal::where('user_id', auth()->id())->get();
        }

        return view('pages.periodontal.index')->with('periodontals', $periodontals);
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

        
        return view('pages.periodontal.create')->with([
            'kartupasiens' => $kartupasiens,
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

        Periodontal::create($validatedData);

        return redirect()->route('periodontal.index')->with('success', 'Data periodontal Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periodontal  $periodontal
     * @return \Illuminate\Http\Response
     */
    public function show(Periodontal $periodontal)
    {
        
        return view('pages.periodontal.show')->with('periodontal', $periodontal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periodontal  $periodontal
     * @return \Illuminate\Http\Response
     */
    public function edit(Periodontal $periodontal)
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

        
        return view('pages.periodontal.edit')->with([
            'periodontal' => $periodontal,
            'kartupasiens' => $kartupasiens,
            'users' => $users ?? null
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Periodontal  $periodontal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Periodontal $periodontal)
    {
        
        
        $validatedData = $request->validate([
            'kode' => 'required|max:9999999999999|digits_between:1,4|numeric',
            'soal' =>'required'
        ]);
        Periodontal::where('id', $periodontal->id)
            ->update($validatedData);

        return back()->with('success', 'Data periodontal berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periodontal  $periodontal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periodontal $periodontal)
    {
        
        Periodontal::destroy($periodontal->id);
        return back()->with('succes', 'Data periodontal berhasil dihapus');
    }

    public function acc($id)
    {
        // dd($id);
        $periodontal = Periodontal::where('id', $id)->first();

        if ($periodontal->acc == 0) {
            Periodontal::where('id', $id)->update([
                'acc' => 1
            ]);
        } elseif ($periodontal->acc == 1) {
            Periodontal::where('id', $id)->update([
                'acc' => 0
            ]);
        }

        return back()->with([
            'success' => 'Status ACC berhasil diubah'
        ]);
    }
}
