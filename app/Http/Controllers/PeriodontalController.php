<?php

namespace App\Http\Controllers;

use App\Models\Eksplakkal;
use App\Models\Periodontal;
use App\Models\Kartupasien;
use App\Models\User;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Financial\CashFlow\Variable\Periodic;

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
            'user_id' => 'required',
            'pembimbing' => 'required',
            'kartupasien_id' => 'required',

            'elemen_permukaan_gigi' => 'required|min:8|max:10',
            'kalkulus' => 'required|min:10|max:12',
            'pocket_sakit' => 'required|numeric|min:0|max:1',
            'pocket_depth' => 'required|min:1|max:5',
            'rubor' => 'required|numeric|min:0|max:1',
            'tumor' => 'required|numeric|min:0|max:1',
            'kolor' => 'required|numeric|min:0|max:1',
            'dolor' => 'required|numeric|min:0|max:1',
            'fungsio' => 'required|numeric|min:0|max:1',
            'attachment' => 'required|numeric|min:0|max:1',
            'pus' => 'required|numeric|min:0|max:1',
            'dll' => 'max:255',
            'masalah' =>'required|max:255'
        ]);

        Periodontal::create($validatedData);

        return back()->with('success', 'Data Periodontal Berhasil Dibuat lakukan hingga elemen permukaan gigi habis');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periodontal  $periodontal
     * @return \Illuminate\Http\Response
     */
    public function show(Periodontal $periodontal)
    {
        $periodontalSubs = Periodontal::where('kartupasien_id', $periodontal->kartupasien_id)
        ->where('kalkulus', 'Subgingiva')
        ->get();
        
        $periodontalSupras = Periodontal::where('kartupasien_id', $periodontal->kartupasien_id)
        ->where('kalkulus', 'Supragingiva')
        ->get();

        $accs = implode(',', Periodontal::where('kartupasien_id', $periodontal->kartupasien_id)->pluck('acc')->toArray());

        return view('pages.periodontal.show')->with([
            'periodontal'=> $periodontal,
            'periodontalSubs'=> $periodontalSubs,
            'periodontalSupras'=> $periodontalSupras,
            'accs' => $accs
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periodontal  $periodontal
     * @return \Illuminate\Http\Response
     */
    public function edit(Periodontal $periodontal)
    {
        if ($periodontal->acc !== 1) {
            if (auth()->user()->role === 1) {
                $kartupasiens = kartupasien::where('user_id', $periodontal->user_id)
                                        ->where('pembimbing', $periodontal->pembimbing)
                                        ->get();
                // $kartupasiens = kartupasien::all();
                $users = User::where('role', 3)->get();
            } 
            elseif (auth()->user()->role === 2) {
                $kartupasiens = kartupasien::where('pembimbing', auth()->user()->nimnip)->get();
            } 
            else {
                $kartupasiens = kartupasien::where('user_id', auth()->id())->get();
            }
    
            $subgingiva = Eksplakkal::where('user_id', $periodontal->user_id)
                ->where('pembimbing', $periodontal->pembimbing)
                ->where('kartupasien_id', $periodontal->kartupasien_id)
                ->pluck('subgingiva')
                ->first(); // Ambil hanya satu baris, karena kita akan explode
    
            $supragingiva = Eksplakkal::where('user_id', $periodontal->user_id)
                ->where('pembimbing', $periodontal->pembimbing)
                ->where('kartupasien_id', $periodontal->kartupasien_id)
                ->pluck('supragingiva')
                ->first(); // Ambil hanya satu baris, karena kita akan explode
    
            // Gabungkan nilai subgingiva dan supragingiva menjadi satu array
            $gigiArray = array_merge(explode(",", $subgingiva), explode(",", $supragingiva));
    
            foreach ($gigiArray as $permukaan_gigi) {
                // Periksa apakah elemen gigi tidak ada dalam tabel periodontal
                    $existingperiodontal = Periodontal::where('elemen_permukaan_gigi', $permukaan_gigi)
                    ->where('user_id', $periodontal->user_id)
                    ->where('pembimbing', $periodontal->pembimbing)
                    ->where('kartupasien_id', $periodontal->kartupasien_id)
                    ->exists();
                if (!$existingperiodontal || $periodontal->elemen_permukaan_gigi==$permukaan_gigi) {
                    $permukaan_gigis[] = $permukaan_gigi;
                    
                }
            }
    
            return view('pages.periodontal.edit')->with([
                'periodontal' => $periodontal,
                'kartupasiens' => $kartupasiens,
                'permukaan_gigis' => $permukaan_gigis,
                'users' => $users ?? null
            ]);
        } else {
            abort(403, 'Anda Tidak dapat Mengakses Halaman Ini, status telah ACC');
        }
        
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
            'user_id' => 'required',
            'pembimbing' => 'required',
            'kartupasien_id' => 'required',

            'elemen_permukaan_gigi' => 'required|min:8|max:10',
            'kalkulus' => 'required|min:10|max:12',
            'pocket_sakit' => 'required|numeric|min:0|max:1',
            'pocket_depth' => 'required|min:1|max:5',
            'rubor' => 'required|numeric|min:0|max:1',
            'tumor' => 'required|numeric|min:0|max:1',
            'kolor' => 'required|numeric|min:0|max:1',
            'dolor' => 'required|numeric|min:0|max:1',
            'fungsio' => 'required|numeric|min:0|max:1',
            'attachment' => 'required|numeric|min:0|max:1',
            'pus' => 'required|numeric|min:0|max:1',
            'dll' => 'max:255',
            'masalah' =>'required|max:255'
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
        if ($periodontal->acc !== 1) {
            Periodontal::destroy($periodontal->id);
            return back()->with('success', 'Data periodontal berhasil dihapus');
        } else {
            abort(403, 'Anda Tidak dapat Mengakses Halaman Ini, status telah ACC');
        }
        
    }

    public function acc($id)
    {
        
        // Ambil entri yang memiliki id yang diberikan
        $periodontal = Periodontal::findOrFail($id);

        // Periksa nilai acc dan perbarui
        $newValue = $periodontal->acc == 0 ? 1 : 0;

        // Perbarui entri yang memiliki nilai acc yang sama dengan entri yang dipilih
        Periodontal::where('user_id', $periodontal->user_id)
            ->where('pembimbing', $periodontal->pembimbing)
            ->where('kartupasien_id', $periodontal->kartupasien_id)
            ->where('acc', $periodontal->acc)
            ->update(['acc' => $newValue]);

        // Perbarui nilai acc untuk entri yang dipilih
        $periodontal->update(['acc' => $newValue]);

        return back()->with([
            'success' => 'Status ACC berhasil diubah'
        ]);
    }
}
