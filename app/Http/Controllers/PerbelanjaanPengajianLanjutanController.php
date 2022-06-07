<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePerbelanjaanPengajianLanjutanRequest;
use App\Http\Requests\UpdatePerbelanjaanPengajianLanjutanRequest;
use App\Models\JadualKursus;
use App\Models\Objek;
use App\Models\PengajianLanjutan;
use App\Models\PerbelanjaanPengajianLanjutan;
use App\Models\PusatTanggungjawab;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PerbelanjaanPengajianLanjutanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('perbelanjaan.pengajian_lanjutan.main', [
            'pusat_tanggungjawab' => PusatTanggungjawab::all(),
            'objek' => Objek::all(),
        ]);
    }

    public function carian(StorePerbelanjaanPengajianLanjutanRequest $request)
    {
        $tahun_semasa = date('Y');
        $rafis = Http::withBasicAuth('fc63259e09f9a60b2b793fbe5aa05dde9a47be11', '6b283bb060c269432d08ac33b47a337c0a40035d')
            ->get('https://www4.risda.gov.my/rafis/pengajianlanjutan/?tahun=' . $tahun_semasa)
            ->getBody()
            ->getContents();
        $rafis = json_decode($rafis, true);
        
        $rafis_pt = [];
        foreach ($rafis as $key => $r) {
            if ($r['Kod_PT'] == $request->kod_pt) {
                if ($r['Kod_PA_ABB'] == $request->kod_pa_abb) {
                    if ($r['Kod_Objek_ABB'] == $request->kod_objek_abb) {
                        array_push($rafis_pt, $r);
                    }
                }
            }
        }

        return view('perbelanjaan.pengajian_lanjutan.index.uls', [
            'rafis' => $rafis_pt,
        ]);
    }

    public function butiran_rekod($tahun, $kod_pa, $kod_objek, $no_dbil)
    {
        $semak = PerbelanjaanPengajianLanjutan::where('No_DBil', $no_dbil)->first();
        if ($semak != null) {
            return redirect('/perbelanjaan/pengajian-lanjutan/'.$semak->id.'/edit');
        }
        $rafis = Http::withBasicAuth('fc63259e09f9a60b2b793fbe5aa05dde9a47be11', '6b283bb060c269432d08ac33b47a337c0a40035d')
            ->get('https://www4.risda.gov.my/rafis/pengajianlanjutan/?tahun=' . $tahun)
            ->getBody()
            ->getContents();
        $rafis = json_decode($rafis, true);
        foreach ($rafis as $key => $r) {
            if ($r['No_DBil'] == $no_dbil) {
                $rafis_butiran = $r;
            }
        }

        $check = Auth::user()->jenis_pengguna;
        if ($check == 'Urus Setia ULS') {
            $peserta = PengajianLanjutan::with('pengguna')->where('unit_latihan', 'Staf')->get();
        } elseif ($check == 'Urus Setia ULPK') {
            $peserta = PengajianLanjutan::with('pengguna')->where('unit_latihan', 'Pekebun Kecil')->get();
        } else{
            $peserta = PengajianLanjutan::with('pengguna')->get();
        }
        
        return view('perbelanjaan.pengajian_lanjutan.show.uls', [
            'rafis' => $rafis_butiran,
            'peserta' => $peserta
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
     * @param  \App\Http\Requests\StorePerbelanjaanPengajianLanjutanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePerbelanjaanPengajianLanjutanRequest $request)
    {
        $perbelanjaanPengajianLanjutan = new PerbelanjaanPengajianLanjutan($request->all());
        $perbelanjaanPengajianLanjutan->save();

        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/perbelanjaan/pengajian-lanjutan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerbelanjaanPengajianLanjutan  $perbelanjaanPengajianLanjutan
     * @return \Illuminate\Http\Response
     */
    public function show(PerbelanjaanPengajianLanjutan $perbelanjaanPengajianLanjutan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerbelanjaanPengajianLanjutan  $perbelanjaanPengajianLanjutan
     * @return \Illuminate\Http\Response
     */
    public function edit($perbelanjaanPengajianLanjutan)
    {
        $rafis_check = PerbelanjaanPengajianLanjutan::find($perbelanjaanPengajianLanjutan);
        $rafis = Http::withBasicAuth('fc63259e09f9a60b2b793fbe5aa05dde9a47be11', '6b283bb060c269432d08ac33b47a337c0a40035d')
            ->get('https://www4.risda.gov.my/rafis/pengajianlanjutan/?tahun=' . $rafis_check->ThnKew)
            ->getBody()
            ->getContents();
        $rafis = json_decode($rafis, true);
        foreach ($rafis as $key => $r) {
            if ($r['No_DBil'] == $rafis_check->No_DBil) {
                $rafis_butiran = $r;
            }
        }

        $check = Auth::user()->jenis_pengguna;
        if ($check == 'Urus Setia ULS') {
            $peserta = PengajianLanjutan::with('pengguna')->where('unit_latihan', 'Staf')->get();
        } elseif ($check == 'Urus Setia ULPK') {
            $peserta = PengajianLanjutan::with('pengguna')->where('unit_latihan', 'Pekebun Kecil')->get();
        } else{
            $peserta = PengajianLanjutan::with('pengguna')->get();
        }
        return view('perbelanjaan.pengajian_lanjutan.edit', [
            'rafis' => $rafis_butiran,
            'rafis_risda' => $rafis_check,
            'peserta' => $peserta
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePerbelanjaanPengajianLanjutanRequest  $request
     * @param  \App\Models\PerbelanjaanPengajianLanjutan  $perbelanjaanPengajianLanjutan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePerbelanjaanPengajianLanjutanRequest $request, PerbelanjaanPengajianLanjutan $perbelanjaanPengajianLanjutan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerbelanjaanPengajianLanjutan  $perbelanjaanPengajianLanjutan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerbelanjaanPengajianLanjutan $perbelanjaanPengajianLanjutan)
    {
        //
    }
}
