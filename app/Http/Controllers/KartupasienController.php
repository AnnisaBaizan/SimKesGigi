<?php

namespace App\Http\Controllers;

use App\Exports\ExportKartuPasien;
use App\Imports\ImportKartuPasien;
use App\Models\kartupasien;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KartupasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.kartupasien.index', [
            'kartupasiens' => kartupasien::all()
        ]);
        // return view('pages.kartupasien.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_max = sprintf("%09d", Kartupasien::max('id') + 1);
        return view('pages.kartupasien.create', compact('id_max'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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

        kartupasien::create($validatedData);

        return redirect('/kartupasien')->with('succes', 'Kartu Pasien Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kartupasien  $kartupasien
     * @return \Illuminate\Http\Response
     */
    public function show(kartupasien $kartupasien)
    {
        return view('pages.kartupasien.show')->with('kartupasien', $kartupasien);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kartupasien  $kartupasien
     * @return \Illuminate\Http\Response
     */
    public function edit(kartupasien $kartupasien)
    {
        // dd($kartupasien);

        $id_max = sprintf("%09d", $kartupasien->id);
        return view('pages.kartupasien.edit', compact('id_max'))->with('kartupasien', $kartupasien);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kartupasien  $kartupasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kartupasien $kartupasien)
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

        kartupasien::where('id', $kartupasien->id)
            ->update($validatedData);

        return back()->with('succes', 'Kartu Pasien berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kartupasien  $kartupasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(kartupasien $kartupasien)
    {
        Kartupasien::destroy($kartupasien->id);
        return back()->with('succes', 'Kartu Pasien berhasil dihapus');
    }

    public function export(){
        return Excel::download(new ExportKartuPasien, 'Data_Kartu_Pasien.xlsx');
        return back()->with('succes', 'Data Kartu Pasien Berhasil di eksport');
    }

    public function import(Request $request) 
    {
        // dd($request);
        $this->validate($request, [
            'importpasien' => 'required|nullable|mimes:xls,xlsx|max:100'
        ]);

        // $pasien->syncRoles([$request->input('role_id')]);

        request()->file('importpasien');
        Excel::import(new ImportKartuPasien, request()->file('importpasien'));
        return back()->with('succes', 'Data Kartu Pasien Berhasil di import');
    }
}
