<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTanahRequest;
use App\Http\Requests\UpdateTanahRequest;
use App\Models\Tanah;

class TanahController extends Controller
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
     * @param  \App\Http\Requests\StoreTanahRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTanahRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function show(Tanah $tanah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function edit(Tanah $tanah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTanahRequest  $request
     * @param  \App\Models\Tanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTanahRequest $request, Tanah $tanah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tanah $tanah)
    {
        //
    }
}
