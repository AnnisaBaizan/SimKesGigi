<?php

namespace App\Http\Controllers;

use App\Models\Anomalimukosa;
use App\Models\Kartupasien;
use Illuminate\Http\Request;

class AnomalimukosaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.anomalimukosa.index', [
            'anomalimukosas' => Anomalimukosa::all()
        ]);
        // return view('pages.anomalimukosa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kartupasiens = Kartupasien::all();
        
        return view('pages.anomalimukosa.create')->with([
            'kartupasiens' => $kartupasiens,
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

        Anomalimukosa::create($validatedData);

        return redirect('/anomalimukosa')->with('succes', 'Data Anomali Gigi dan Mukosa Mulut Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anomalimukosa  $anomalimukosa
     * @return \Illuminate\Http\Response
     */
    public function show(Anomalimukosa $anomalimukosa)
    {
        return view('pages.anomalimukosa.show')->with('anomalimukosa', $anomalimukosa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anomalimukosa  $anomalimukosa
     * @return \Illuminate\Http\Response
     */
    public function edit(Anomalimukosa $anomalimukosa)
    {
        return view('pages.anomalimukosa.edit')->with('anomalimukosa', $anomalimukosa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Anomalimukosa  $anomalimukosa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anomalimukosa $anomalimukosa)
    {
          
        $validatedData = $request->validate([
            'kode' => 'required|max:9999999999999|digits_between:1,4|numeric',
            'soal' =>'required'
        ]);
        Anomalimukosa::where('id', $anomalimukosa->id)
            ->update($validatedData);

        return back()->with('succes', 'Data Anomali Gigi dan Mukosa Mulut berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anomalimukosa  $anomalimukosa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anomalimukosa $anomalimukosa)
    {
        Anomalimukosa::destroy($anomalimukosa->id);
        return back()->with('succes', 'Data anomalimukosa berhasil dihapus');
    }
}
