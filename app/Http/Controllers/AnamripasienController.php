<?php

namespace App\Http\Controllers;

use App\Exports\ExportAnamRiPasien;
use App\Imports\ImportAnamRiPasien;
use App\Models\kartupasien;
use App\Models\anamripasien;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AnamripasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role === 1) {
            $anamripasiens = anamripasien::all();
        } 
        elseif (auth()->user()->role === 2) {
            $anamripasiens = anamripasien::where('pembimbing', auth()->user()->nimnip)->get();
        } 
        else {
            $anamripasiens = anamripasien::where('user_id', auth()->id())->get();
        }

        return view('pages.anamripasien.index')->with('anamripasiens', $anamripasiens);

        // return view('pages.anamripasien.index', [
        //     'anamripasiens' => anamripasien::all()
        // ]);
        // return view('pages.anamripasien.index');
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
        return view('pages.anamripasien.create')->with([
            'kartupasiens' => $kartupasiens,
            'users' => $users ?? null, // Tambahkan ini untuk mengatasi masalah variable undefined
        ]);
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
            'kartupasien_id' => 'required|max:9999999999999|min:1|numeric',
            'klhn_utama' => 'required|max:255',
            'klhn_tmbhn' => 'required|max:255',
            'goldar' => 'required|max:2|min:1',
            'nadi' => 'required|max:3|min:2',
            'tknn_drh' => 'required|max:7|min:5',
            'ktrgn_drh' => 'required|max:10|min:6',
            'suhu' => 'required|max:5|min:2',
            'pernafasan' => 'required|max:6|min:5',
            'jantung' => 'required|max:9|min:3',
            'diabetes' => 'required|max:9|min:3',
            'haemophilia' => 'required|max:9|min:3',
            'hepatitis' => 'required|max:9|min:3',
            'lambung' => 'required|max:9|min:3',
            'pnykt_ln' => 'required|max:9|min:3',
            'nm_pnykt_ln' => 'max:255',
            'alergi_obat' => 'required|max:9|min:3',
            'nm_obat' => 'max:255',
            'alergi_mkn' => 'required|max:9|min:3',
            'nm_mkn' => 'max:255',
        ]);

        anamripasien::create($validatedData);

        return redirect('/anamripasien')->with('succes', 'Anamnesa dan Riwayat Pasien Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\anamripasien  $anamripasien
     * @return \Illuminate\Http\Response
     */
    public function show(anamripasien $anamripasien)
    {
        $kartupasiens = kartupasien::all();
        return view('pages.anamripasien.show', compact('kartupasiens'))->with('anamripasien', $anamripasien);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\anamripasien  $anamripasien
     * @return \Illuminate\Http\Response
     */
    public function edit(anamripasien $anamripasien)
    {
        
        if (auth()->user()->role === 1) {
            $kartupasiens = kartupasien::all();
        } 
        elseif (auth()->user()->role === 2) {
            $kartupasiens = kartupasien::where('pembimbing', auth()->user()->nimnip)->get();
        } 
        else {
            $kartupasiens = kartupasien::where('user_id', auth()->id())->get();
        }

        // $kartupasiens = kartupasien::all();
        return view('pages.anamripasien.edit', compact('kartupasiens'))->with('anamripasien', $anamripasien);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\anamripasien  $anamripasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, anamripasien $anamripasien)
    {
        $validatedData = $request->validate([
            'kartupasien_id' => 'required|max:9999999999999|min:1|numeric',
            'klhn_utama' => 'required|max:255',
            'klhn_tmbhn' => 'required|max:255',
            'goldar' => 'required|max:2|min:1',
            'nadi' => 'required|max:3|min:2',
            'tknn_drh' => 'required|max:7|min:5',
            'ktrgn_drh' => 'required|max:10|min:6',
            'suhu' => 'required|max:5|min:2',
            'pernafasan' => 'required|max:6|min:5',
            'jantung' => 'required|max:9|min:3',
            'diabetes' => 'required|max:9|min:3',
            'haemophilia' => 'required|max:9|min:3',
            'hepatitis' => 'required|max:9|min:3',
            'lambung' => 'required|max:9|min:3',
            'pnykt_ln' => 'required|max:9|min:3',
            'nm_pnykt_ln' => 'max:255',
            'alergi_obat' => 'required|max:9|min:3',
            'nm_obat' => 'max:255',
            'alergi_mkn' => 'required|max:9|min:3',
            'nm_mkn' => 'max:255',
        ]);

        anamripasien::where('id', $anamripasien->id)
            ->update($validatedData);

        return back()->with('succes', 'Anamnesa dan Riwayat Pasien berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\anamripasien  $anamripasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(anamripasien $anamripasien)
    {
        anamripasien::destroy($anamripasien->id);
        return back()->with('succes', 'Anamnesa dan Riwayat Pasien berhasil dihapus');
    }

    public function export(){
        return Excel::download(new ExportAnamRiPasien, 'Data_Anamnesa_Riwayat_Pasien.xlsx');
        return back()->with('succes', 'Data Anamnesa dan Riwayat Pasien Berhasil di eksport');
    }

    public function import(Request $request) 
    {
        // dd($request);
        $this->validate($request, [
            'importanamripasien' => 'required|nullable|mimes:xls,xlsx|max:100'
        ]);

        // $pasien->syncRoles([$request->input('role_id')]);

        request()->file('importanamripasien');
        Excel::import(new ImportAnamRiPasien, request()->file('importanamripasien'));
        return back()->with('succes', 'Data Anamnesa dan Riwayat Pasien Berhasil di import');
    }
}
