<?php

namespace App\Http\Controllers;

use App\Models\Odontogram;
use App\Http\Requests\StoreOdontogramRequest;
use App\Http\Requests\UpdateOdontogramRequest;

class OdontogramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.odontogram.index', [
            'odontograms' => Odontogram::all()
        ]);
        // return view('pages.odontogram.index');
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
     * @param  \App\Http\Requests\StoreOdontogramRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOdontogramRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Odontogram  $odontogram
     * @return \Illuminate\Http\Response
     */
    public function show(Odontogram $odontogram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Odontogram  $odontogram
     * @return \Illuminate\Http\Response
     */
    public function edit(Odontogram $odontogram)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOdontogramRequest  $request
     * @param  \App\Models\Odontogram  $odontogram
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOdontogramRequest $request, Odontogram $odontogram)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Odontogram  $odontogram
     * @return \Illuminate\Http\Response
     */
    public function destroy(Odontogram $odontogram)
    {
        //
    }
}
