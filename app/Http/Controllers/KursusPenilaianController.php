<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreKursusPenilaianRequest;
use App\Http\Requests\UpdateKursusPenilaianRequest;
use App\Models\KursusPenilaian;
use App\Models\JadualKursus;
use App\Models\Aturcara;
use App\Models\Agensi;
use App\Models\Permohonan;
use Illuminate\Support\Facades\Auth;


class KursusPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth::user()->jenis_pengguna=='Peserta ULPK'){
            $permohonan = Permohonan::with('jadual')->where('no_pekerja', auth()->user()->id)
            ->where('status_permohonan', 4)
            ->get()->first();

            return view('penilaian.penilaian-kursus-ulpk',[
                'permohonan'=>$permohonan
                // 'jadual_kursus'=>$jadual_kursus
            ]);
        }



        elseif(auth::user()->jenis_pengguna=='Urus Setia ULPK'){

            $jadual_kursus = JadualKursus::where('kursus_unit_latihan','Pekebun Kecil')->get();

            return view('penilaian.kursus.index-ulpk',[
                'jadual_kursus'=>$jadual_kursus
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $jadual_kursus =JadualKursus::findOrFail($id);
        $aturcara = Aturcara::where('ac_jadual_kursus',$jadual_kursus->id)->get();

    // dd( $jadual_kursus );

        return view ('penilaian.kursus.create',[
            'jadual_kursus'=>$jadual_kursus,
            'aturcara'=>$aturcara
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKursusPenilaianRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreKursusPenilaianRequest $request)
    {
        $kursusPenilaian = new KursusPenilaian;

        $kursusPenilaian->jadual_kursus_id= $request->jadual_kursus_id;
        $kursusPenilaian->bahagian="A";
        $kursusPenilaian->kategori_jawapan=$request->kategori_jawapan;
        $kursusPenilaian->kategori_soalan=$request->kategori_soalan;
        $kursusPenilaian->jawapan=$request->jawapan;
        $kursusPenilaian->status_soalan=$request->status_soalan;

        $kursusPenilaian->save();
        return redirect('/');
        alert()->success('Soalan Telah Ditambah','Berjaya');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KursusPenilaian  $kursusPenilaian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadual_kursus = JadualKursus::find($id);
        $agensi = Agensi::where('id',$jadual_kursus->kursus_tempat)->first();

        return view('penilaian.kursus.bahagianA', [
            'jadual_kursus' => $jadual_kursus,
            'nama_kursus' => $jadual_kursus->kursus_nama,
            'agensi'=>$agensi
        ]);
    }


    public function bahagianB($id)
    {
        $jadual_kursus = JadualKursus::find($id);
        $agensi = Agensi::where('id',$jadual_kursus->kursus_tempat)->first();


        return view('penilaian.kursus.bahagianB', [
            'jadual_kursus' => $jadual_kursus,
            'nama_kursus' => $jadual_kursus->kursus_nama,
            'agensi'=>$agensi

        ]);
    }

    public function bahagianC($id)
    {
        $jadual_kursus = JadualKursus::find($id);
        $agensi = Agensi::where('id',$jadual_kursus->kursus_tempat)->first();


        return view('penilaian.kursus.bahagianC', [
            'jadual_kursus' => $jadual_kursus,
            'nama_kursus' => $jadual_kursus->kursus_nama,
            'agensi'=>$agensi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KursusPenilaian  $kursusPenilaian
     * @return \Illuminate\Http\Response
     */
    public function edit(KursusPenilaian $kursusPenilaian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKursusPenilaianRequest  $request
     * @param  \App\Models\KursusPenilaian  $kursusPenilaian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKursusPenilaianRequest $request, KursusPenilaian $kursusPenilaian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KursusPenilaian  $kursusPenilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(KursusPenilaian $kursusPenilaian)
    {
        //
    }
}
