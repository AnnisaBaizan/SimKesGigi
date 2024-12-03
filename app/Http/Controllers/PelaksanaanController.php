<?php

namespace App\Http\Controllers;

use App\Models\Askepgilut;
use App\Models\Diagnosa;
use App\Models\gigi;
use App\Models\kartupasien;
use App\Models\Odontogram;
use App\Models\Pelaksanaan;
use App\Models\User;
use Illuminate\Http\Request;

class PelaksanaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role === 1) {
            $pelaksanaans = Pelaksanaan::all();
        } elseif (auth()->user()->role === 2) {
            $pelaksanaans = Pelaksanaan::where('pembimbing', auth()->user()->nimnip)->get();
        } else {
            $pelaksanaans = Pelaksanaan::where('user_id', auth()->id())->get();
        }

        return view('pages.pelaksanaan.index')->with('pelaksanaans', $pelaksanaans);
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

        $gigis = gigi::all();

        return view('pages.pelaksanaan.create')->with([
            'kartupasiens' => $kartupasiens,
            'gigis' => $gigis,
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

            'gigi' => 'required|min:2|max:2',
            'diagnosa_id' => 'required|max:255',
            'intervensi' => 'required|max:255',
            'hasil' => 'required|max:255',
            'rencana' => 'required|max:255',
        ]);

        Pelaksanaan::create($validatedData);

        return back()->with('success', 'Data pelaksanaan Berhasil Dibuat lakukan hingga elemen gigi habis');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelaksanaan  $pelaksanaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelaksanaan $pelaksanaan)
    {
        // Get all pelaksanaans related to the kartupasien_id
        $pelaksanaans = Pelaksanaan::where('kartupasien_id', $pelaksanaan->kartupasien_id)->get();
        $accs = implode(',', Pelaksanaan::where('kartupasien_id', $pelaksanaan->kartupasien_id)->pluck('acc')->toArray());

            
        // dd($data);
        // dd($accs);
        return view('pages.pelaksanaan.show')->with([
            'pelaksanaan' => $pelaksanaan,
            'pelaksanaans' => $pelaksanaans,
            'accs' => $accs
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelaksanaan  $pelaksanaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelaksanaan $pelaksanaan)
    {
        if ($pelaksanaan->acc !== 1) {
            if (auth()->user()->role === 1) {
                $kartupasiens = kartupasien::where('user_id', $pelaksanaan->user_id)
                    // ->where('pembimbing', $pelaksanaan->pembimbing)
                    ->get();
                // $kartupasiens = kartupasien::all();
                $users = User::where('role', 3)->get();
            } elseif (auth()->user()->role === 2) {
                $kartupasiens = kartupasien::where('pembimbing', auth()->user()->nimnip)->get();
            } else {
                $kartupasiens = kartupasien::where('user_id', auth()->id())->get();
            }

            $diagnosas = Diagnosa::where('user_id', $pelaksanaan->user_id)
                ->where('pembimbing', $pelaksanaan->pembimbing)
                ->where('kartupasien_id', $pelaksanaan->kartupasien_id)
                ->where('gigi', $pelaksanaan->gigi)
                ->get();

            $data = [];

            foreach ($diagnosas as $diagnosa) {
                $penyebab = explode('|', $diagnosa->penyebab);
                $gejala = explode('|', $diagnosa->gejala);
                $askepIds = explode('|', $diagnosa->askepgilut);
                $askepData = [];

                foreach ($askepIds as $index => $id_askep) {
                    $askepgilut = Askepgilut::find($id_askep);

                    $penyebabs = get_c('penyebabs', 'askepgilut_id', $id_askep)->toArray();
                    $penyebabList = array_filter($penyebabs, function ($penyebabI) use ($penyebab, $index) {
                        return in_array($penyebabI->id, explode(',', $penyebab[$index] ?? ''));
                    });

                    $gejalas = get_c('gejalas', 'askepgilut_id', $id_askep)->toArray();
                    $gejalaList = array_filter($gejalas, function ($gejalaI) use ($gejala, $index) {
                        return in_array($gejalaI->id, explode(',', $gejala[$index] ?? ''));
                    });

                    $askepData[] = [
                        'askepgilut' => $askepgilut,
                        'penyebab' => $penyebabList,
                        'gejala' => $gejalaList,
                    ];
                }

                $data[] = [
                    'masalah' => $diagnosa->masalah,
                    'askepgilut' => $askepData,
                ];
            }

            $gigis = gigi::all();

            return view('pages.pelaksanaan.edit', compact('data'))->with([
                'pelaksanaan' => $pelaksanaan,
                'kartupasiens' => $kartupasiens,
                'gigis' => $gigis,
                'penyebab' => $penyebab,
                'gejala' => $gejala,
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
     * @param  \App\Models\Pelaksanaan  $pelaksanaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelaksanaan $pelaksanaan)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'pembimbing' => 'required',
            'kartupasien_id' => 'required',

            'gigi' => 'required|min:2|max:2',
            'diagnosa_id' => 'required|max:255',
            'intervensi' => 'required|max:255',
            'hasil' => 'required|max:255',
            'rencana' => 'required|max:255',
        ]);
        Pelaksanaan::where('id', $pelaksanaan->id)
            ->update($validatedData);

        return back()->with('success', 'Data pelaksanaan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelaksanaan  $pelaksanaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelaksanaan $pelaksanaan)
    {
        if ($pelaksanaan->acc !== 1) {
            Pelaksanaan::destroy($pelaksanaan->id);
            return back()->with('success', 'Data pelaksanaan berhasil dihapus');
        } else {
            abort(403, 'Anda Tidak dapat Mengakses Halaman Ini, status telah ACC');
        }
    }
    public function acc($id)
    {
        // Ambil entri yang memiliki id yang diberikan
        $pelaksanaan = Pelaksanaan::findOrFail($id);

        // Periksa nilai acc dan perbarui
        $newValue = $pelaksanaan->acc == 0 ? 1 : 0;

        // Perbarui entri yang memiliki nilai acc yang sama dengan entri yang dipilih
        Pelaksanaan::where('user_id', $pelaksanaan->user_id)
            ->where('pembimbing', $pelaksanaan->pembimbing)
            ->where('kartupasien_id', $pelaksanaan->kartupasien_id)
            ->where('acc', $pelaksanaan->acc)
            ->update(['acc' => $newValue]);

        // Perbarui nilai acc untuk entri yang dipilih
        $pelaksanaan->update(['acc' => $newValue]);

        return back()->with([
            'success' => 'Status ACC berhasil diubah'
        ]);
    }
}
