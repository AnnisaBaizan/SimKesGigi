<?php

namespace App\Http\Controllers;

use App\Models\Eksplakkal;
use App\Models\kartupasien;
use App\Models\permukaangigi;
use App\Models\User;
use Illuminate\Http\Request;

class EksplakkalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role === 1) {
            $eksplakkals = Eksplakkal::all();
        } 
        elseif (auth()->user()->role === 2) {
            $eksplakkals = Eksplakkal::where('pembimbing', auth()->user()->nimnip)->get();
        } 
        else {
            $eksplakkals = Eksplakkal::where('user_id', auth()->id())->get();
        }

        return view('pages.eksplakkal.index')->with('eksplakkals', $eksplakkals);

        // return view('pages.eksplakkal.index', [
        //     'eksplakkals' => Eksplakkal::all()
        // ]);
        // return view('pages.eksplakkal.index');
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
        
        $permukaangigis = permukaangigi::all();
        
        return view('pages.eksplakkal.create')->with([
            'kartupasiens' => $kartupasiens,
            'permukaangigis' => $permukaangigis,
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
        // dd($request);
        $validatedData = $request->validate([
            'user_id' => 'required',
            'pembimbing' => 'required',
            'kartupasien_id' => 'required',
            
            //eksternal
            'muka'=>'required',
            'limpe_kanan_teraba'=>'required',
            'limpe_kanan_texture'=>'required',
            'limpe_kanan_sakit'=>'required',
            'limpe_kiri_teraba'=>'required',
            'limpe_kiri_texture'=>'required',
            'limpe_kiri_sakit'=>'required',

            //pengukuran plak
            'plak' => 'required|array',
            'plak.*' => 'string',
            'jumlah_plak'=>'required|numeric|max:236|min:0',
            'jumlah_permukaan'=>'required|numeric|max:236|min:1',
            'jumlah_tidak_plak'=>'required|numeric|max:236|min:0',
            'plaque_score'=>'required|max:6|min:4',
            'kriteria'=>'required|max:5|min:4',

            //kalkulus
            'supragingiva' => 'required|array',
            'supragingiva.*' => 'string',
            'subgingiva' => 'required|array',
            'subgingiva.*' => 'string'
            
        ]);

        // If no checkboxes are checked, set lokasi to an empty array
        $plak = $request->has('plak') ? implode(',', $validatedData['plak']) : '';
        $supragingiva = $request->has('supragingiva') ? implode(',', $validatedData['supragingiva']) : '';
        $subgingiva = $request->has('subgingiva') ? implode(',', $validatedData['subgingiva']) : '';

        // Simpan data ke dalam database
        $eksplakkal = new Eksplakkal();

        $eksplakkal->user_id = $validatedData['user_id'];
        $eksplakkal->pembimbing = $validatedData['pembimbing'];
        $eksplakkal->kartupasien_id = $validatedData['kartupasien_id'];
        $eksplakkal->muka = $validatedData['muka'];
        $eksplakkal->limpe_kanan_teraba = $validatedData['limpe_kanan_teraba'];
        $eksplakkal->limpe_kanan_texture = $validatedData['limpe_kanan_texture'];
        $eksplakkal->limpe_kanan_sakit = $validatedData['limpe_kanan_sakit'];
        $eksplakkal->limpe_kiri_teraba = $validatedData['limpe_kiri_teraba'];
        $eksplakkal->limpe_kiri_texture = $validatedData['limpe_kiri_texture'];
        $eksplakkal->limpe_kiri_sakit = $validatedData['limpe_kiri_sakit'];
        $eksplakkal->plak = $plak;
        $eksplakkal->jumlah_plak = $validatedData['jumlah_plak'];
        $eksplakkal->jumlah_permukaan = $validatedData['jumlah_permukaan'];
        $eksplakkal->jumlah_tidak_plak = $validatedData['jumlah_tidak_plak'];
        $eksplakkal->plaque_score = $validatedData['plaque_score'];
        $eksplakkal->kriteria = $validatedData['kriteria'];
        $eksplakkal->supragingiva = $supragingiva;
        $eksplakkal->subgingiva = $subgingiva;

        $eksplakkal->save();

        return redirect()->route('eksplakkal.index')->with('success', 'Data Eskternal & Internal Oral (Plak & Kalkulus) Eskternal & Internal Oral (Plak & Kalkulus) Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eksplakkal  $eksplakkal
     * @return \Illuminate\Http\Response
     */
    public function show(Eksplakkal $eksplakkal)
    {
        return view('pages.eksplakkal.show')->with('eksplakkal', $eksplakkal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eksplakkal  $eksplakkal
     * @return \Illuminate\Http\Response
     */
    public function edit(Eksplakkal $eksplakkal)
    {
        if (auth()->user()->role === 1) {
            $kartupasiens = kartupasien::where('user_id', $eksplakkal->user_id)
                                    ->where('pembimbing', $eksplakkal->pembimbing)
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

        
        $permukaangigis = permukaangigi::all();
        
        return view('pages.eksplakkal.edit')->with([
            'kartupasiens' => $kartupasiens,
            'permukaangigis' => $permukaangigis,
            'eksplakkal'=> $eksplakkal,
            'users' => $users ?? null
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Eksplakkal  $eksplakkal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eksplakkal $eksplakkal)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'pembimbing' => 'required',
            'kartupasien_id' => 'required',
            
            //eksternal
            'muka'=>'required',
            'limpe_kanan_teraba'=>'required',
            'limpe_kanan_texture'=>'required',
            'limpe_kanan_sakit'=>'required',
            'limpe_kiri_teraba'=>'required',
            'limpe_kiri_texture'=>'required',
            'limpe_kiri_sakit'=>'required',

            //pengukuran plak
            'plak' => 'required|array',
            'plak.*' => 'string',
            'jumlah_plak'=>'required|numeric|max:236|min:0',
            'jumlah_permukaan'=>'required|numeric|max:236|min:1',
            'jumlah_tidak_plak'=>'required|numeric|max:236|min:0',
            'plaque_score'=>'required|max:6|min:4',
            'kriteria'=>'required|max:5|min:4',

            //kalkulus
            'supragingiva' => 'required|array',
            'supragingiva.*' => 'string',
            'subgingiva' => 'required|array',
            'subgingiva.*' => 'string'
        ]);
    
        // If no checkboxes are checked, set lokasi to an empty array
        $plak = $request->has('plak') ? implode(',', $validatedData['plak']) : '';
        $supragingiva = $request->has('supragingiva') ? implode(',', $validatedData['supragingiva']) : '';
        $subgingiva = $request->has('subgingiva') ? implode(',', $validatedData['subgingiva']) : '';
    
        // Update data di database
        $eksplakkal->update([
            'user_id' => $validatedData['user_id'],
            'pembimbing' => $validatedData['pembimbing'],
            'kartupasien_id' => $validatedData['kartupasien_id'],
            'muka' => $validatedData['muka'],
            'limpe_kanan_teraba' => $validatedData['limpe_kanan_teraba'],
            'limpe_kanan_texture' => $validatedData['limpe_kanan_texture'],
            'limpe_kanan_sakit' => $validatedData['limpe_kanan_sakit'],
            'limpe_kiri_teraba' => $validatedData['limpe_kiri_teraba'],
            'limpe_kiri_texture' => $validatedData['limpe_kiri_texture'],
            'limpe_kiri_sakit' => $validatedData['limpe_kiri_sakit'],
            'plak' => $plak,
            'jumlah_plak' => $validatedData['jumlah_plak'],
            'jumlah_permukaan' => $validatedData['jumlah_permukaan'],
            'jumlah_tidak_plak' => $validatedData['jumlah_tidak_plak'],
            'plaque_score' => $validatedData['plaque_score'],
            'kriteria' => $validatedData['kriteria'],
            'supragingiva' => $supragingiva,
            'subgingiva' => $subgingiva
        ]);
    
        return back()->with('success', 'Data Eskternal & Internal Oral (Plak & Kalkulus) Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eksplakkal  $eksplakkal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eksplakkal $eksplakkal)
    {
        Eksplakkal::destroy($eksplakkal->id);
        return back()->with('success', 'Data Eskternal & Internal Oral (Plak & Kalkulus) Eskternal & Internal Oral (Plak & Kalkulus) berhasil dihapus');
    }

    public function acc($id)
    {
        // dd($id);
        $eksplakkal = Eksplakkal::where('id', $id)->first();

        if ($eksplakkal->acc == 0) {
            Eksplakkal::where('id', $id)->update([
                'acc' => 1
            ]);
        } elseif ($eksplakkal->acc == 1) {
            Eksplakkal::where('id', $id)->update([
                'acc' => 0
            ]);
        }

        return back()->with([
            'success' => 'Status ACC berhasil diubah'
        ]);
    }
}
