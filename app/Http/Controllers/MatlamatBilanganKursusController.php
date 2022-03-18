<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMatlamatBilanganKursusRequest;
use App\Http\Requests\UpdateMatlamatBilanganKursusRequest;
use App\Models\MatlamatBilanganKursus;
use Illuminate\Http\Request;

class MatlamatBilanganKursusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('utiliti.matlamat_tahunan.kursus.index', [
            'matlamat_tahunan' => MatlamatBilanganKursus::all()
        ]);
    }

    public function carian(Request $request)
    {
        if ($request->jenis_m == 'bidang kursus') {
            $carian = MatlamatBilanganKursus::whereYear('created_at', $request->tahun)
                ->where('jenis', $request->jenis_m)->get();
        } elseif($request->jenis_m == 'kategori kursus') {
            $carian = MatlamatBilanganKursus::whereYear('created_at', $request->tahun)
                ->where('jenis', '!=', 'tajuk')->get();
        }elseif($request->jenis_m == 'tajuk kursus'){
            $carian = MatlamatBilanganKursus::whereYear('created_at', $request->tahun)
                ->get();
        }

        $tahun = $request->tahun;
        $jenis =[];
        $jenis['name'] = ucwords($request->jenis_m);
        $jenis['val'] = $request->jenis_m;
        $title = strtoupper($request->jenis_m);

        return view('utiliti.matlamat_tahunan.kursus.carian',[
            'matlamat_tahunan'=>$carian,
            'tahun'=>$tahun,
            'jenis'=>$jenis,
            'title'=>$title
        ]);
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
     * @param  \App\Http\Requests\StoreMatlamatBilanganKursusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatlamatBilanganKursusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MatlamatBilanganKursus  $matlamatBilanganKursus
     * @return \Illuminate\Http\Response
     */
    public function show(MatlamatBilanganKursus $matlamatBilanganKursus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MatlamatBilanganKursus  $matlamatBilanganKursus
     * @return \Illuminate\Http\Response
     */
    public function edit(MatlamatBilanganKursus $matlamatBilanganKursus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMatlamatBilanganKursusRequest  $request
     * @param  \App\Models\MatlamatBilanganKursus  $matlamatBilanganKursus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMatlamatBilanganKursusRequest $request, MatlamatBilanganKursus $matlamatBilanganKursus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MatlamatBilanganKursus  $matlamatBilanganKursus
     * @return \Illuminate\Http\Response
     */
    public function destroy(MatlamatBilanganKursus $matlamatBilanganKursus)
    {
        //
    }
}
