<?php

namespace App\Http\Controllers;

use App\Models\Ohis;
use App\Models\Kartupasien;
use App\Models\gigi;
use App\Models\User;
use Illuminate\Http\Request;

class OhisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role === 1) {
            $ohiss = ohis::all();
        } 
        elseif (auth()->user()->role === 2) {
            $ohiss = ohis::where('pembimbing', auth()->user()->nimnip)->get();
        } 
        else {
            $ohiss = ohis::where('user_id', auth()->id())->get();
        }

        return view('pages.ohis.index')->with('ohiss', $ohiss);

        // return view('pages.ohis.index', [
        //     'ohiss' => Ohis::all()
        // ]);
        // return view('pages.ohis.index');
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
        // $gigis = Gigi::all();
        
        return view('pages.ohis.create')->with([
            'kartupasiens' => $kartupasiens,
            'users' => $users ?? null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOhisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'user_id' => 'required',
            'pembimbing' => 'required',
            'kartupasien_id' => 'required',

            'di_1'=> 'nullable|numeric|min:0|max:3',
            'di_2'=> 'nullable|numeric|min:0|max:3',
            'di_3'=> 'nullable|numeric|min:0|max:3',
            'di_4'=> 'nullable|numeric|min:0|max:3',
            'di_5'=> 'nullable|numeric|min:0|max:3',
            'di_6'=> 'nullable|numeric|min:0|max:3',

            'jumlah_nilai_di'=>'required|numeric|min:0|max:18',
            'jumlah_gigi_di'=>'required|numeric|min:0|max:6',
            'score_di' => 'string|min:4|max:6',

            'ci_1'=> 'nullable|numeric|min:0|max:3',
            'ci_2'=> 'nullable|numeric|min:0|max:3',
            'ci_3'=> 'nullable|numeric|min:0|max:3',
            'ci_4'=> 'nullable|numeric|min:0|max:3',
            'ci_5'=> 'nullable|numeric|min:0|max:3',
            'ci_6'=> 'nullable|numeric|min:0|max:3',

            'jumlah_nilai_ci'=>'required|numeric|min:0|max:18',
            'jumlah_gigi_ci'=>'required|numeric|min:0|max:6',
            'score_ci'=> 'string|min:4|max:6',

            'nilai_kriteria_ohis'=> 'string|min:4|max:6',
            'kriteria_ohis'=>'required|min:4|max:6'
        ]);

        Ohis::create($validatedData);

        return redirect()->route('ohis.index')->with('success', 'Data OHI-S Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ohis  $ohis
     * @return \Illuminate\Http\Response
     */
    public function show(Ohis $ohis)
    {
        return view('pages.ohis.show')->with('ohis', $ohis);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ohis  $ohis
     * @return \Illuminate\Http\Response
     */
    public function edit(Ohis $ohis)
    {
        if ($ohis->acc !== 1) {
            if (auth()->user()->role === 1) {
                $kartupasiens = kartupasien::where('user_id', $ohis->user_id)
                                        ->where('pembimbing', $ohis->pembimbing)
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
    
            return view('pages.ohis.edit')->with([
                'kartupasiens' => $kartupasiens,
                'ohis' => $ohis,
                'users' => $users ?? null
            ]);
        } else {
            abort(403, 'Anda Tidak dapat Mengakses Halaman Ini, status telah ACC');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOhisRequest  $request
     * @param  \App\Models\Ohis  $ohis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ohis $ohis)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'pembimbing' => 'required',
            'kartupasien_id' => 'required',

            'di_1'=> 'nullable|numeric|min:0|max:3',
            'di_2'=> 'nullable|numeric|min:0|max:3',
            'di_3'=> 'nullable|numeric|min:0|max:3',
            'di_4'=> 'nullable|numeric|min:0|max:3',
            'di_5'=> 'nullable|numeric|min:0|max:3',
            'di_6'=> 'nullable|numeric|min:0|max:3',

            'jumlah_nilai_di'=>'required|numeric|min:0|max:18',
            'jumlah_gigi_di'=>'required|numeric|min:0|max:6',
            'score_di' => 'string|min:4|max:6',

            'ci_1'=> 'nullable|numeric|min:0|max:3',
            'ci_2'=> 'nullable|numeric|min:0|max:3',
            'ci_3'=> 'nullable|numeric|min:0|max:3',
            'ci_4'=> 'nullable|numeric|min:0|max:3',
            'ci_5'=> 'nullable|numeric|min:0|max:3',
            'ci_6'=> 'nullable|numeric|min:0|max:3',

            'jumlah_nilai_ci'=>'required|numeric|min:0|max:18',
            'jumlah_gigi_ci'=>'required|numeric|min:0|max:6',
            'score_ci'=> 'string|min:4|max:6',

            'nilai_kriteria_ohis'=> 'string|min:4|max:6',
            'kriteria_ohis'=>'required|min:4|max:6'
        ]);

        Ohis::where('id', $ohis->id)
            ->update($validatedData);

        return back()->with('success', 'Data OHI-S Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ohis  $ohis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ohis $ohis)
    {
        if ($ohis->acc !== 1) {
            Ohis::destroy($ohis->id);
            return back()->with('success', 'Data Ohis berhasil dihapus');
        } else {
            abort(403, 'Anda Tidak dapat Mengakses Halaman Ini, status telah ACC');
        }
        
    }

    public function acc($id)
    {
        // dd($id);
        $ohis = Ohis::where('id', $id)->first();

        if ($ohis->acc == 0) {
            Ohis::where('id', $id)->update([
                'acc' => 1
            ]);
        } elseif ($ohis->acc == 1) {
            Ohis::where('id', $id)->update([
                'acc' => 0
            ]);
        }

        return back()->with([
            'success' => 'Status ACC berhasil diubah'
        ]);
    }
}
