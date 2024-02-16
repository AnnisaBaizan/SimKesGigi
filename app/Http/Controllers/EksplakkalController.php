<?php

namespace App\Http\Controllers;

use App\Models\Eksplakkal;
use App\Http\Requests\StoreEksplakkalRequest;
use App\Http\Requests\UpdateEksplakkalRequest;

class EksplakkalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.eksplakkal.index', [
            'eksplakkals' => Eksplakkal::all()
        ]);
        // return view('pages.eksplakkal.index');
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
     * @param  \App\Http\Requests\StoreEksplakkalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEksplakkalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eksplakkal  $eksplakkal
     * @return \Illuminate\Http\Response
     */
    public function show(Eksplakkal $eksplakkal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eksplakkal  $eksplakkal
     * @return \Illuminate\Http\Response
     */
    public function edit(Eksplakkal $eksplakkal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEksplakkalRequest  $request
     * @param  \App\Models\Eksplakkal  $eksplakkal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEksplakkalRequest $request, Eksplakkal $eksplakkal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eksplakkal  $eksplakkal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eksplakkal $eksplakkal)
    {
        //
    }
}
