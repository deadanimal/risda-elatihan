<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenilaianPesertaRequest;
use App\Http\Requests\UpdatePenilaianPesertaRequest;
use App\Models\JadualKursus;
use App\Models\KodKursus;
use App\Models\PenilaianPeserta;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PenilaianPesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $permohonan = Permohonan::with('jadual')->where('no_pekerja', auth()->user()->id)
            ->where('status_permohonan', 4)
            ->get()->first();
dd($permohonan);
        $permohonan = Permohonan::with('jadual')->where('no_pekerja', auth()->user()->id)
            ->where('status_permohonan', 4)
            ->where('dinilai', null)->get()->first();
        // dd($permohonan);
        return view('penilaian.penilaian-kursus', [
            'permohonan' => $permohonan,
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
     * @param  \App\Http\Requests\StorePenilaianPesertaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jadual_kursus = JadualKursus::where('id', $request->jadual_id)->firstOrFail();
        // Bahagian A
        for ($i = 1; $i < 9; $i++) {
            $jawapan = "s" . $i;
            PenilaianPeserta::create([
                "kod_kursus" => $jadual_kursus->kod_kursus,
                "kod_jenis_kursus" => $jadual_kursus->kod_jenis_kursus,
                "kod_kategori_kursus" => $jadual_kursus->kodkursus->U_Kategori_Kursus,
                "kod_pusat_tanggungjawab" => null,
                "id_jadual" => $jadual_kursus->id,
                "id_jawapan" => "as" . $i,
                "nama_peserta" => auth()->user()->name,
                "soalan_penilaian" => "A",
                "skala_jawapan" => $request->$jawapan,
                "cadangan_kursus" => null,
                "topik_kursus" => $request->topik_kursus,
            ]);
        }

        //Bahagian B
        for ($i = 1; $i < 6; $i++) {
            $jawapan = "bs" . $i;
            PenilaianPeserta::create([
                "kod_kursus" => $jadual_kursus->kod_kursus,
                "kod_jenis_kursus" => $jadual_kursus->kod_jenis_kursus,
                "kod_kategori_kursus" => $jadual_kursus->kodkursus->U_Kategori_Kursus,
                "kod_pusat_tanggungjawab" => null,
                "id_jadual" => $jadual_kursus->id,
                "id_jawapan" => "bs" . $i,
                "nama_peserta" => auth()->user()->name,
                "soalan_penilaian" => "B",
                "skala_jawapan" => $request->$jawapan,
                "cadangan_kursus" => null,
                "topik_kursus" => $request->topik_kursus,
            ]);
        }

        //Bahagian C
        if ($request->penceramah_id != null) {
            foreach ($request->penceramah_id as $p) {
                for ($i = 1; $i < 5; $i++) {
                    $jawapan = $p . "cs" . $i;
                    PenilaianPeserta::create([
                        "kod_kursus" => $jadual_kursus->kod_kursus,
                        "kod_jenis_kursus" => $jadual_kursus->kod_jenis_kursus,
                        "kod_kategori_kursus" => $jadual_kursus->kodkursus->U_Kategori_Kursus,
                        "kod_pusat_tanggungjawab" => null,
                        "id_jadual" => $jadual_kursus->id,
                        "id_jawapan" => "cs" . $i,
                        "nama_peserta" => auth()->user()->name,
                        "soalan_penilaian" => "C - Penceramah ID " . $p,
                        "skala_jawapan" => $request->$jawapan,
                        "cadangan_kursus" => null,
                        "topik_kursus" => $request->topik_kursus,
                    ]);
                }
            }
        }

        //Bahagian D
        foreach ($request->ds as $key => $cadangan) {
            $jawapan = "ds" . $key + 1;
            PenilaianPeserta::create([
                "kod_kursus" => $jadual_kursus->kod_kursus,
                "kod_jenis_kursus" => $jadual_kursus->kod_jenis_kursus,
                "kod_kategori_kursus" => $jadual_kursus->kodkursus->U_Kategori_Kursus,
                "kod_pusat_tanggungjawab" => null,
                "id_jadual" => $jadual_kursus->id,
                "id_jawapan" => $jawapan,
                "nama_peserta" => auth()->user()->name,
                "soalan_penilaian" => "D",
                "skala_jawapan" => null,
                "cadangan_kursus" => $cadangan,
                "topik_kursus" => $request->topik_kursus,
            ]);
        }

        $permohonan = Permohonan::where('kod_kursus', $request->jadual_id)->first();
        $permohonan->update([
            'dinilai' => 'Ya',
        ]);

        return redirect(route('penilaian-kursus.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenilaianPeserta  $penilaianPeserta
     * @return \Illuminate\Http\Response
     */
    public function show($jadual_kursus_id)
    {
        $jadual_kursus = JadualKursus::with('agensi')->where('id', $jadual_kursus_id)->firstOrFail();

        return view('penilaian.soalan-penilaian', [
            'jadual_kursus' => $jadual_kursus,
            'nama_kursus' => $jadual_kursus->kursus_nama,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenilaianPeserta  $penilaianPeserta
     * @return \Illuminate\Http\Response
     */
    public function edit(PenilaianPeserta $penilaianPeserta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenilaianPesertaRequest  $request
     * @param  \App\Models\PenilaianPeserta  $penilaianPeserta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenilaianPesertaRequest $request, PenilaianPeserta $penilaianPeserta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenilaianPeserta  $penilaianPeserta
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenilaianPeserta $penilaianPeserta)
    {
        //
    }

    public function cetakQr()
    {
        $permohonan = Permohonan::where('status_permohonan', '1')->get();

        return view('penilaian.cetakQr', [
            'permohonan' => $permohonan,
        ]);
    }

    public function cetakQr2(JadualKursus $jadual_kursus)
    {
        return view('penilaian.cetakQr2', [
            'jadual_kursus' => $jadual_kursus,
        ]);
    }
}
