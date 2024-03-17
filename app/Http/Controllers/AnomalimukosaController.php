<?php

namespace App\Http\Controllers;

use App\Models\Anomalimukosa;
use App\Models\kartupasien;
use App\Models\User;
use Illuminate\Http\Request;

class AnomalimukosaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role === 1) {
            $anomalimukosas = Anomalimukosa::all();
        } 
        elseif (auth()->user()->role === 2) {
            $anomalimukosas = Anomalimukosa::where('pembimbing', auth()->user()->nimnip)->get();
        } 
        else {
            $anomalimukosas = Anomalimukosa::where('user_id', auth()->id())->get();
        }

        return view('pages.anomalimukosa.index')->with('anomalimukosas', $anomalimukosas);

        // return view('pages.anomalimukosa.index', [
        //     'anomalimukosas' => Anomalimukosa::all()
        // ]);
        // return view('pages.anomalimukosa.index');
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
        
        return view('pages.anomalimukosa.create')->with([
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

            'occlusi'=>'required|min:10|max:11',
            'bentuk'=> 'required|min:6|max:8',
            'warna'=> 'required|min:6|max:8',
            'posisi'=> 'required|min:6|max:8',
            'ukuran'=> 'required|min:6|max:8',
            'struktur'=> 'required|min:6|max:8',

            //mukosa mulut
            
            // lidah
            'w_lidah'=> 'required|max:9|min:3',
            'dw_lidah'=>'nullable',
            'i_lidah'=> 'required|max:9|min:3',
            'di_lidah'=>'nullable',
            'u_lidah'=> 'required|max:9|min:3',
            'du_lidah'=>'nullable',
            // pipi
            'w_pipi'=> 'required|max:9|min:3',
            'dw_pipi'=>'nullable',
            'i_pipi'=> 'required|max:9|min:3',
            'di_pipi'=>'nullable',
            'u_pipi'=> 'required|max:9|min:3',
            'du_pipi'=>'nullable',
            // palatum
            'w_palatum'=> 'required|max:9|min:3',
            'dw_palatum'=>'nullable',
            'i_palatum'=> 'required|max:9|min:3',
            'di_palatum'=>'nullable',
            'u_palatum'=> 'required|max:9|min:3',
            'du_palatum'=>'nullable',
            // gingiva
            'w_gingiva'=> 'required|max:9|min:3',
            'dw_gingiva'=>'nullable',
            'i_gingiva'=> 'required|max:9|min:3',
            'di_gingiva'=>'nullable',
            'u_gingiva'=> 'required|max:9|min:3',
            'du_gingiva'=>'nullable',
            // bibir
            'w_bibir'=>'required|max:9|min:3',
            'dw_bibir'=>'nullable',
            'i_bibir'=> 'required|max:9|min:3',
            'di_bibir'=>'nullable',
            'u_bibir'=>'required|max:9|min:3',
            'du_bibir'=>'nullable'
        ]);

        Anomalimukosa::create($validatedData);

        return redirect('/anomalimukosa')->with('success', 'Data Anomali Gigi dan Mukosa Mulut Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anomalimukosa  $anomalimukosa
     * @return \Illuminate\Http\Response
     */
    public function show(Anomalimukosa $anomalimukosa)
    {
        return view('pages.anomalimukosa.show')->with('anomalimukosa', $anomalimukosa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anomalimukosa  $anomalimukosa
     * @return \Illuminate\Http\Response
     */
    public function edit(Anomalimukosa $anomalimukosa)
    {
        if (auth()->user()->role === 1) {
            $kartupasiens = kartupasien::where('user_id', $anomalimukosa->user_id)
                                    ->where('pembimbing', $anomalimukosa->pembimbing)
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
        
        return view('pages.anomalimukosa.edit')->with([
            'kartupasiens' => $kartupasiens,
            'anomalimukosa'=>$anomalimukosa,
            'users' => $users ?? null
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Anomalimukosa  $anomalimukosa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anomalimukosa $anomalimukosa)
    {
          
        $validatedData = $request->validate([
            'user_id' => 'required',
            'pembimbing' => 'required',
            'kartupasien_id' => 'required',

            'occlusi'=>'required|min:10|max:11',
            'bentuk'=> 'required|min:6|max:8',
            'warna'=> 'required|min:6|max:8',
            'posisi'=> 'required|min:6|max:8',
            'ukuran'=> 'required|min:6|max:8',
            'struktur'=> 'required|min:6|max:8',

            //mukosa mulut
            
            // lidah
            'w_lidah'=> 'required|max:9|min:3',
            'dw_lidah'=>'nullable',
            'i_lidah'=> 'required|max:9|min:3',
            'di_lidah'=>'nullable',
            'u_lidah'=> 'required|max:9|min:3',
            'du_lidah'=>'nullable',
            // pipi
            'w_pipi'=> 'required|max:9|min:3',
            'dw_pipi'=>'nullable',
            'i_pipi'=> 'required|max:9|min:3',
            'di_pipi'=>'nullable',
            'u_pipi'=> 'required|max:9|min:3',
            'du_pipi'=>'nullable',
            // palatum
            'w_palatum'=> 'required|max:9|min:3',
            'dw_palatum'=>'nullable',
            'i_palatum'=> 'required|max:9|min:3',
            'di_palatum'=>'nullable',
            'u_palatum'=> 'required|max:9|min:3',
            'du_palatum'=>'nullable',
            // gingiva
            'w_gingiva'=> 'required|max:9|min:3',
            'dw_gingiva'=>'nullable',
            'i_gingiva'=> 'required|max:9|min:3',
            'di_gingiva'=>'nullable',
            'u_gingiva'=> 'required|max:9|min:3',
            'du_gingiva'=>'nullable',
            // bibir
            'w_bibir'=>'required|max:9|min:3',
            'dw_bibir'=>'nullable',
            'i_bibir'=> 'required|max:9|min:3',
            'di_bibir'=>'nullable',
            'u_bibir'=>'required|max:9|min:3',
            'du_bibir'=>'nullable'
        ]);
        Anomalimukosa::where('id', $anomalimukosa->id)
            ->update($validatedData);

        return back()->with('success', 'Data Anomali Gigi dan Mukosa Mulut berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anomalimukosa  $anomalimukosa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anomalimukosa $anomalimukosa)
    {
        Anomalimukosa::destroy($anomalimukosa->id);
        return back()->with('success', 'Data anomalimukosa berhasil dihapus');
    }
}
