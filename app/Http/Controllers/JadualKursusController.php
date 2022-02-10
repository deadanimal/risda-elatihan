<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJadualKursusRequest;
use App\Http\Requests\UpdateJadualKursusRequest;
use App\Models\Agensi;
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
        $hari_ini = date("Y-m-d");
        // dd($hari_ini);

        $bidang = BidangKursus::all();
        $kategori = KategoriKursus::all();
        $tajuk = KodKursus::all();
        $status_pelaksanaan = StatusPelaksanaan::all();
        $tempat = Agensi::all();
        $pengendali = Agensi::all();
        return view('pengurusan_kursus.semak_jadual.create',[
            'bidang'=>$bidang,
            'kategori'=>$kategori,
            'kod_kursus'=>$tajuk,
            'status_pelaksanaan'=>$status_pelaksanaan,
            'hari_ini'=>$hari_ini,
            'pengendali'=>$pengendali,
            'tempat'=>$tempat
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
        $bidang = BidangKursus::all();
        $kategori = KategoriKursus::all();
        $kod_kursus = KodKursus::all();
        $status_pelaksanaan = StatusPelaksanaan::all();
        return view('pengurusan_kursus.semak_jadual.edit',[
            'jadual'=>$jadualKursus,
            'bidang'=>$bidang,
            'kategori'=>$kategori,
            'kod_kursus'=>$kod_kursus,
            'status_pelaksanaan'=>$status_pelaksanaan
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

        if($request->status == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }
        $input = $request->all();
        $jadualKursus->kursus_status = $status;
        $jadualKursus->fill($input)->save();

        alert()->success('Maklumat telah disimipan', 'Berjaya Disimpan');
        return redirect('/pengurusan_kursus/peruntukan_peserta/'.$jadualKursus->id);
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
