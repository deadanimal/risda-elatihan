<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJadualKursusRequest;
use App\Http\Requests\UpdateJadualKursusRequest;
use App\Models\Agensi;
use App\Models\Aturcara;
use App\Models\BidangKursus;
use App\Models\Daerah;
use App\Models\JadualKursus;
use App\Models\KategoriAgensi;
use App\Models\KategoriKursus;
use App\Models\KelayakanElauncuti;
use App\Models\KodKursus;
use App\Models\Negeri;
use App\Models\NotaRujukan;
use App\Models\PenceramahKonsultan;
use App\Models\PeruntukanPeserta;
use App\Models\StatusPelaksanaan;
use Illuminate\Http\Request;

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
        $jadualKursus = JadualKursus::with(['tempat', 'status_pelaksanaan'])->get();
        foreach ($jadualKursus as $key => $jk) {
            $sum = 0;
          
            $bil = PeruntukanPeserta::where('pp_jadual_kursus', $jk->id)->get();

            foreach ($bil as $k => $b) {
                $sum = $sum + $b->pp_peruntukan_calon;
            }
            $jk['bilangan'] = $sum;
        }
        $bidang = BidangKursus::all();
        return view('pengurusan_kursus.semak_jadual.index', [
            'jadual' => $jadualKursus,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jadualKursus = JadualKursus::all();
        $hari_ini = date("Y-m-d");
        $tahun_ini = date("Y");
        $bidang = BidangKursus::all();
        $kategori = KategoriKursus::all();
        $tajuk = KodKursus::all();
        $status_pelaksanaan = StatusPelaksanaan::all();
        $kod_tempat = KategoriAgensi::where('Kategori_Agensi', 'Tempat Kursus')->first();
        if ($kod_tempat != null) {
            $tempat = Agensi::where('kategori_agensi', $kod_tempat->id)->get();
        } else {
            $tempat = null;
        }
        $pengendali = Agensi::with('kategori')->get();
        $list_jadual = JadualKursus::all();
        $negeri = Negeri::all();
        $daerah = Daerah::all();
        return view('pengurusan_kursus.semak_jadual.create', [
            'bidang' => $bidang,
            'kategori' => $kategori,
            'kod_kursus' => $tajuk,
            'status_pelaksanaan' => $status_pelaksanaan,
            'hari_ini' => $hari_ini,
            'pengendali' => $pengendali,
            'tempat' => $tempat,
            'tahun_ini' => $tahun_ini,
            'jadual' => $jadualKursus,
            'list_jadual' => $list_jadual,
            'negeri' => $negeri,
            'daerah' => $daerah,
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
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $jadualKursus->kursus_status = $status;
        $jadualKursus->save();

        alert()->success('Maklumat telah disimipan', 'Berjaya Disimpan');
        return redirect('/pengurusan_kursus/peruntukan_peserta/' . $jadualKursus->id);
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
    public function edit($id)
    {
        $pengendali = Agensi::with('kategori')->get();
        $jadualKursus = JadualKursus::with(['status_pelaksanaan', 'pengendali', 'tempat'])->find($id);
        $list_jadual = JadualKursus::all();
        $bidang = BidangKursus::all();
        $kategori = KategoriKursus::all();
        $kod_kursus = KodKursus::all();
        $status_pelaksanaan = StatusPelaksanaan::all();
        return view('pengurusan_kursus.semak_jadual.edit', [
            'jadual' => $jadualKursus,
            'bidang' => $bidang,
            'kategori' => $kategori,
            'kod_kursus' => $kod_kursus,
            'status_pelaksanaan' => $status_pelaksanaan,
            'list_jadual' => $list_jadual,
            'pengendali' => $pengendali,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJadualKursusRequest  $request
     * @param  \App\Models\JadualKursus  $jadualKursus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJadualKursusRequest $request, $id)
    {
        $jadualKursus = JadualKursus::find($id);
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $input = $request->all();
        $jadualKursus->kursus_status = $status;
        $jadualKursus->fill($input)->save();

        alert()->success('Maklumat telah disimipan', 'Berjaya Disimpan');
        return redirect('/pengurusan_kursus/peruntukan_peserta/' . $jadualKursus->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JadualKursus  $jadualKursus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // aturcara
        $aturcara = Aturcara::where('ac_jadual_kursus', $id)->get();
        foreach ($aturcara as $key => $ac) {
            $ac->delete();
        }
        // kelayakan elauncuti
        $elauncuti = KelayakanElauncuti::where('kec_jadual_kursus', $id)->get();
        foreach ($elauncuti as $key => $ec) {
            $ec->delete();
        }
        // nota rujukan
        $notarujukan = NotaRujukan::where('nr_jadual_kursus', $id)->get();
        foreach ($notarujukan as $key => $nr) {
            $nr->delete();
        }
        // penceramah konsultan
        $penceramah = PenceramahKonsultan::where('pc_jadual_kursus', $id)->get();
        foreach ($penceramah as $key => $pc) {
            $pc->delete();
        }
        // peruntukan peserta
        $peruntukanpeserta = PeruntukanPeserta::where('pp_jadual_kursus', $id)->get();
        foreach ($peruntukanpeserta as $key => $pp) {
            $pp->delete();
        }

        $jadualKursus = JadualKursus::find($id);
        $jadualKursus->delete();

        alert()->success('Maklumat telah dihapus', 'Hapus');
        return redirect('/pengurusan_kursus/semak_jadual');
    }

    public function filter($search)
    {
        $jadualKursus = JadualKursus::where('kursus_unit_latihan', $search)->get();
        foreach ($jadualKursus as $key => $jk) {
            $sum = 0;
            $bil = PeruntukanPeserta::where('pp_jadual_kursus', $jk->id)->get();

            foreach ($bil as $k => $b) {
                $sum = $sum + $b->pp_peruntukan_calon;
            }
            $jk['bilangan'] = $sum;
        }

        return response()->json($jadualKursus);
    }

    public function tambah_masa_mula_tamat_pre_post_test(Request $request, $id)
    {

        $jadualKursus = JadualKursus::where('id', $id)->first();

        $jadualKursus->kursus_masa_mula_pre_post_test = $request->kursus_masa_mula_pre_post_test;
        $jadualKursus->kursus_masa_tamat_pre_post_test = $request->kursus_masa_tamat_pre_post_test;
        
        $jadualKursus->save();

        alert()->success('Maklumat telah disimipan', 'Berjaya Disimpan');
        return redirect('/penilaian/pre-post-test/' . $id);
    }

    public function tambah_masa_mula_tamat_post_test(Request $request, $id)
    {

        $jadualKursus = JadualKursus::where('id', $id)->first();

        $jadualKursus->kursus_masa_mula_post_test = $request->kursus_masa_mula_post_test;
        $jadualKursus->kursus_masa_tamat_post_test = $request->kursus_masa_tamat_post_test;
        
        $jadualKursus->save();

        alert()->success('Maklumat telah disimipan', 'Berjaya Disimpan');
        return redirect('/penilaian/post-test/' . $id);
    }
}
