<?php

namespace App\Http\Controllers;

use App\Models\Penyebab;
use App\Http\Requests\StorePenyebabRequest;
use App\Http\Requests\UpdatePenyebabRequest;

class PenyebabController extends Controller
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
     * @param  \App\Http\Requests\StorePenyebabRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenyebabRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penyebab  $penyebab
     * @return \Illuminate\Http\Response
     */
    public function show(Penyebab $penyebab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penyebab  $penyebab
     * @return \Illuminate\Http\Response
     */
    public function edit(Penyebab $penyebab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenyebabRequest  $request
     * @param  \App\Models\Penyebab  $penyebab
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenyebabRequest $request, Penyebab $penyebab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penyebab  $penyebab
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penyebab $penyebab)
    {
        //
    }
}
