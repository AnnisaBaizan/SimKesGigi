<?php

namespace App\Http\Controllers;

use App\Models\Askepgilut;
use App\Http\Requests\StoreAskepgilutRequest;
use App\Http\Requests\UpdateAskepgilutRequest;
use App\Models\Gejala;
use App\Models\Penyebab;

class AskepgilutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $askepgiluts = Askepgilut::all();
        $penyebabs = Penyebab::all();
        $gejalas = Gejala::all();
        return view('pages.askepgilut.index')->with([
            'askepgiluts' => $askepgiluts,
            'penyebabs' => $penyebabs,
            'gejalas' => $gejalas
        ]);
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
     * @param  \App\Http\Requests\StoreAskepgilutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAskepgilutRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Askepgilut  $askepgilut
     * @return \Illuminate\Http\Response
     */
    public function show(Askepgilut $askepgilut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Askepgilut  $askepgilut
     * @return \Illuminate\Http\Response
     */
    public function edit(Askepgilut $askepgilut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAskepgilutRequest  $request
     * @param  \App\Models\Askepgilut  $askepgilut
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAskepgilutRequest $request, Askepgilut $askepgilut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Askepgilut  $askepgilut
     * @return \Illuminate\Http\Response
     */
    public function destroy(Askepgilut $askepgilut)
    {
        //
    }
}
