<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePerbelanjaanPelajarPraktikalRequest;
use App\Http\Requests\UpdatePerbelanjaanPelajarPraktikalRequest;
use App\Models\Objek;
use App\Models\PelajarPraktikal;
use App\Models\PerbelanjaanPelajarPraktikal;
use App\Models\PusatTanggungjawab;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PerbelanjaanPelajarPraktikalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $check = Auth::user()->jenis_pengguna;
        if (str_contains($check, 'ULPK')) {
            alert()->info('Perbelanjaan Pelajar Praktikal hanya untuk unit latihan Staf sahaja.');
        } else {
            return view('perbelanjaan.pelajar_praktikal.main', [
                'pusat_tanggungjawab' => PusatTanggungjawab::all(),
                'objek' => Objek::all(),
            ]);
        }
        
    }

    public function carian(StorePerbelanjaanPelajarPraktikalRequest $request)
    {
        $tahun_semasa = date('Y');
        $rafis = Http::withBasicAuth('fc63259e09f9a60b2b793fbe5aa05dde9a47be11', '6b283bb060c269432d08ac33b47a337c0a40035d')
            ->get('https://www4.risda.gov.my/rafis/pelajarpraktikal/?tahun=' . $tahun_semasa)
            ->getBody()
            ->getContents();
        $rafis = json_decode($rafis, true);

        $rafis_pt = [];
        foreach ($rafis as $key => $r) {
            if ($r['Kod_PT'] == $request->kod_pt) {
                if ($r['Kod_PA'] == $request->Kod_PA) {
                    if ($r['Kod_Objek'] == $request->kod_objek) {
                        array_push($rafis_pt, $r);
                    }
                }
            }
        }

        return view('perbelanjaan.pelajar_praktikal.index', [
            'rafis' => $rafis_pt,
        ]);
    }

    public function butiran_rekod($tahun, $kod_pa, $kod_objek, $no_dbil)
    {
        $semak = PerbelanjaanPelajarPraktikal::where('No_DBil', $no_dbil)->first();
        if ($semak != null) {
            return redirect('/perbelanjaan/pelajar-praktikal/' . $semak->id . '/edit');
        }
        $rafis = Http::withBasicAuth('fc63259e09f9a60b2b793fbe5aa05dde9a47be11', '6b283bb060c269432d08ac33b47a337c0a40035d')
            ->get('https://www4.risda.gov.my/rafis/pelajarpraktikal/?tahun=' . $tahun)
            ->getBody()
            ->getContents();
        $rafis = json_decode($rafis, true);
        foreach ($rafis as $key => $r) {
            if ($r['No_DBil'] == $no_dbil) {
                $rafis_butiran = $r;
            }
        }

        $check = Auth::user()->jenis_pengguna;
        if (str_contains($check, 'ULPK')) {
            alert()->info('Perbelanjaan Pelajar Praktikal hanya untuk unit latihan Staf sahaja.');
        } else {
            $pelajar = PelajarPraktikal::all();
        }

        return view('perbelanjaan.pelajar_praktikal.create', [
            'rafis' => $rafis_butiran,
            'pelajar' => $pelajar
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
     * @param  \App\Http\Requests\StorePerbelanjaanPelajarPraktikalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePerbelanjaanPelajarPraktikalRequest $request)
    {
        $perbelanjaanPelajarPraktikal = new PerbelanjaanPelajarPraktikal($request->all());
        $perbelanjaanPelajarPraktikal->save();

        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/perbelanjaan/pelajar-praktikal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerbelanjaanPelajarPraktikal  $perbelanjaanPelajarPraktikal
     * @return \Illuminate\Http\Response
     */
    public function show(PerbelanjaanPelajarPraktikal $perbelanjaanPelajarPraktikal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerbelanjaanPelajarPraktikal  $perbelanjaanPelajarPraktikal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rafis_check = PerbelanjaanPelajarPraktikal::find($id);
        $rafis = Http::withBasicAuth('fc63259e09f9a60b2b793fbe5aa05dde9a47be11', '6b283bb060c269432d08ac33b47a337c0a40035d')
            ->get('https://www4.risda.gov.my/rafis/pelajarpraktikal/?tahun=' . $rafis_check->ThnKew)
            ->getBody()
            ->getContents();
        $rafis = json_decode($rafis, true);
        foreach ($rafis as $key => $r) {
            if ($r['No_DBil'] == $rafis_check->No_DBil) {
                $rafis_butiran = $r;
            }
        }

        $check = Auth::user()->jenis_pengguna;
        if (str_contains($check, 'ULPK')) {
            alert()->info('Perbelanjaan Pelajar Praktikal hanya untuk unit latihan Staf sahaja.');
        } else {
            $pelajar = PelajarPraktikal::all();
        }

        return view('perbelanjaan.pelajar_praktikal.edit', [
            'rafis' => $rafis_butiran,
            'rafis_risda' => $rafis_check,
            'pelajar' => $pelajar
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePerbelanjaanPelajarPraktikalRequest  $request
     * @param  \App\Models\PerbelanjaanPelajarPraktikal  $perbelanjaanPelajarPraktikal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePerbelanjaanPelajarPraktikalRequest $request, $id)
    {
        $perbelanjaanPelajarPraktikal = PerbelanjaanPelajarPraktikal::find($id);
        $input = $request->all();
        $perbelanjaanPelajarPraktikal->fill($input)->save();

        alert()->success('Maklumat telah dikemaskini', 'Berjaya');
        return redirect('/perbelanjaan/pelajar-praktikal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerbelanjaanPelajarPraktikal  $perbelanjaanPelajarPraktikal
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerbelanjaanPelajarPraktikal $perbelanjaanPelajarPraktikal)
    {
        //
    }
}
