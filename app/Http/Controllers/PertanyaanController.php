<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;

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
            'pertanyaans' =>Pertanyaan::all()
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
        return view('pages.pertanyaan.create', [
            'pertanyaans' => Pertanyaan::all()
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
            'kode' => 'required|max:9999999999999|digits_between:1,4|numeric',
            'soal' =>'required'
        ]);

        Pertanyaan::create($validatedData);

        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan Berhasil Dibuat');
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
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pertanyaan $pertanyaan)
    {
        $validatedData = $request->validate([
            'kode' => 'required|max:9999999999999|digits_between:1,4|numeric',
            'soal' =>'required'
        ]);
        Pertanyaan::where('id', $pertanyaan->id)
            ->update($validatedData);

        return back()->with('success', 'pertanyaan berhasil diubah');
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
        return back()->with('success', 'Pertanyaan berhasil dihapus');
    }

    public function status($id)
    {
        $pertanyaan = Pertanyaan::where('id', $id)->first();

        if ($pertanyaan->status == 0) {
            Pertanyaan::where('id', $id)->update([
                'status' => 1
            ]);
        } elseif ($pertanyaan->status == 1) {
            Pertanyaan::where('id', $id)->update([
                'status' => 0
            ]);
        }

        return back()->with([
            'success' => 'Status pertanyaan berhasil diubah'
        ]);
    }
}
