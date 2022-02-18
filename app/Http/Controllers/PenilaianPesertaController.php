<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenilaianPesertaRequest;
use App\Http\Requests\UpdatePenilaianPesertaRequest;
use App\Models\JadualKursus;
use App\Models\KodKursus;
use App\Models\PenilaianPeserta;
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

        return view('penilaian.penilaian-kursus', [
            'jadual_kursus' => JadualKursus::all(),
            'kod_kursus' => KodKursus::all(),
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
        $kod_kursus = KodKursus::where('kod_Kursus', $jadual_kursus->kod_kursus)->firstOrFail();

        // Bahagian A
        for ($i = 1; $i < 9; $i++) {
            $jawapan = "s" . $i;
            PenilaianPeserta::create([
                "kod_kursus" => $jadual_kursus->kod_kursus,
                "kod_jenis_kursus" => $jadual_kursus->kod_jenis_kursus,
                "kod_kategori_kursus" => $kod_kursus->U_Kategori_Kursus,
                "kod_pusat_tanggungjawab" => null,
                "id_jadual" => $jadual_kursus->id,
                "id_jawapan" => "as" . $i,
                "nama_peserta" => auth()->user()->name,
                "soalan_penilaian" => "A",
                "skala_jawapan" => $request->$jawapan,
                "cadangan_kursus" => null,
            ]);
        }

        //Bahagian B
        for ($i = 1; $i < 6; $i++) {
            $jawapan = "bs" . $i;
            PenilaianPeserta::create([
                "kod_kursus" => $jadual_kursus->kod_kursus,
                "kod_jenis_kursus" => $jadual_kursus->kod_jenis_kursus,
                "kod_kategori_kursus" => $kod_kursus->U_Kategori_Kursus,
                "kod_pusat_tanggungjawab" => null,
                "id_jadual" => $jadual_kursus->id,
                "id_jawapan" => "bs" . $i,
                "nama_peserta" => auth()->user()->name,
                "soalan_penilaian" => "B",
                "skala_jawapan" => $request->$jawapan,
                "cadangan_kursus" => null,
            ]);
        }

        //Bahagian C
        foreach ($request->penceramah_id as $p) {
            for ($i = 1; $i < 5; $i++) {
                $jawapan = $p . "cs" . $i;
                PenilaianPeserta::create([
                    "kod_kursus" => $jadual_kursus->kod_kursus,
                    "kod_jenis_kursus" => $jadual_kursus->kod_jenis_kursus,
                    "kod_kategori_kursus" => $kod_kursus->U_Kategori_Kursus,
                    "kod_pusat_tanggungjawab" => null,
                    "id_jadual" => $jadual_kursus->id,
                    "id_jawapan" => "cs" . $i,
                    "nama_peserta" => auth()->user()->name,
                    "soalan_penilaian" => "C - Penceramah ID " . $p,
                    "skala_jawapan" => $request->$jawapan,
                    "cadangan_kursus" => null,
                ]);
            }
        }

        //Bahagian D
        foreach ($request->ds as $key => $cadangan) {
            $jawapan = "ds" . $key + 1;
            PenilaianPeserta::create([
                "kod_kursus" => $jadual_kursus->kod_kursus,
                "kod_jenis_kursus" => $jadual_kursus->kod_jenis_kursus,
                "kod_kategori_kursus" => $kod_kursus->U_Kategori_Kursus,
                "kod_pusat_tanggungjawab" => null,
                "id_jadual" => $jadual_kursus->id,
                "id_jawapan" => $jawapan,
                "nama_peserta" => auth()->user()->name,
                "soalan_penilaian" => "D",
                "skala_jawapan" => null,
                "cadangan_kursus" => $cadangan,
            ]);

        }

        return redirect(route('penilaian-kursus.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenilaianPeserta  $penilaianPeserta
     * @return \Illuminate\Http\Response
     */
    public function show($kod_kursus)
    {
        $jadual_kursus = JadualKursus::where('kod_kursus', $kod_kursus)->firstOrFail();

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
}
