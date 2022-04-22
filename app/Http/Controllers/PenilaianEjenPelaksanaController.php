<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenilaianEjenPelaksanaRequest;
use App\Http\Requests\UpdatePenilaianEjenPelaksanaRequest;
use App\Models\PenilaianEjenPelaksana;

class PenilaianEjenPelaksanaController extends Controller
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
        return view('penilaian.ejen-pelaksana.soalan-ejen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenilaianEjenPelaksanaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenilaianEjenPelaksanaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenilaianEjenPelaksana  $penilaianEjenPelaksana
     * @return \Illuminate\Http\Response
     */
    public function show(PenilaianEjenPelaksana $penilaianEjenPelaksana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenilaianEjenPelaksana  $penilaianEjenPelaksana
     * @return \Illuminate\Http\Response
     */
    public function edit(PenilaianEjenPelaksana $penilaianEjenPelaksana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenilaianEjenPelaksanaRequest  $request
     * @param  \App\Models\PenilaianEjenPelaksana  $penilaianEjenPelaksana
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenilaianEjenPelaksanaRequest $request, PenilaianEjenPelaksana $penilaianEjenPelaksana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenilaianEjenPelaksana  $penilaianEjenPelaksana
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenilaianEjenPelaksana $penilaianEjenPelaksana)
    {
        //
    }
}
