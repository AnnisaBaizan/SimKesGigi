<?php

namespace App\Http\Controllers;

use App\Exports\ExportKartuPasien;
use App\Imports\ImportKartuPasien;
use App\Models\anamripasien;
use App\Models\Anomalimukosa;
use App\Models\Diagnosa;
use App\Models\Eksplakkal;
use App\Models\kartupasien;
use App\Models\Odontogram;
use App\Models\Ohis;
use App\Models\Pengsiperi;
use App\Models\Periodontal;
use App\Models\User;
use App\Models\Vitalitas;
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
        if (auth()->user()->role === 1) {
            $kartupasiens = kartupasien::all();
        } 
        elseif (auth()->user()->role === 2) {
            $kartupasiens = kartupasien::where('pembimbing', auth()->user()->nimnip)->get();
        } 
        else {
            $kartupasiens = kartupasien::where('user_id', auth()->id())->get();
        }

        return view('pages.kartupasien.index')->with('kartupasiens', $kartupasiens);

        // return view('pages.kartupasien.index', [
        //     'kartupasiens' => kartupasien::all()
        // ]);
        // return view('pages.kartupasien.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('role', 3)->get();
        $id_max = sprintf("%09d", kartupasien::max('id') + 1);

        return view('pages.kartupasien.create')->with([
            'id_max' => $id_max,
            'users' => $users ?? null
        ]);
        // return view('pages.kartupasien.create', compact('id_max'));
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
            'user_id' => 'required',
            'pembimbing' => 'required',
            'no_kartu'=> 'required|numeric|digits:13',
            'nama' => 'required|max:40|min:4',
            'no_iden' => 'required|numeric|digits_between:14,16',
            'tgl_lhr' => 'required|max:20|date',
            'umur' => 'required|max:999|min:1|numeric',
            'jk' => 'required|max:10',
            'suku' => 'required|max:40',
            'pekerjaan' => 'required|max:100',
            'hub' => 'required|max:50',
            'no_hp' => 'required|numeric|digits_between:10,13',
            'no_tlpn' => 'required|numeric|digits_between:10,13',
            'alamat' =>'required|max:255'
        ]);

        kartupasien::create($validatedData);

        return redirect()->route('kartupasien.index')->with('success', 'Kartu Pasien Berhasil Dibuat');
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
        $users = User::where('role', 3)->get();
        $id_max = sprintf("%09d", $kartupasien->id);
        
        return view('pages.kartupasien.edit')->with([
            'kartupasien'=> $kartupasien,
            'id_max' => $id_max,
            'users' => $users ?? null
        ]);
        // return view('pages.kartupasien.edit', compact('id_max'))->with('kartupasien', $kartupasien);
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
            'user_id' => 'required',
            'pembimbing' => 'required',
            'no_kartu'=> 'required|numeric|digits:13',
            'nama' => 'required|max:40|min:4',
            'no_iden' => 'required|numeric|digits_between:14,16',
            'tgl_lhr' => 'required|max:20|date',
            'umur' => 'required|max:999|min:1|numeric',
            'jk' => 'required|max:10',
            'suku' => 'required|max:40',
            'pekerjaan' => 'required|max:100',
            'hub' => 'required|max:50',
            'no_hp' => 'required|numeric|digits_between:10,13',
            'no_tlpn' => 'required|numeric|digits_between:10,13',
            'alamat' =>'required|max:255'
        ]);

        kartupasien::where('id', $kartupasien->id)
            ->update($validatedData);

        return back()->with('success', 'Kartu Pasien berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kartupasien  $kartupasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(kartupasien $kartupasien)
    {
        // Lakukan pengecekan jika ada data terkait sebelum penghapusan
        if (
            $kartupasien->anamripasien()->exists() ||
            $kartupasien->pengsiperi()->exists() ||
            $kartupasien->eksplakkal()->exists() ||
            $kartupasien->ohis()->exists() ||
            $kartupasien->odontogram()->exists() ||
            $kartupasien->anomalimukosa()->exists() ||
            $kartupasien->vitalitas()->exists() ||
            $kartupasien->periodontal()->exists() ||
            $kartupasien->diagnosa()->exists()
        ) {
            // Jika ada data terkait, kembalikan pesan kesalahan
            return back()->with('error', 'Tidak bisa menghapus Kartu Pasien karena masih terdapat data terkait.');
        }
    
        // Jika tidak ada data terkait, lanjutkan dengan penghapusan
        kartupasien::destroy($kartupasien->id);
    
        // Kembalikan pesan sukses
        return back()->with('success', 'Kartu Pasien dan data-data Terkait berhasil dihapus');
    }
    

    public function export(){
        return Excel::download(new ExportKartuPasien, 'Data_Kartu_Pasien.xlsx');
        return back()->with('success', 'Data Kartu Pasien Berhasil di eksport');
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
        return back()->with('success', 'Data Kartu Pasien Berhasil di import');
    }
}
