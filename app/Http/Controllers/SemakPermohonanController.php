<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSemakPermohonanRequest;
use App\Http\Requests\UpdateSemakPermohonanRequest;
use App\Models\SemakPermohonan;

class SemakPermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('permohonan_kursus.semakan_permohonan.index');
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
     * @param  \App\Http\Requests\StoreSemakPermohonanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSemakPermohonanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SemakPermohonan  $semakPermohonan
     * @return \Illuminate\Http\Response
     */
    public function show(SemakPermohonan $semakPermohonan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SemakPermohonan  $semakPermohonan
     * @return \Illuminate\Http\Response
     */
    public function edit(SemakPermohonan $semakPermohonan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSemakPermohonanRequest  $request
     * @param  \App\Models\SemakPermohonan  $semakPermohonan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSemakPermohonanRequest $request, SemakPermohonan $semakPermohonan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SemakPermohonan  $semakPermohonan
     * @return \Illuminate\Http\Response
     */
    public function destroy(SemakPermohonan $semakPermohonan)
    {
        //
    }
}
