<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreElaunCutiRequest;
use App\Http\Requests\UpdateElaunCutiRequest;
use App\Models\ElaunCuti;
use App\Models\KategoriKursus;

class ElaunCutiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elaunCuti = KategoriKursus::join('elaun_cutis', 'kategori_kursuses.id', 'elaun_cutis.kod_Kategori_Kursus_Elaun')
        ->select('*')->get();
        $kategori = KategoriKursus::all();
        $bil_elaun = ElaunCuti::orderBy('id', 'desc')->first();
        if ($bil_elaun != null) {
            $bil = $bil_elaun->kod_Elaun_Kursus;
        }else{
            $bil = 0;
        }
        $bil = $bil + 1;
        $bil = sprintf("%02d", $bil);
        return view('utiliti.kursus.elaun_cuti_kursus.index',[
            'elaunCuti'=>$elaunCuti,
            'kategori'=>$kategori,
            'bil'=>$bil
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
     * @param  \App\Http\Requests\StoreElaunCutiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreElaunCutiRequest $request)
    {
        $elaunCuti = new ElaunCuti;
        $elaunCuti->kod_Kategori_Kursus_Elaun = $request->kod_Kategori_Kursus_Elaun;
        $elaunCuti->jenis_Elaun = $request->jenis_Elaun;
        $elaunCuti->kod_Elaun_Kursus = $request->kod_Elaun_Kursus;
        $elaunCuti->keterangan_Elaun = $request->keterangan_Elaun;
        $elaunCuti->amaun_Elaun = $request->amaun_Elaun;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $elaunCuti->status_Elaun = $status;

        $elaunCuti->save();
        alert()->success('Maklumat telah ditambah', 'Tambah');
        return redirect('/utiliti/elaun_cuti_kursus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ElaunCuti  $elaunCuti
     * @return \Illuminate\Http\Response
     */
    public function show(ElaunCuti $elaunCuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ElaunCuti  $elaunCuti
     * @return \Illuminate\Http\Response
     */
    public function edit(ElaunCuti $elaunCuti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateElaunCutiRequest  $request
     * @param  \App\Models\ElaunCuti  $elaunCuti
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateElaunCutiRequest $request, ElaunCuti $elaunCuti)
    {
        $elaunCuti->kod_Kategori_Kursus_Elaun = $request->kod_Kategori_Kursus_Elaun;
        $elaunCuti->jenis_Elaun = $request->jenis_Elaun;
        $elaunCuti->kod_Elaun_Kursus = $request->kod_Elaun_Kursus;
        $elaunCuti->keterangan_Elaun = $request->keterangan_Elaun;
        $elaunCuti->amaun_Elaun = $request->amaun_Elaun;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $elaunCuti->status_Elaun = $status;

        $elaunCuti->save();
        alert()->success('Maklumat telah dikemaskini', 'Kemaskini');
        return redirect('/utiliti/elaun_cuti_kursus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ElaunCuti  $elaunCuti
     * @return \Illuminate\Http\Response
     */
    public function destroy(ElaunCuti $elaunCuti)
    {
        $elaunCuti->delete()();
        alert()->success('Maklumat telah dihapuskan', 'Hapus');
        return redirect('/utiliti/elaun_cuti_kursus');
    }
}
