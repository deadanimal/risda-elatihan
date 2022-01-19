<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKehadiranRequest;
use App\Http\Requests\UpdateKehadiranRequest;
use App\Models\Kehadiran;

class KehadiranController extends Controller
{

    public function indexULS($kod_kursus)
    {
        return view('uls.peserta.permohonan.kehadiran', [
            'kod_kursus' => $kod_kursus,
        ]);
    }
    public function indexULPK($kod_kursus)
    {
        return view('ulpk.peserta.permohonan.kehadiran', [
            'kod_kursus' => $kod_kursus,
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fromUlsQR()
    {
        return view('uls.peserta.permohonan.kehadiranQR');
    }
    public function fromUlpkQR()
    {
        return view('uls.peserta.permohonan.kehadiranQR');
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
     * @param  \App\Http\Requests\StoreKehadiranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKehadiranRequest $request)
    {
        Kehadiran::create($request->all());
        return redirect('/permohonan/kehadiran/' . $request->kod_kursus)->with('kod_kursus', $request->kod_kursus);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function show(Kehadiran $kehadiran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function edit(Kehadiran $kehadiran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKehadiranRequest  $request
     * @param  \App\Models\Kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKehadiranRequest $request, Kehadiran $kehadiran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kehadiran $kehadiran)
    {
        //
    }

    // Urus Setia Uls
    public function admin_kehadiran_peserta_UsUls()
    {
        return view('uls.urus_setia.kehadiran.kehadiran-ke-kursus.merekod-kehadiran');
    }
    public function admin_rekod_kehadiran_peserta_UsUls()
    {
        return view('uls.urus_setia.kehadiran.kehadiran-ke-kursus.rekod-kehadiran-peserta');
    }
    public function admin_mengesahkan_peserta_UsUls()
    {
        return view('uls.urus_setia.kehadiran.kehadiran-ke-kursus.mengesahkan-kehadiran');
    }
    public function admin_mengesahkan_kehadiran_peserta_UsUls()
    {
        return view('uls.urus_setia.kehadiran.kehadiran-ke-kursus.rekod-pengesahan-peserta');
    }

    // Urus Setia Ulpk
    public function admin_kehadiran_peserta_UsUlpk()
    {
        return view('ulpk.urus_setia.kehadiran.kehadiran-ke-kursus.merekod-kehadiran');
    }
    public function admin_rekod_kehadiran_peserta_UsUlpk()
    {
        return view('ulpk.urus_setia.kehadiran.kehadiran-ke-kursus.rekod-kehadiran-peserta');
    }
    public function admin_mengesahkan_peserta_UsUlpk()
    {
        return view('ulpk.urus_setia.kehadiran.kehadiran-ke-kursus.mengesahkan-kehadiran');
    }
    public function admin_mengesahkan_kehadiran_peserta_UsUlpk()
    {
        return view('ulpk.urus_setia.kehadiran.kehadiran-ke-kursus.rekod-pengesahan-peserta');
    }

}
