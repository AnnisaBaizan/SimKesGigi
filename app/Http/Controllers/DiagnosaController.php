<?php

namespace App\Http\Controllers;

use App\Models\Askepgilut;
use App\Models\Diagnosa;
use Illuminate\Http\Request;
use App\Models\Eksplakkal;
use App\Models\Gejala;
use App\Models\gigi;
use App\Models\kartupasien;
use App\Models\Penyebab;
use App\Models\User;

class DiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role === 1) {
            $diagnosas = Diagnosa::all();
        } elseif (auth()->user()->role === 2) {
            $diagnosas = Diagnosa::where('pembimbing', auth()->user()->nimnip)->get();
        } else {
            $diagnosas = Diagnosa::where('user_id', auth()->id())->get();
        }

        return view('pages.diagnosa.index')->with('diagnosas', $diagnosas);
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
        $askepgiluts = Askepgilut::all();

        return view('pages.diagnosa.create')->with([
            'kartupasiens' => $kartupasiens,
            'gigis' => $gigis,
            'askepgiluts' => $askepgiluts,
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
        // Validasi data input
        $validatedData = $request->validate([
            'user_id' => 'required',
            'pembimbing' => 'required',
            'kartupasien_id' => 'required',
            'gigi' => 'required|min:2|max:2',
            'masalah' => 'required|max:255',
            'diagnosa.*.askepgilut' => 'required',
            'diagnosa.*.penyebab' => 'required|array|min:1',
            'diagnosa.*.gejala' => 'required|array|min:1',
        ], [
            'diagnosa.*.askepgilut.required' => 'Diagnosis Askepgilut harus dipilih',
            'diagnosa.*.penyebab.required' => 'Penyebab harus dipilih',
            'diagnosa.*.gejala.required' => 'Gejala harus dipilih',
        ]);

        // Ambil data diagnosa dari request
        $data = $request->input('diagnosa', []);

        if (empty($data)) {
            return back()->withErrors(['diagnosa' => 'Data diagnosa tidak valid']);
        }

        // Inisialisasi variabel untuk menyimpan data yang akan disimpan di database
        $askepgilutArray = [];
        $penyebabArray = [];
        $gejalaArray = [];

        // Loop melalui setiap item dalam data diagnosa
        foreach ($data as $item) {
            // Menggabungkan nilai askepgilut
            $askepgilutArray[] = $item['askepgilut'][0];

            // Menggabungkan nilai penyebab
            $penyebabArray[] = implode(',', $item['penyebab']);

            // Menggabungkan nilai gejala
            $gejalaArray[] = implode(',', $item['gejala']);
        }

        // Gabungkan nilai-nilai yang diperoleh ke dalam bentuk string
        $askepgilut = implode('|', $askepgilutArray);
        $penyebab = implode('|', $penyebabArray);
        $gejala = implode('|', $gejalaArray);

        // Simpan data diagnosa ke dalam database
        $diagnosa = new Diagnosa();
        $diagnosa->askepgilut = $askepgilut;
        $diagnosa->penyebab = $penyebab;
        $diagnosa->gejala = $gejala;

        // Masukkan juga data dari validasi ke model Diagnosa
        $diagnosa->fill($validatedData);

        $diagnosa->save();

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Data Diagnosa Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function show(Diagnosa $diagnosa)
    {
        $diagnosas = Diagnosa::where('kartupasien_id', $diagnosa->kartupasien_id)->get();
    
        // Mendapatkan data askepgilut
        $askepgiluts = Askepgilut::all();
    
        // Inisialisasi array untuk menyimpan data yang diinginkan
        $results = [];
    
        // Loop melalui setiap diagnosa
        foreach ($diagnosas as $diagnosa) {
            $penyebabs = explode('|', $diagnosa->penyebab);
            $gejalas = explode('|', $diagnosa->gejala);
    
            // Loop melalui setiap pasangan penyebab dan gejala
            foreach ($penyebabs as $key => $penyebabPair) {
                $penyebab = explode(',', $penyebabPair);
                $gejala = explode(',', $gejalas[$key]);
    
                // Tambahkan data ke dalam array hasil
                $results[$diagnosa->gigi][$diagnosa->masalah][] = [
                    'askepgilut' => explode('|', $diagnosa->askepgilut)[$key],
                    'penyebab' => $penyebab,
                    'gejala' => $gejala,
                ];
            }
        }
    
        $accs = implode(',', Diagnosa::where('kartupasien_id', $diagnosa->kartupasien_id)->pluck('acc')->toArray());
        return view('pages.diagnosa.show')->with([
            'diagnosa' => $diagnosa,
            'diagnosas' => $diagnosas,
            'askepgiluts' => $askepgiluts,
            'results' => $results, // Mengirim data hasil ke tampilan            
            'accs' => $accs
        ]);
    }
    



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnosa $diagnosa)
    {
        if (auth()->user()->role === 1) {
            $kartupasiens = kartupasien::where('user_id', $diagnosa->user_id)
                ->where('pembimbing', $diagnosa->pembimbing)
                ->get();
            // $kartupasiens = kartupasien::all();
            $users = User::where('role', 3)->get();
        } elseif (auth()->user()->role === 2) {
            $kartupasiens = kartupasien::where('pembimbing', auth()->user()->nimnip)->get();
        } else {
            $kartupasiens = kartupasien::where('user_id', auth()->id())->get();
        }

        // Pecah string menjadi array pada setiap input
        $penyebab = explode('|', $diagnosa->penyebab);
        // dd($penyebab);
        $gejala = explode('|', $diagnosa->gejala);

        $gigis = gigi::all();
        $askepgiluts = Askepgilut::all();

        return view('pages.diagnosa.edit')->with([
            'diagnosa' => $diagnosa,
            'kartupasiens' => $kartupasiens,
            'gigis' => $gigis,
            'askepgiluts' => $askepgiluts,
            'penyebab' => $penyebab,
            'gejala' => $gejala,
            'users' => $users ?? null
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diagnosa $diagnosa)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'user_id' => 'required',
            'pembimbing' => 'required',
            'kartupasien_id' => 'required',
            'gigi' => 'required|min:2|max:2',
            'masalah' => 'required|max:255',
            'diagnosa.*.askepgilut' => 'required',
            'diagnosa.*.penyebab' => 'required|array|min:1',
            'diagnosa.*.gejala' => 'required|array|min:1',
        ], [
            'diagnosa.*.askepgilut.required' => 'Diagnosis Askepgilut harus dipilih',
            'diagnosa.*.penyebab.required' => 'Penyebab harus dipilih',
            'diagnosa.*.gejala.required' => 'Gejala harus dipilih',
        ]);

        // Ambil data diagnosa dari request
        $data = $request->input('diagnosa', []);

        if (empty($data)) {
            return back()->withErrors(['diagnosa' => 'Data diagnosa tidak valid']);
        }

        // Inisialisasi variabel untuk menyimpan data yang akan disimpan di database
        $askepgilutArray = [];
        $penyebabArray = [];
        $gejalaArray = [];

        // Loop melalui setiap item dalam data diagnosa
        foreach ($data as $item) {
            // Menggabungkan nilai askepgilut
            $askepgilutArray[] = $item['askepgilut'][0];

            // Menggabungkan nilai penyebab
            $penyebabArray[] = implode(',', $item['penyebab']);

            // Menggabungkan nilai gejala
            $gejalaArray[] = implode(',', $item['gejala']);
        }

        // Gabungkan nilai-nilai yang diperoleh ke dalam bentuk string
        $askepgilut = implode('|', $askepgilutArray);
        $penyebab = implode('|', $penyebabArray);
        $gejala = implode('|', $gejalaArray);

        // Dapatkan objek Diagnosa yang akan diperbarui
        $diagnosa = Diagnosa::findOrFail($diagnosa->id);

        // Simpan data diagnosa ke dalam database
        $diagnosa->askepgilut = $askepgilut;
        $diagnosa->penyebab = $penyebab;
        $diagnosa->gejala = $gejala;

        // Masukkan juga data dari validasi ke model Diagnosa
        $diagnosa->fill($validatedData);

        $diagnosa->save();

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Data Diagnosa Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diagnosa $diagnosa)
    {
        Diagnosa::destroy($diagnosa->id);
        return back()->with('success', 'Data diagnosa berhasil dihapus');
    }


    public function acc($id)
    {

        // Ambil entri yang memiliki id yang diberikan
        $diagnosa = Diagnosa::findOrFail($id);

        // Periksa nilai acc dan perbarui
        $newValue = $diagnosa->acc == 0 ? 1 : 0;

        // Perbarui entri yang memiliki nilai acc yang sama dengan entri yang dipilih
        Diagnosa::where('user_id', $diagnosa->user_id)
            ->where('pembimbing', $diagnosa->pembimbing)
            ->where('kartupasien_id', $diagnosa->kartupasien_id)
            ->where('acc', $diagnosa->acc)
            ->update(['acc' => $newValue]);

        // Perbarui nilai acc untuk entri yang dipilih
        $diagnosa->update(['acc' => $newValue]);

        return back()->with([
            'success' => 'Status ACC berhasil diubah'
        ]);
    }
}
