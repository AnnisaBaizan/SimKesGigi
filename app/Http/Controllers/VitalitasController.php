<?php

namespace App\Http\Controllers;

use App\Models\Vitalitas;
use App\Http\Requests\StoreVitalitasRequest;
use App\Http\Requests\UpdateVitalitasRequest;

class VitalitasController extends Controller
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
     * @param  \App\Http\Requests\StoreVitalitasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVitalitasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vitalitas  $vitalitas
     * @return \Illuminate\Http\Response
     */
    public function show(Vitalitas $vitalitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vitalitas  $vitalitas
     * @return \Illuminate\Http\Response
     */
    public function edit(Vitalitas $vitalitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVitalitasRequest  $request
     * @param  \App\Models\Vitalitas  $vitalitas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVitalitasRequest $request, Vitalitas $vitalitas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vitalitas  $vitalitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vitalitas $vitalitas)
    {
        //
    }
}
