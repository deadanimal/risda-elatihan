<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJadualKursusRequest;
use App\Http\Requests\UpdateJadualKursusRequest;
use App\Models\BidangKursus;
use App\Models\JadualKursus;
use App\Models\KategoriKursus;
use App\Models\KodKursus;
use App\Models\Negeri;
use App\Models\PeruntukanPeserta;
use App\Models\PusatTanggungjawab;
use App\Models\StatusPelaksanaan;

class JadualKursusController extends Controller
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
        $jadualKursus = JadualKursus::all();
        $bidang = BidangKursus::all();
        return view('pengurusan_kursus.semak_jadual.index',[
            'jadual'=>$jadualKursus,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bidang = BidangKursus::all();
        $kategori = KategoriKursus::all();
        $tajuk = KodKursus::all();
        $status_pelaksanaan = StatusPelaksanaan::all();
        return view('pengurusan_kursus.semak_jadual.create',[
            'bidang'=>$bidang,
            'kategori'=>$kategori,
            'kod_kursus'=>$tajuk,
            'status_pelaksanaan'=>$status_pelaksanaan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJadualKursusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJadualKursusRequest $request)
    {
        $jadualKursus = new JadualKursus($request->all());
        if($request->status == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }
        $jadualKursus->kursus_status = $status;
        $jadualKursus->save();

        alert()->success('Maklumat telah disimipan', 'Berjaya Disimpan');
        return redirect('/pengurusan_kursus/peruntukan_peserta/'.$jadualKursus->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JadualKursus  $jadualKursus
     * @return \Illuminate\Http\Response
     */
    public function show(JadualKursus $jadualKursus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JadualKursus  $jadualKursus
     * @return \Illuminate\Http\Response
     */
    public function edit(JadualKursus $jadualKursus)
    {
        return view('pengurusan_kursus.jadual_kursus.edit',[
            'jadual'=>$jadualKursus
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJadualKursusRequest  $request
     * @param  \App\Models\JadualKursus  $jadualKursus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJadualKursusRequest $request, JadualKursus $jadualKursus)
    {
        $jadualKursus->create($request->all());
        if($request->status_kursus == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }
        $jadualKursus->kursus_status = $status;
        $jadualKursus->save();

        alert()->success('Maklumat telah dikemaskini', 'Kemaskini');
        return redirect('/pengurusan_kursus/semak_jadual');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JadualKursus  $jadualKursus
     * @return \Illuminate\Http\Response
     */
    public function destroy(JadualKursus $jadualKursus)
    {
        $jadualKursus->delete();

        alert()->success('Maklumat telah dihapus', 'Hapus');
        return redirect('/pengurusan_kursus/semak_jadual');
    }
}
