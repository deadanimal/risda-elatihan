<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermohonanRequest;
use App\Http\Requests\UpdatePermohonanRequest;
use App\Models\Permohonan;
use Illuminate\Support\Facades\Route;

class PermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexULS()
    {
        return view('uls.peserta.permohonan.statuspermohonan', [
            'permohonan' => Permohonan::all(),
        ]);
    }
    public function indexULPK()
    {
        return view('ulpk.peserta.permohonan.statuspermohonan', [
            'permohonan' => Permohonan::all(),
        ]);
    }

    public function katelog()
    {
        $route = Route::getCurrentRoute()->getPrefix();

        if ($route == "uls/permohonan") {
            return view('uls.peserta.permohonan.katelog');
        }

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
     * @param  \App\Http\Requests\StorePermohonanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermohonanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permohonan  $permohonan
     * @return \Illuminate\Http\Response
     */
    public function show(Permohonan $permohonan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permohonan  $permohonan
     * @return \Illuminate\Http\Response
     */
    public function edit(Permohonan $permohonan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePermohonanRequest  $request
     * @param  \App\Models\Permohonan  $permohonan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermohonanRequest $request, Permohonan $permohonan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permohonan  $permohonan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permohonan $permohonan)
    {
        //
    }
}
