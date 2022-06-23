<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePerbelanjaanKursusRequest;
use App\Http\Requests\UpdatePerbelanjaanKursusRequest;
use App\Models\JadualKursus;
use App\Models\Objek;
use App\Models\PerbelanjaanKursus;
use App\Models\PusatTanggungjawab;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PerbelanjaanKursusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('perbelanjaan.kursus.main', [
            'pusat_tanggungjawab' => PusatTanggungjawab::all(),
            'objek' => Objek::all(),
        ]);
    }

    public function carian(StorePerbelanjaanKursusRequest $request)
    {
        $tahun_semasa = date('Y');
        $rafis = Http::withBasicAuth('fc63259e09f9a60b2b793fbe5aa05dde9a47be11', '6b283bb060c269432d08ac33b47a337c0a40035d')
            ->get('https://www4.risda.gov.my/rafis/senaraipesanan/?tahun=' . $tahun_semasa . '&kod_PA=' . $request->kod_pa . '&kod_obj=' . $request->kod_objek)
            ->getBody()
            ->getContents();
        $rafis = json_decode($rafis, true);

        $rafis_pt = [];
        foreach ($rafis as $key => $r) {
            if ($r['Kod_PT'] == $request->kod_pt) {
                array_push($rafis_pt, $r);
            }
        }

        dd($rafis_pt);

        return view('perbelanjaan.kursus.index', [
            'rafis' => $rafis_pt,
        ]);
    }

    public function butiran_rekod($tahun, $kod_pa, $kod_objek, $no_pesanan)
    {
        $semak = PerbelanjaanKursus::where('No_Pesanan', $no_pesanan)->first();
        if ($semak != null) {
            return redirect('/perbelanjaan/perbelanjaan-kursus/'.$semak->id.'/edit');
        }
        $rafis = Http::withBasicAuth('fc63259e09f9a60b2b793fbe5aa05dde9a47be11', '6b283bb060c269432d08ac33b47a337c0a40035d')
            ->get('https://www4.risda.gov.my/rafis/senaraipesanan/?tahun=' . $tahun . '&kod_PA=' . $kod_pa . '&kod_obj=' . $kod_objek)
            ->getBody()
            ->getContents();
        $rafis = json_decode($rafis, true);
        foreach ($rafis as $key => $r) {
            if ($r['No_Pesanan'] == $no_pesanan) {
                $rafis_butiran = $r;
            }
        }

        $check = Auth::user()->jenis_pengguna;
        if (str_contains($check, 'ULS')) {
            $jadual = JadualKursus::doesntHave('perbelanjaan')->where('kursus_unit_latihan', 'Staf')->get();
        } elseif (str_contains($check, 'ULS')) {
            $jadual = JadualKursus::doesntHave('perbelanjaan')->where('kursus_unit_latihan', 'Pekebun Kecil')->get();
        } else{
            $jadual = JadualKursus::doesntHave('perbelanjaan')->get();
        }
        
        return view('perbelanjaan.kursus.create', [
            'rafis' => $rafis_butiran,
            'jadual' => $jadual
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
     * @param  \App\Http\Requests\StorePerbelanjaanKursusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePerbelanjaanKursusRequest $request)
    {
        $perbelanjaanKursus = new PerbelanjaanKursus($request->all());
        $perbelanjaanKursus->save();

        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/perbelanjaan/perbelanjaan-kursus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerbelanjaanKursus  $perbelanjaanKursus
     * @return \Illuminate\Http\Response
     */
    public function show(PerbelanjaanKursus $perbelanjaanKursus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerbelanjaanKursus  $perbelanjaanKursus
     * @return \Illuminate\Http\Response
     */
    public function edit($perbelanjaanKursus)
    {
        $rafis_check = PerbelanjaanKursus::find($perbelanjaanKursus);
        $rafis = Http::withBasicAuth('fc63259e09f9a60b2b793fbe5aa05dde9a47be11', '6b283bb060c269432d08ac33b47a337c0a40035d')
            ->get('https://www4.risda.gov.my/rafis/senaraipesanan/?tahun=' . $rafis_check->ThnKew . '&kod_PA=' . $rafis_check->Kod_PA . '&kod_obj=' . $rafis_check->Kod_Obj)
            ->getBody()
            ->getContents();
        $rafis = json_decode($rafis, true);
        foreach ($rafis as $key => $r) {
            if ($r['No_Pesanan'] == $rafis_check->No_Pesanan) {
                $rafis_butiran = $r;
            }
        }

        $check = Auth::user()->jenis_pengguna;
        if (str_contains($check, 'ULS')) {
            $jadual = JadualKursus::where('kursus_unit_latihan', 'Staf')->get();
        } elseif (str_contains($check, 'ULPK')) {
            $jadual = JadualKursus::where('kursus_unit_latihan', 'Pekebun Kecil')->get();
        } else{
            $jadual = JadualKursus::all();
        }
        return view('perbelanjaan.kursus.edit', [
            'rafis' => $rafis_butiran,
            'rafis_risda' => $rafis_check,
            'jadual' => $jadual
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePerbelanjaanKursusRequest  $request
     * @param  \App\Models\PerbelanjaanKursus  $perbelanjaanKursus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePerbelanjaanKursusRequest $request,  $id)
    {
        $perbelanjaanKursus = PerbelanjaanKursus::find($id);
        $input = $request->all();
        $perbelanjaanKursus->fill($input)->save();

        alert()->success('Maklumat telah dikemaskini', 'Berjaya');
        return redirect('/perbelanjaan/perbelanjaan-kursus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerbelanjaanKursus  $perbelanjaanKursus
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerbelanjaanKursus $perbelanjaanKursus)
    {
        //
    }
}
