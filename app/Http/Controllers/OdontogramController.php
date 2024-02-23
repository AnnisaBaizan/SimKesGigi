<?php

namespace App\Http\Controllers;

use App\Models\Odontogram;
use App\Models\Kartupasien;
use Illuminate\Http\Request;

class OdontogramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.odontogram.index', [
            'odontograms' => Odontogram::all()
        ]);
        // return view('pages.odontogram.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kartupasiens = Kartupasien::all();
        
        return view('pages.odontogram.create')->with([
            'kartupasiens' => $kartupasiens,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOdontogramRequest  $request
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

        Odontogram::create($validatedData);

        return redirect('/kartupasien')->with('succes', 'Data Odontogram Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Odontogram  $odontogram
     * @return \Illuminate\Http\Response
     */
    public function show(Odontogram $odontogram)
    {
        return view('pages.odontogram.show')->with('odontogram', $odontogram);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Odontogram  $odontogram
     * @return \Illuminate\Http\Response
     */
    public function edit(Odontogram $odontogram)
    {
        return view('pages.odontogram.edit')->with('odontogram', $odontogram);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOdontogramRequest  $request
     * @param  \App\Models\Odontogram  $odontogram
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Odontogram $odontogram)
    {
        $validatedData = $request->validate([
            'kode' => 'required|max:9999999999999|digits_between:1,4|numeric',
            'soal' =>'required'
        ]);
        Odontogram::where('id', $odontogram->id)
            ->update($validatedData);

        return back()->with('succes', 'Data Odontogram berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Odontogram  $odontogram
     * @return \Illuminate\Http\Response
     */
    public function destroy(Odontogram $odontogram)
    {
        Odontogram::destroy($odontogram->id);
        return back()->with('succes', 'Data Odontogram berhasil dihapus');
    }
}
