<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenilaianKeberkesananRequest;
use App\Http\Requests\UpdatePenilaianKeberkesananRequest;
use App\Models\PenilaianKeberkesanan;
use App\Models\Kehadiran;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JadualKursus;

class PenilaianKeberkesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *-
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kehadiran=Kehadiran::where('status_kehadiran_ke_kursus','HADIR')->
        with(['penilaiankeberkesanan','kursus','staff'])->get();

        // $kursus=JadualKursus::with('aturcara')->get();
        // $kursus=JadualKursus::where('id',$kehadiran->jadual_kursus_id)->first();


        // foreach ($kehadiran as $k) {
        //     // $keberkesanan = PenilaianKeberkesanan::where('kehadiran_id',$k->id)->first();
        //     $kursus=JadualKursus::where('id',$k->jadual_kursus_id)->first();
        //     // $peserta=User::where('id',$k->no_pekerja)->orWhere('no_KP',$k->noKP_pengganti)->first();
        //}

        // dd($kehadiran->staff);

        return view('penilaian.keberkesanan.index',[
            'kehadiran'=>$kehadiran
            // 'kursus'=>$kursus
            // 'peserta'=>$peserta,
            // 'keberkesanan'=>$keberkesanan
        ]);
    }


    public function create($id)
    {
        $kehadiran=Kehadiran::find($id);

        return view('penilaian.keberkesanan.soalan-keberkesanan',[
            'kehadiran'=>$kehadiran
        ]);
    }


    public function store(Request $request)

    {
        $keberkesanan= new PenilaianKeberkesanan;

        $keberkesanan->kehadiran_id=$request->kehadiran_id;
        $keberkesanan->tahap_pengetahuan=$request->tahap_pengetahuan;
        $keberkesanan->tempoh_tugasan=$request->tempoh_tugasan;
        $keberkesanan->baiki_kerja=$request->baiki_kerja;
        $keberkesanan->kesungguhan_kerja=$request->kesungguhan_kerja;
        $keberkesanan->tahap_displin=$request->tahap_displin;
        $keberkesanan->prestasi_kerja=$request->prestasi_kerja;
        $keberkesanan->komen_penyelia=$request->komen_penyelia;

        $keberkesanan->save();

        alert()->success('Penilaian telah berjaya dibuat!', 'Berjaya');
        return redirect('/penilaian/keberkesanan-kursus/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenilaianKeberkesanan  $penilaianKeberkesanan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penilaian_keberkesanan= PenilaianKeberkesanan::find($id);

        return view('penilaian.keberkesanan.show',[
            'penilaian_keberkesanan'=>$penilaian_keberkesanan
        ]);


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
