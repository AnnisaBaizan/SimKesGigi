<?php

namespace App\Http\Controllers;

use App\Models\Vitalitas;
use App\Models\kartupasien;
use App\Models\Odontogram;
use App\Models\User;
use Illuminate\Http\Request;

class VitalitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role === 1) {
            $vitalitass = Vitalitas::all();
        } elseif (auth()->user()->role === 2) {
            $vitalitass = Vitalitas::where('pembimbing', auth()->user()->nimnip)->get();
        } else {
            $vitalitass = Vitalitas::where('user_id', auth()->id())->get();
        }

        return view('pages.vitalitas.index')->with('vitalitass', $vitalitass);

        // return view('pages.vitalitas.index', [
        //     'vitalitass' => Vitalitas::all()
        // ]);
        // return view('pages.vitalitas.index');
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


        return view('pages.vitalitas.create')->with([
            'kartupasiens' => $kartupasiens,
            'users' => $users ?? null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVitalitasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'user_id' => 'required',
            'pembimbing' => 'required',
            'kartupasien_id' => 'required',
            'odontogram_id' => 'required',

            'elemen_gigi' => 'required|min:2|max:2',
            'inspeksi' => 'required|numeric|min:0|max:1',
            'thermis' => 'required|numeric|min:0|max:1',
            'sondasi' => 'required|numeric|min:0|max:1',
            'perkusi' => 'required|numeric|min:0|max:1',
            'druk' => 'required|numeric|min:0|max:1',
            'mobility' => 'required|numeric|min:0|max:1',
            'masalah' => 'required|max:255',
        ]);

        Vitalitas::create($validatedData);

        return back()->with('success', 'Data vitalitas Berhasil Dibuat lakukan hingga elemen gigi habis');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vitalitas  $vitalitas
     * @return \Illuminate\Http\Response
     */
    public function show(Vitalitas $vitalitas)
    {
        $vitalitass = Vitalitas::where('kartupasien_id', $vitalitas->kartupasien_id)->get();
        $accs = implode(',', Vitalitas::where('kartupasien_id', $vitalitas->kartupasien_id)->pluck('acc')->toArray());

        // dd($accs);
        return view('pages.vitalitas.show')->with([
            'vitalitas' => $vitalitas,
            'vitalitass' => $vitalitass,
            'accs' => $accs
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vitalitas  $vitalitas
     * @return \Illuminate\Http\Response
     */
    public function edit(Vitalitas $vitalitas)
    {
        if ($vitalitas->acc !== 1) {
            if (auth()->user()->role === 1) {
                $kartupasiens = kartupasien::where('user_id', $vitalitas->user_id)
                    ->where('pembimbing', $vitalitas->pembimbing)
                    ->get();
                // $kartupasiens = kartupasien::all();
                $users = User::where('role', 3)->get();
            } elseif (auth()->user()->role === 2) {
                $kartupasiens = kartupasien::where('pembimbing', auth()->user()->nimnip)->get();
            } else {
                $kartupasiens = kartupasien::where('user_id', auth()->id())->get();
            }

            $odontograms = Odontogram::where('user_id', $vitalitas->user_id)
                ->where('pembimbing', $vitalitas->pembimbing)
                ->where('kartupasien_id', $vitalitas->kartupasien_id)
                ->where('id', $vitalitas->odontogram_id)
                ->get('created_at');

            $elemengigis = Odontogram::where('user_id', $vitalitas->user_id)
                ->where('pembimbing', $vitalitas->pembimbing)
                ->where('kartupasien_id', $vitalitas->kartupasien_id)
                ->get('gigi_karies');

            // dd($elemengigis);

            $gigis = [];

            foreach ($elemengigis as $elemengigi) {
                $gigiArray = explode(",", $elemengigi->gigi_karies);
                foreach ($gigiArray as $gigi) {
                    // Cek apakah data vitalitas sudah ada untuk elemen gigi yang sedang diproses
                    $existingVitalitas = Vitalitas::where('elemen_gigi', $gigi)
                        ->where('user_id', $vitalitas->user_id)
                        ->where('pembimbing', $vitalitas->pembimbing)
                        ->where('kartupasien_id', $vitalitas->kartupasien_id)
                        ->exists();
                    if (!$existingVitalitas || $vitalitas->elemen_gigi == $gigi) {
                        $gigis[] = $gigi;
                    }
                }
            }
            // dd($gigis);

            return view('pages.vitalitas.edit')->with([
                'vitalitas' => $vitalitas,
                'kartupasiens' => $kartupasiens,
                'odontograms' => $odontograms,
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
     * @param  \App\Http\Requests\UpdateVitalitasRequest  $request
     * @param  \App\Models\Vitalitas  $vitalitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vitalitas $vitalitas)
    {

        $validatedData = $request->validate([
            'user_id' => 'required',
            'pembimbing' => 'required',
            'kartupasien_id' => 'required',
            'odontogram_id' => 'required',

            'elemen_gigi' => 'required|min:2|max:2',
            'inspeksi' => 'required|numeric|min:0|max:1',
            'thermis' => 'required|numeric|min:0|max:1',
            'sondasi' => 'required|numeric|min:0|max:1',
            'perkusi' => 'required|numeric|min:0|max:1',
            'druk' => 'required|numeric|min:0|max:1',
            'mobility' => 'required|numeric|min:0|max:1',
            'masalah' => 'required|max:255',
        ]);
        Vitalitas::where('id', $vitalitas->id)
            ->update($validatedData);

        return back()->with('success', 'Data vitalitas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vitalitas  $vitalitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vitalitas $vitalitas)
    {
        if ($vitalitas->acc !== 1) {
            Vitalitas::destroy($vitalitas->id);
            return back()->with('success', 'Data vitalitas berhasil dihapus');
        } else {
            abort(403, 'Anda Tidak dapat Mengakses Halaman Ini, status telah ACC');
        }
    }

    public function acc($id)
    {
        // Ambil entri yang memiliki id yang diberikan
        $vitalitas = Vitalitas::findOrFail($id);

        // Periksa nilai acc dan perbarui
        $newValue = $vitalitas->acc == 0 ? 1 : 0;

        // Perbarui entri yang memiliki nilai acc yang sama dengan entri yang dipilih
        Vitalitas::where('user_id', $vitalitas->user_id)
            ->where('pembimbing', $vitalitas->pembimbing)
            ->where('kartupasien_id', $vitalitas->kartupasien_id)
            ->where('acc', $vitalitas->acc)
            ->update(['acc' => $newValue]);

        // Perbarui nilai acc untuk entri yang dipilih
        $vitalitas->update(['acc' => $newValue]);

        return back()->with([
            'success' => 'Status ACC berhasil diubah'
        ]);
    }
}
