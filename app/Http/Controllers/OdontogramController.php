<?php

namespace App\Http\Controllers;

use App\Models\Odontogram;
use App\Models\Kartupasien;
use App\Models\User;
use Illuminate\Http\Request;

class OdontogramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role === 1) {
            $odontograms = odontogram::all();
        } 
        elseif (auth()->user()->role === 2) {
            $odontograms = odontogram::where('pembimbing', auth()->user()->nimnip)->get();
        } 
        else {
            $odontograms = odontogram::where('user_id', auth()->id())->get();
        }

        return view('pages.odontogram.index')->with('odontograms', $odontograms);


        // return view('pages.odontogram.index', [
        //     'odontograms' => Odontogram::all()
        // ]);
        // return view('pages.odontogram.index');
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

        // $kartupasiens = Kartupasien::all();
        return view('pages.odontogram.create')->with([
            'kartupasiens' => $kartupasiens,
            'users' => $users ?? null
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOdontogramRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'user_id' => 'required',
            'pembimbing' => 'required',
            'kartupasien_id' => 'required',

            //kelainan Gigi
            'kode_11'=>'nullable|numeric|min:0|max:9',
            'kode_21'=>'nullable|numeric|min:0|max:9',
            'kode_12'=>'nullable|numeric|min:0|max:9',
            'kode_22'=>'nullable|numeric|min:0|max:9',
            'kode_13'=>'nullable|numeric|min:0|max:9',
            'kode_23'=>'nullable|numeric|min:0|max:9',
            'kode_14'=>'nullable|numeric|min:0|max:9',
            'kode_24'=>'nullable|numeric|min:0|max:9',
            'kode_15'=>'nullable|numeric|min:0|max:9',
            'kode_25'=>'nullable|numeric|min:0|max:9',
            'kode_16'=>'nullable|numeric|min:0|max:9',
            'kode_26'=>'nullable|numeric|min:0|max:9',
            'kode_17'=>'nullable|numeric|min:0|max:9',
            'kode_27'=>'nullable|numeric|min:0|max:9',
            'kode_18'=>'nullable|numeric|min:0|max:9',
            'kode_28'=>'nullable|numeric|min:0|max:9',
            
            'kode_41'=>'nullable|numeric|min:0|max:9',
            'kode_31'=>'nullable|numeric|min:0|max:9',
            'kode_42'=>'nullable|numeric|min:0|max:9',
            'kode_32'=>'nullable|numeric|min:0|max:9',
            'kode_43'=>'nullable|numeric|min:0|max:9',
            'kode_33'=>'nullable|numeric|min:0|max:9',
            'kode_44'=>'nullable|numeric|min:0|max:9',
            'kode_34'=>'nullable|numeric|min:0|max:9',
            'kode_45'=>'nullable|numeric|min:0|max:9',
            'kode_35'=>'nullable|numeric|min:0|max:9',
            'kode_46'=>'nullable|numeric|min:0|max:9',
            'kode_36'=>'nullable|numeric|min:0|max:9',
            'kode_47'=>'nullable|numeric|min:0|max:9',
            'kode_37'=>'nullable|numeric|min:0|max:9',
            'kode_48'=>'nullable|numeric|min:0|max:9',
            'kode_38'=>'nullable|numeric|min:0|max:9',
            
            'kode_51'=>'nullable|min:1|max:1',
            'kode_61'=>'nullable|min:1|max:1',
            'kode_52'=>'nullable|min:1|max:1',
            'kode_62'=>'nullable|min:1|max:1',
            'kode_53'=>'nullable|min:1|max:1',
            'kode_63'=>'nullable|min:1|max:1',
            'kode_54'=>'nullable|min:1|max:1',
            'kode_64'=>'nullable|min:1|max:1',
            'kode_55'=>'nullable|min:1|max:1',
            'kode_65'=>'nullable|min:1|max:1',
            
            'kode_81'=>'nullable|min:1|max:1',
            'kode_71'=>'nullable|min:1|max:1',
            'kode_82'=>'nullable|min:1|max:1',
            'kode_72'=>'nullable|min:1|max:1',
            'kode_83'=>'nullable|min:1|max:1',
            'kode_73'=>'nullable|min:1|max:1',
            'kode_84'=>'nullable|min:1|max:1',
            'kode_74'=>'nullable|min:1|max:1',
            'kode_85'=>'nullable|min:1|max:1',
            'kode_75'=>'nullable|min:1|max:1',
            
            'jumlah_tetap_d'=>'required|numeric|min:1|max:32',
            'jumlah_tetap_m'=>'required|numeric|min:1|max:32',
            'jumlah_tetap_f'=>'required|numeric|min:1|max:32',
            'dmf_t'=>'required|numeric|min:1|max:32',

            'jumlah_susu_d'=>'required|numeric|min:1|max:20',
            'jumlah_susu_e'=>'required|numeric|min:1|max:20',
            'jumlah_susu_f'=>'required|numeric|min:1|max:20',
            'def_t'=>'required|numeric|min:1|max:20',

            'gigi_karies'=>'nullable|min:2'
        ]);

        Odontogram::create($validatedData);

        return redirect()->route('odontogram.index')->with('success', 'Data Odontogram Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Odontogram  $odontogram
     * @return \Illuminate\Http\Response
     */
    public function show(Odontogram $odontogram)
    {
        return view('pages.odontogram.show')->with('odontogram', $odontogram);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Odontogram  $odontogram
     * @return \Illuminate\Http\Response
     */
    public function edit(Odontogram $odontogram)
    {
        if (auth()->user()->role === 1) {
            $kartupasiens = kartupasien::where('user_id', $odontogram->user_id)
                                    ->where('pembimbing', $odontogram->pembimbing)
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
        return view('pages.odontogram.edit')->with([
            'odontogram' => $odontogram,
            'kartupasiens' => $kartupasiens,
            'users' => $users ?? null
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOdontogramRequest  $request
     * @param  \App\Models\Odontogram  $odontogram
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Odontogram $odontogram)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'pembimbing' => 'required',
            'kartupasien_id' => 'required',

            //kelainan Gigi
            'kode_11'=>'nullable|numeric|min:0|max:9',
            'kode_21'=>'nullable|numeric|min:0|max:9',
            'kode_12'=>'nullable|numeric|min:0|max:9',
            'kode_22'=>'nullable|numeric|min:0|max:9',
            'kode_13'=>'nullable|numeric|min:0|max:9',
            'kode_23'=>'nullable|numeric|min:0|max:9',
            'kode_14'=>'nullable|numeric|min:0|max:9',
            'kode_24'=>'nullable|numeric|min:0|max:9',
            'kode_15'=>'nullable|numeric|min:0|max:9',
            'kode_25'=>'nullable|numeric|min:0|max:9',
            'kode_16'=>'nullable|numeric|min:0|max:9',
            'kode_26'=>'nullable|numeric|min:0|max:9',
            'kode_17'=>'nullable|numeric|min:0|max:9',
            'kode_27'=>'nullable|numeric|min:0|max:9',
            'kode_18'=>'nullable|numeric|min:0|max:9',
            'kode_28'=>'nullable|numeric|min:0|max:9',
            
            'kode_41'=>'nullable|numeric|min:0|max:9',
            'kode_31'=>'nullable|numeric|min:0|max:9',
            'kode_42'=>'nullable|numeric|min:0|max:9',
            'kode_32'=>'nullable|numeric|min:0|max:9',
            'kode_43'=>'nullable|numeric|min:0|max:9',
            'kode_33'=>'nullable|numeric|min:0|max:9',
            'kode_44'=>'nullable|numeric|min:0|max:9',
            'kode_34'=>'nullable|numeric|min:0|max:9',
            'kode_45'=>'nullable|numeric|min:0|max:9',
            'kode_35'=>'nullable|numeric|min:0|max:9',
            'kode_46'=>'nullable|numeric|min:0|max:9',
            'kode_36'=>'nullable|numeric|min:0|max:9',
            'kode_47'=>'nullable|numeric|min:0|max:9',
            'kode_37'=>'nullable|numeric|min:0|max:9',
            'kode_48'=>'nullable|numeric|min:0|max:9',
            'kode_38'=>'nullable|numeric|min:0|max:9',
            
            'kode_51'=>'nullable|min:1|max:1',
            'kode_61'=>'nullable|min:1|max:1',
            'kode_52'=>'nullable|min:1|max:1',
            'kode_62'=>'nullable|min:1|max:1',
            'kode_53'=>'nullable|min:1|max:1',
            'kode_63'=>'nullable|min:1|max:1',
            'kode_54'=>'nullable|min:1|max:1',
            'kode_64'=>'nullable|min:1|max:1',
            'kode_55'=>'nullable|min:1|max:1',
            'kode_65'=>'nullable|min:1|max:1',
            
            'kode_81'=>'nullable|min:1|max:1',
            'kode_71'=>'nullable|min:1|max:1',
            'kode_82'=>'nullable|min:1|max:1',
            'kode_72'=>'nullable|min:1|max:1',
            'kode_83'=>'nullable|min:1|max:1',
            'kode_73'=>'nullable|min:1|max:1',
            'kode_84'=>'nullable|min:1|max:1',
            'kode_74'=>'nullable|min:1|max:1',
            'kode_85'=>'nullable|min:1|max:1',
            'kode_75'=>'nullable|min:1|max:1',
            
            'jumlah_tetap_d'=>'required|numeric|min:1|max:32',
            'jumlah_tetap_m'=>'required|numeric|min:1|max:32',
            'jumlah_tetap_f'=>'required|numeric|min:1|max:32',
            'dmf_t'=>'required|numeric|min:1|max:32',

            'jumlah_susu_d'=>'required|numeric|min:1|max:20',
            'jumlah_susu_e'=>'required|numeric|min:1|max:20',
            'jumlah_susu_f'=>'required|numeric|min:1|max:20',
            'def_t'=>'required|numeric|min:1|max:20',

            'gigi_karies'=>'nullable|min:2'
        ]);
        Odontogram::where('id', $odontogram->id)
            ->update($validatedData);

        return back()->with('success', 'Data Odontogram berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Odontogram  $odontogram
     * @return \Illuminate\Http\Response
     */
    public function destroy(Odontogram $odontogram)
    {
        Odontogram::destroy($odontogram->id);
        return back()->with('success', 'Data Odontogram berhasil dihapus');
    }
}
