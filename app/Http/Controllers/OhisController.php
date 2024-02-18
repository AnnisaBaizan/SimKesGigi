<?php

namespace App\Http\Controllers;

use App\Models\Ohis;
use App\Http\Requests\StoreOhisRequest;
use App\Http\Requests\UpdateOhisRequest;

class OhisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.ohis.index', [
            'ohiss' => Ohis::all()
        ]);
        // return view('pages.ohis.index');
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
     * @param  \App\Http\Requests\StoreOhisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOhisRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ohis  $ohis
     * @return \Illuminate\Http\Response
     */
    public function show(Ohis $ohis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ohis  $ohis
     * @return \Illuminate\Http\Response
     */
    public function edit(Ohis $ohis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOhisRequest  $request
     * @param  \App\Models\Ohis  $ohis
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOhisRequest $request, Ohis $ohis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ohis  $ohis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ohis $ohis)
    {
        //
    }
}
