<?php

namespace App\Http\Controllers;

use App\Models\kartupasien;
use App\Models\Odontogram;
use App\Models\Perencanaan;
use App\Models\User;
use Illuminate\Http\Request;

class PerencanaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role === 1) {
            $perencanaans = Perencanaan::all();
        } elseif (auth()->user()->role === 2) {
            $perencanaans = Perencanaan::where('pembimbing', auth()->user()->nimnip)->get();
        } else {
            $perencanaans = Perencanaan::where('user_id', auth()->id())->get();
        }

        return view('pages.perencanaan.index')->with('perencanaans', $perencanaans);
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
        } elseif (auth()->user()->role === 2) {
            $kartupasiens = kartupasien::where('pembimbing', auth()->user()->nimnip)->get();
        } else {
            $kartupasiens = kartupasien::where('user_id', auth()->id())->get();
        }


        return view('pages.perencanaan.create')->with([
            'kartupasiens' => $kartupasiens,
            'users' => $users ?? null
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
            'user_id' => 'required',
            'pembimbing' => 'required',
            'kartupasien_id' => 'required',

            'elemen_gigi' => 'required|min:2|max:2',
            'inspeksi' => 'required|numeric|min:0|max:1',
            'thermis' => 'required|numeric|min:0|max:1',
            'sondasi' => 'required|numeric|min:0|max:1',
            'perkusi' => 'required|numeric|min:0|max:1',
            'druk' => 'required|numeric|min:0|max:1',
            'mobility' => 'required|numeric|min:0|max:1',
            'masalah' => 'required|max:255',
        ]);

        Perencanaan::create($validatedData);

        return back()->with('success', 'Data perencanaan Berhasil Dibuat lakukan hingga elemen gigi habis');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perencanaan  $perencanaan
     * @return \Illuminate\Http\Response
     */
    public function show(Perencanaan $perencanaan)
    {
        $perencanaans = Perencanaan::where('kartupasien_id', $perencanaan->kartupasien_id)->get();
        $accs = implode(',', Perencanaan::where('kartupasien_id', $perencanaan->kartupasien_id)->pluck('acc')->toArray());

        // dd($accs);
        return view('pages.perencanaan.show')->with([
            'perencanaan'=> $perencanaan,
            'perencanaans'=> $perencanaans,
            'accs' => $accs
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perencanaan  $perencanaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perencanaan $perencanaan)
    {
        if ($perencanaan->acc !== 1) {
            if (auth()->user()->role === 1) {
                $kartupasiens = kartupasien::where('user_id', $perencanaan->user_id)
                                        ->where('pembimbing', $perencanaan->pembimbing)
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
    
            $elemengigis = Odontogram::where('user_id', $perencanaan->user_id)
                ->where('pembimbing', $perencanaan->pembimbing)
                ->where('kartupasien_id', $perencanaan->kartupasien_id)
                ->get('gigi_karies');
    
                // dd($elemengigis);
    
            $gigis = [];
    
            foreach ($elemengigis as $elemengigi) {
                $gigiArray = explode(",", $elemengigi->gigi_karies);
                foreach ($gigiArray as $gigi) {
                    // Cek apakah data perencanaan sudah ada untuk elemen gigi yang sedang diproses
                    $existingperencanaan = Perencanaan::where('elemen_gigi', $gigi)
                        ->where('user_id', $perencanaan->user_id)
                        ->where('pembimbing', $perencanaan->pembimbing)
                        ->where('kartupasien_id', $perencanaan->kartupasien_id)
                        ->exists();
                    if (!$existingperencanaan || $perencanaan->elemen_gigi==$gigi) {
                        $gigis[] = $gigi;
                    }
                }
            }
            // dd($gigis);
    
            return view('pages.perencanaan.edit')->with([
                'perencanaan' => $perencanaan,
                'kartupasiens' => $kartupasiens,
                'gigis' => $gigis,
                'users' => $users ?? null
            ]);
        } else {
            abort(403, 'Anda Tidak dapat Mengakses Halaman Ini, status telah ACC');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perencanaan  $perencanaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perencanaan $perencanaan)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'pembimbing' => 'required',
            'kartupasien_id' => 'required',

            'elemen_gigi' => 'required|min:2|max:2',
            'inspeksi' => 'required|numeric|min:0|max:1',
            'thermis' => 'required|numeric|min:0|max:1',
            'sondasi' => 'required|numeric|min:0|max:1',
            'perkusi' => 'required|numeric|min:0|max:1',
            'druk' => 'required|numeric|min:0|max:1',
            'mobility' => 'required|numeric|min:0|max:1',
            'masalah' => 'required|max:255',
        ]);
        Perencanaan::where('id', $perencanaan->id)
            ->update($validatedData);

        return back()->with('success', 'Data perencanaan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perencanaan  $perencanaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perencanaan $perencanaan)
    {
        if ($perencanaan->acc !== 1) {
            Perencanaan::destroy($perencanaan->id);
            return back()->with('success', 'Data perencanaan berhasil dihapus');
        } else {
            abort(403, 'Anda Tidak dapat Mengakses Halaman Ini, status telah ACC');
        }
        
    }

    public function acc($id)
    {
        // Ambil entri yang memiliki id yang diberikan
        $perencanaan = Perencanaan::findOrFail($id);

        // Periksa nilai acc dan perbarui
        $newValue = $perencanaan->acc == 0 ? 1 : 0;

        // Perbarui entri yang memiliki nilai acc yang sama dengan entri yang dipilih
        Perencanaan::where('user_id', $perencanaan->user_id)
            ->where('pembimbing', $perencanaan->pembimbing)
            ->where('kartupasien_id', $perencanaan->kartupasien_id)
            ->where('acc', $perencanaan->acc)
            ->update(['acc' => $newValue]);

        // Perbarui nilai acc untuk entri yang dipilih
        $perencanaan->update(['acc' => $newValue]);

        return back()->with([
            'success' => 'Status ACC berhasil diubah'
        ]);
    }
}
