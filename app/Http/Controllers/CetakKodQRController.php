<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\KodKursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CetakKodQRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kod_kursus = KodKursus::all();

        if (Route::getCurrentRoute()->getPrefix() == "us-uls/kehadiran") {
            return view('uls.urus_setia.kehadiran.cetakkodqr.index', ['kod_kursus' => $kod_kursus]);
        } elseif (Route::getCurrentRoute()->getPrefix() == "us-ulpk/kehadiran") {
            return view('ulpk.urus_setia.kehadiran.cetakkodqr.index', ['kod_kursus' => $kod_kursus]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KodKursus  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function show($kod_kursus)
    {
        $k = KodKursus::where('id', $kod_kursus)->firstorFail();
        $kehadiran = Kehadiran::where('kod_kursus', $k->kod_Kursus)
            ->orderBy('tarikh', 'ASC')->get();
        $hari = ['Pertama', 'Kedua', 'Ketiga', 'Keempat', 'Kelima', 'Keenam'];

        if (Route::getCurrentRoute()->getPrefix() == "us-uls/kehadiran") {
            return view('uls.urus_setia.kehadiran.cetakkodqr.show', [
                'kod_kursus' => $k,
                'kehadiran' => $kehadiran,
                'hari' => $hari,
            ]);
        } elseif (Route::getCurrentRoute()->getPrefix() == "us-ulpk/kehadiran") {
            return view('ulpk.urus_setia.kehadiran.cetakkodqr.show', ['kod_kursus' => $k]);
        }

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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kehadiran $kehadiran)
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
}
