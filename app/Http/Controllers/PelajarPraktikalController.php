<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePelajarPraktikalRequest;
use App\Http\Requests\UpdatePelajarPraktikalRequest;
use Illuminate\Http\Request;
use App\Models\PelajarPraktikal;

class PelajarPraktikalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelajar=PelajarPraktikal::all();

        return view('pelajar_praktikal.index2',[
            'pelajar'=>$pelajar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pelajar_praktikal.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePelajarPraktikalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pelajar = new PelajarPraktikal;

        $pelajar->nama = $request->nama;
        $pelajar->no_kp = $request->no_kp;
        $pelajar->tarikh_lahir = $request->tarikh_lahir;
        $pelajar->tempat_praktikal = $request->tempat_praktikal;
        $pelajar->jantina = $request->jantina;
        $pelajar->no_tel = $request->no_tel;
        $pelajar->email = $request->email;
        $pelajar->status = $request->status;
        $pelajar->alamat = $request->alamat;
        $pelajar->poskod = $request->poskod;
        $pelajar->daerah = $request->daerah;
        $pelajar->negeri = $request->negeri;
        $pelajar->tarikh_mula = $request->tarikh_mula;
        $pelajar->tarikh_akhir = $request->tarikh_akhir;
        $pelajar->status_praktikal = $request->status_praktikal;
        $pelajar->nama_ipt = $request->nama_ipt;
        $pelajar->alamat_ipt = $request->alamat_ipt;
        $pelajar->poskod_ipt = $request->poskod_ipt;
        $pelajar->daerah_ipt = $request->daerah_ipt;
        $pelajar->negeri_ipt = $request->negeri_ipt;
        $pelajar->kelayakan_elaun = $request->kelayakan_elaun;
        $pelajar->kelulusan_awal_pembiayaan = $request->kelulusan_awal_pembiayaan;
        $pelajar->tahap_pengajian = $request->tahap_pengajian;
        $pelajar->bidang = $request->bidang;



        $pelajar->save();
        alert()->success('Maklumat Pelajar Praktikal Berjaya Disimpan', 'Berjaya Disimpan');
        return redirect('/us-uls/PelajarPraktikal');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PelajarPraktikal  $pelajarPraktikal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelajar = PelajarPraktikal::find($id);

        return view('pelajar_praktikal.show',[
            'pelajar'=>$pelajar
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PelajarPraktikal  $pelajarPraktikal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelajar = PelajarPraktikal::find($id);

        return view('pelajar_praktikal.edit',[
            'pelajar'=>$pelajar
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePelajarPraktikalRequest  $request
     * @param  \App\Models\PelajarPraktikal  $pelajarPraktikal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pelajar = PelajarPraktikal::find($id);

        $pelajar->nama = $request->nama;
        $pelajar->no_kp = $request->no_kp;
        $pelajar->tarikh_lahir = $request->tarikh_lahir;
        $pelajar->tempat_praktikal = $request->tempat_praktikal;
        $pelajar->jantina = $request->jantina;
        $pelajar->no_tel = $request->no_tel;
        $pelajar->email = $request->email;
        $pelajar->status = $request->status;
        $pelajar->alamat = $request->alamat;
        $pelajar->poskod = $request->poskod;
        $pelajar->daerah = $request->daerah;
        $pelajar->negeri = $request->negeri;
        $pelajar->tarikh_mula = $request->tarikh_mula;
        $pelajar->tarikh_akhir = $request->tarikh_akhir;
        $pelajar->status_praktikal = $request->status_praktikal;
        $pelajar->nama_ipt = $request->nama_ipt;
        $pelajar->alamat_ipt = $request->alamat_ipt;
        $pelajar->daerah_ipt = $request->daerah_ipt;
        $pelajar->negeri_ipt = $request->negeri_ipt;
        $pelajar->kelayakan_elaun = $request->kelayakan_elaun;
        $pelajar->kelulusan_awal_pembiayaan = $request->kelulusan_awal_pembiayaan;
        $pelajar->tahap_pengajian = $request->tahap_pengajian;
        $pelajar->bidang = $request->bidang;



        $pelajar->save();


        alert()->success('Maklumat Pelajar Praktikal Berjaya Dikemaskini', 'Berjaya Dikemaskini');
        return redirect('/us-uls/PelajarPraktikal');

        // $pelajar = PelajarPraktikal::find($id);

        // if ($request->status == 'on') {
        //     $status = 1;
        // } else {
        //     $status = 0;
        // }

        // if ($request->kelayakan_elaun == 'on') {
        //     $kelayakan_elaun = 1;
        // } else {
        //     $kelayakan_elaun = 0;
        // }



        // $input = $request->all();
        // $pelajar->status = $status;
        // $pelajar->fill($input)->save();

        // alert()->success('Maklumat Pelajar Praktikal Berjaya Dikemaskini', 'Berjaya Dikemaskini');
        // return redirect('/us-uls/PelajarPraktikal');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PelajarPraktikal  $pelajarPraktikal
     * @return \Illuminate\Http\Response
     */
    public function destroy(PelajarPraktikal $pelajarPraktikal)
    {
        //
    }
}
