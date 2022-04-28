<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\JadualKursus;
use App\Models\Kehadiran;
use App\Models\Permohonan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hari_ini = date('m');
        $tahun_ini = date('Y');
        $kursus_bulan_ini = JadualKursus::whereMonth('tarikh_mula', $hari_ini)->whereYear('tarikh_mula', $tahun_ini)->get();
        $kursus_bulan_lalu = JadualKursus::whereMonth('tarikh_mula', $hari_ini-1)->whereYear('tarikh_mula', $tahun_ini)->get();
        $kursus_bulan_depan = JadualKursus::whereMonth('tarikh_mula', $hari_ini+1)->whereYear('tarikh_mula', $tahun_ini)->get();
        $permohonan_tahun_ini = Permohonan::whereYear('created_at', $tahun_ini)->get();
        
        $kehadiran = Kehadiran::where('tarikh_imbasQR', '!=', null)->get();
        $s = 0;
        $pk = 0;
        foreach ($kehadiran as $key => $k) {
            $check = Str::contains($k->kod_kursus, 'PK');
            if ($check) {
                $pk++;
            } else {
                $s++;
            }
        }

        $pelawat = Dashboard::where('status', 'masuk')->get();
        // dd($kehadiran_staf);

        return view('dashboard',[
            'bulan_ini' => count($kursus_bulan_ini),
            'bulan_lalu' => count($kursus_bulan_lalu),
            'bulan_depan' => count($kursus_bulan_depan),
            'permohonan_tahun_ini' => count($permohonan_tahun_ini),
            'kehadiran_pk' => $pk,
            'kehadiran_staf' => $s,
            'jumlah_pelawat' => count($pelawat),
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
