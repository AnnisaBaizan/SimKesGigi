<?php

namespace App\Http\Controllers;

use App\Models\Pengsiperi;
use App\Models\kartupasien;
use App\Http\Requests\StorePengsiperiRequest;
use App\Http\Requests\UpdatePengsiperiRequest;
use App\Models\Pertanyaan;

class PengsiperiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.pengsiperi.index', [
            'pengsiperis' => Pengsiperi::all()
        ]);
        // return view('pages.pengsiperi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kartupasiens = Kartupasien::all();
        $pengetahuans = Pertanyaan::where('kode', 1)->get();
        $perilakus = Pertanyaan::where('kode', 2)->get();
        
        return view('pages.pengsiperi.create')->with([
            'kartupasiens' => $kartupasiens,
            'pengetahuans' => $pengetahuans,
            'perilakus' => $perilakus,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePengsiperiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePengsiperiRequest $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required|max:9999999999999|digits_between:1,4|numeric',
            'soal' =>'required'
        ]);

        Pengsiperi::create($validatedData);

        return redirect('/pengsiperi')->with('succes', 'Pengetahuan, Keterampilan, Perilaku dan peran orang tua Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengsiperi  $pengsiperi
     * @return \Illuminate\Http\Response
     */
    public function show(Pengsiperi $pengsiperi)
    {
        return view('pages.pengsiperi.show')->with('pengsiperi', $pengsiperi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengsiperi  $pengsiperi
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengsiperi $pengsiperi)
    {
        return view('pages.pengsiperi.edit')->with('pengsiperi', $pengsiperi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengsiperiRequest  $request
     * @param  \App\Models\Pengsiperi  $pengsiperi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePengsiperiRequest $request, Pengsiperi $pengsiperi)
    {
        $validatedData = $request->validate([
            'kode' => 'required|max:9999999999999|digits_between:1,4|numeric',
            'soal' =>'required'
        ]);
        Pengsiperi::where('id', $pengsiperi->id)
            ->update($validatedData);

        return back()->with('succes', 'Pengetahuan, Keterampilan, Perilaku dan peran orang tua berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengsiperi  $pengsiperi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengsiperi $pengsiperi)
    {
        Pengsiperi::destroy($pengsiperi->id);
        return back()->with('succes', 'Pengetahuan, Keterampilan, Perilaku dan peran orang tua berhasil dihapus');
    }
}
