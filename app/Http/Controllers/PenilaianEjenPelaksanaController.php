<?php

namespace App\Http\Controllers;

use App\Http\Middleware\EjenPelaksana;
use App\Http\Requests\StorePenilaianEjenPelaksanaRequest;
use App\Http\Requests\UpdatePenilaianEjenPelaksanaRequest;
use Illuminate\Http\Request;
use App\Models\PenilaianEjenPelaksana;
use App\Models\KodKursus;
use App\Models\JadualKursus;
use App\Models\Agensi;
use App\Models\PenceramahKonsultan;
use BeyondCode\QueryDetector\Outputs\Alert;

class PenilaianEjenPelaksanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    $kursus=JadualKursus::where('kursus_status_pelaksanaan','1')->get();

    //    foreach ($kursus as $k) {
    //        $k['pc'] = PenceramahKonsultan::with('agensi')->where('pc_jadual_kursus',$k->id)->get();
    //    }

    // //    dd($kursus);

        $ejen=PenceramahKonsultan::with(['agensi', 'jadual_kursus'])->get();
        // $agensi = Agensi::where('id',$ejen->agensi->id)->first();
        // $kursus = JadualKursus::where('id',$ejen->jadual_kursus->id)->first();
        // $penilaian_ejen=PenilaianEjenPelaksana::where('jadual_kursus_id',$ejen->jadual_kursus->id)
        // ->where('agensi_id',$ejen->agensi->id)->get();



        // dd($penilaian_ejen);
        // foreach ($ejen as $e) {
        //     $kursus=JadualKursus::where('kursus_status_pelaksanaan','1')->with('penceramah')->first();
        // }

        return view('penilaian.ejen-pelaksana.index',[
            'ejen'=>$ejen,
            // 'penilaian_ejen'=>$penilaian_ejen

        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $kursus = JadualKursus::find($id);
        // $agensi = PenceramahKonsultan::where('pc_jadual_kursus',$kursus->id)->first();
        //     foreach ($agensi as $a) {
        //         $ejen = Agensi::where('id',$a->pc_id)->first();
        //     }

        // dd($ejen);
        return view('penilaian.ejen-pelaksana.soalan-ejen',[
            'kursus'=>$kursus,
            // 'agensi'=>$agensi
        ]);
    }


    public function store(Request $request)
    {
        $penilaian_ejen = New PenilaianEjenPelaksana;

        $penilaian_ejen->jadual_kursus_id=$request->jadual_kursus_id;
        $penilaian_ejen->agensi_id=$request->agensi_id;
        $penilaian_ejen->urusetia_sesuai=$request->urusetia_sesuai;
        $penilaian_ejen->pematuhan_masa=$request->pematuhan_masa;
        $penilaian_ejen->mudah_dihubungi=$request->mudah_dihubungi;
        $penilaian_ejen->maklumbalas_ejen=$request->maklumbalas_ejen;
        $penilaian_ejen->tahap_displin=$request->tahap_displin;
        $penilaian_ejen->prestasi_kerja=$request->prestasi_kerja;
        $penilaian_ejen->kuantiti_cukup=$request->kuantiti_cukup;
        $penilaian_ejen->kualiti_menepati=$request->kualiti_menepati;
        $penilaian_ejen->tempoh_dihantar=$request->tempoh_dihantar;
        $penilaian_ejen->patuhi_jadual=$request->patuhi_jadual;
        $penilaian_ejen->patuhi_skop=$request->patuhi_skop;
        $penilaian_ejen->kualiti_perkhidmatan=$request->kualiti_perkhidmatan;
        $penilaian_ejen->ketepatan_masa=$request->ketepatan_masa;
        $penilaian_ejen->kerjasama_bahagianLatihan=$request->kerjasama_bahagianLatihan;

        $penilaian_ejen->save();

        alert()->success('Penilaian telah berjaya dibuat!', ' Berjaya');
        return redirect('/penilaian/ejen-pelaksana');




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenilaianEjenPelaksana  $penilaianEjenPelaksana
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penilaian_ejen = PenilaianEjenPelaksana::find($id);
        $kursus = JadualKursus::where('id',$penilaian_ejen->jadual_kursus_id)->first();

        return view('penilaian.ejen-pelaksana.show',[
            'kursus'=>$kursus,
            'penilaian_ejen'=>$penilaian_ejen
        ]);
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
