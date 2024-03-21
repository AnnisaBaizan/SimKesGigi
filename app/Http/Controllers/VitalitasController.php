<?php

namespace App\Http\Controllers;

use App\Models\Vitalitas;
use App\Models\Kartupasien;
use App\Models\User;
use Illuminate\Http\Request;

class VitalitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role === 1) {
            $vitalitass = Vitalitas::all();
        } 
        elseif (auth()->user()->role === 2) {
            $vitalitass = Vitalitas::where('pembimbing', auth()->user()->nimnip)->get();
        } 
        else {
            $vitalitass = Vitalitas::where('user_id', auth()->id())->get();
        }

        return view('pages.vitalitas.index')->with('vitalitass', $vitalitass);
        
        // return view('pages.vitalitas.index', [
        //     'vitalitass' => Vitalitas::all()
        // ]);
        // return view('pages.vitalitas.index');
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

        
        return view('pages.vitalitas.create')->with([
            'kartupasiens' => $kartupasiens,
            'users' => $users ?? null
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVitalitasRequest  $request
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

        Vitalitas::create($validatedData);

        return redirect('/vitalitas')->with('succes', 'Data vitalitas Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vitalitas  $vitalitas
     * @return \Illuminate\Http\Response
     */
    public function show(Vitalitas $vitalitas)
    {
        return view('pages.vitalitas.show')->with('vitalitas', $vitalitas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vitalitas  $vitalitas
     * @return \Illuminate\Http\Response
     */
    public function edit(Vitalitas $vitalitas)
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

        
        return view('pages.vitalitas.edit')->with([
            'vitalitas' => $vitalitas,
            'kartupasiens' => $kartupasiens,
            'users' => $users ?? null
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVitalitasRequest  $request
     * @param  \App\Models\Vitalitas  $vitalitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vitalitas $vitalitas)
    {
        
        $validatedData = $request->validate([
            'kode' => 'required|max:9999999999999|digits_between:1,4|numeric',
            'soal' =>'required'
        ]);
        Vitalitas::where('id', $vitalitas->id)
            ->update($validatedData);

        return back()->with('succes', 'Data vitalitas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vitalitas  $vitalitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vitalitas $vitalitas)
    {
        Vitalitas::destroy($vitalitas->id);
        return back()->with('succes', 'Data vitalitas berhasil dihapus');
    }

    public function acc($id)
    {
        // dd($id);
        $vitalitas = Vitalitas::where('id', $id)->first();

        if ($vitalitas->acc == 0) {
            Vitalitas::where('id', $id)->update([
                'acc' => 1
            ]);
        } elseif ($vitalitas->acc == 1) {
            Vitalitas::where('id', $id)->update([
                'acc' => 0
            ]);
        }

        return back()->with([
            'success' => 'Status ACC berhasil diubah'
        ]);
    }
}
