<?php

namespace App\Http\Controllers;

use App\Models\Periodontal;
use App\Http\Requests\StorePeriodontalRequest;
use App\Http\Requests\UpdatePeriodontalRequest;

class PeriodontalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeriodontalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeriodontalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periodontal  $periodontal
     * @return \Illuminate\Http\Response
     */
    public function show(Periodontal $periodontal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periodontal  $periodontal
     * @return \Illuminate\Http\Response
     */
    public function edit(Periodontal $periodontal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeriodontalRequest  $request
     * @param  \App\Models\Periodontal  $periodontal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeriodontalRequest $request, Periodontal $periodontal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periodontal  $periodontal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periodontal $periodontal)
    {
        //
    }

    public function acc($id)
    {
        // dd($id);
        $periodontal = Periodontal::where('id', $id)->first();

        if ($periodontal->acc == 0) {
            Periodontal::where('id', $id)->update([
                'acc' => 1
            ]);
        } elseif ($periodontal->acc == 1) {
            Periodontal::where('id', $id)->update([
                'acc' => 0
            ]);
        }

        return back()->with([
            'success' => 'Status ACC berhasil diubah'
        ]);
    }
}
