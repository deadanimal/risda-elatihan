<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenilaianKeberkesananRequest;
use App\Http\Requests\UpdatePenilaianKeberkesananRequest;
use App\Models\PenilaianKeberkesanan;

class PenilaianKeberkesananController extends Controller
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


    public function create()
    {
        return view('penilaian.keberkesanan.soalan-keberkesanan');
    }


    public function store(StorePenilaianKeberkesananRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenilaianKeberkesanan  $penilaianKeberkesanan
     * @return \Illuminate\Http\Response
     */
    public function show(PenilaianKeberkesanan $penilaianKeberkesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenilaianKeberkesanan  $penilaianKeberkesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(PenilaianKeberkesanan $penilaianKeberkesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenilaianKeberkesananRequest  $request
     * @param  \App\Models\PenilaianKeberkesanan  $penilaianKeberkesanan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenilaianKeberkesananRequest $request, PenilaianKeberkesanan $penilaianKeberkesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenilaianKeberkesanan  $penilaianKeberkesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenilaianKeberkesanan $penilaianKeberkesanan)
    {
        //
    }
}
