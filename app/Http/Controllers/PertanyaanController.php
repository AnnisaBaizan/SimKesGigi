<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use App\Http\Requests\StorePertanyaanRequest;
use App\Http\Requests\UpdatePertanyaanRequest;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.pertanyaan.index', [
            'pertanyaans' => pertanyaan::all()
        ]);
        // return view('pages.pertanyaan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pertanyaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePertanyaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePertanyaanRequest $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required|max:9999999999999|digits_between:1,4|numeric',
            'soal' =>'required'
        ]);

        Pertanyaan::create($validatedData);

        return redirect('/pertanyaan')->with('succes', 'Pertanyaan Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pertanyaan $pertanyaan)
    {
        return view('pages.pertanyaan.show')->with('pertanyaan', $pertanyaan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pertanyaan $pertanyaan)
    {
        return view('pages.pertanyaan.edit')->with('pertanyaan', $pertanyaan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePertanyaanRequest  $request
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePertanyaanRequest $request, Pertanyaan $pertanyaan)
    {
        $validatedData = $request->validate([
            'kode' => 'required|max:9999999999999|digits_between:1,4|numeric',
            'soal' =>'required'
        ]);
        Pertanyaan::where('id', $pertanyaan->id)
            ->update($validatedData);

        return back()->with('succes', 'pertanyaan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pertanyaan $pertanyaan)
    {
        Pertanyaan::destroy($pertanyaan->id);
        return back()->with('succes', 'Pertanyaan berhasil dihapus');
    }
}
