<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePekebunKecilRequest;
use App\Http\Requests\UpdatePekebunKecilRequest;
use App\Models\PekebunKecil;

class PekebunKecilController extends Controller
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
     * @param  \App\Http\Requests\StorePekebunKecilRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePekebunKecilRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PekebunKecil  $pekebunKecil
     * @return \Illuminate\Http\Response
     */
    public function show(PekebunKecil $pekebunKecil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PekebunKecil  $pekebunKecil
     * @return \Illuminate\Http\Response
     */
    public function edit(PekebunKecil $pekebunKecil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePekebunKecilRequest  $request
     * @param  \App\Models\PekebunKecil  $pekebunKecil
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePekebunKecilRequest $request, PekebunKecil $pekebunKecil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PekebunKecil  $pekebunKecil
     * @return \Illuminate\Http\Response
     */
    public function destroy(PekebunKecil $pekebunKecil)
    {
        //
    }
}
