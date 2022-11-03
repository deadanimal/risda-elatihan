<?php

namespace App\Http\Controllers;

use App\Models\Aturcara;
use App\Models\Dashboard;
use App\Models\JadualKursus;
use App\Models\Kehadiran;
use App\Models\Permohonan;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $kursus_bulan_lalu = JadualKursus::whereMonth('tarikh_mula', $hari_ini - 1)->whereYear('tarikh_mula', $tahun_ini)->get();
        $kursus_bulan_depan = JadualKursus::whereMonth('tarikh_mula', $hari_ini + 1)->whereYear('tarikh_mula', $tahun_ini)->get();
        $permohonan_tahun_ini = Permohonan::whereYear('created_at', $tahun_ini)->get();

        $jadual_uls = JadualKursus::with('tempat')->whereYear('tarikh_mula', $tahun_ini)->where('kursus_unit_latihan', 'Staf')->orderBy('tarikh_mula', 'asc')->get();
        $jadual_ulpk = JadualKursus::with('tempat')->where('kursus_unit_latihan', 'Pekebun Kecil')->orderBy('tarikh_mula', 'asc')->whereYear('tarikh_mula', $tahun_ini)->get();
        $jadual_admin = JadualKursus::with('tempat')->whereYear('tarikh_mula', $tahun_ini)->orderBy('tarikh_mula', 'asc')->get();

        $kehadiran = Kehadiran::where('tarikh_imbasQR', '!=', null)->get()->groupBy('no_pekerja');
        $s = 0;
        $pk = 0;

        // dd($kehadiran);
        // foreach ($kehadiran as $key => $k) {
        //     $check = Str::contains($k->kod_kursus, 'PK');
        //     if ($check) {
        //         $pk++;
        //     } else {
        //         $s++;
        //     }
        // }

        foreach ($kehadiran as $a => $peserta) {
            // dd($peserta);
            $check_pengguna = User::where('id', $a)->first();
            if ($check_pengguna != null) {
                $jenis = $check_pengguna->jenis_pengguna;
                if ($jenis == 'Peserta ULPK') {
                    foreach ($peserta as $key => $j) {
                        // dd($peserta);
                        $group_jadual = $peserta->groupBy('kod_kursus');
                        foreach ($group_jadual as $ab => $gj) {
                            $bil_kehadiran = count($gj);
                            $jadual = Aturcara::where('ac_jadual_kursus', $j->jadual_kursus_id)->get();
                            $bil_sesi = count($jadual);
                            $peratus = $bil_kehadiran / $bil_sesi * 100;
                            if ($peratus >= 50) {
                                $pk++;
                            }
                        }
                    }
                    // dd($pk);
                } else {
                    $bil_kehadiran = count($peserta->groupBy('kod_kursus'));
                    if ($bil_kehadiran >= 1) {
                        $s++;
                    }
                }
            }

            // foreach ($peserta as $b => $ac) {
            //     $num_sesi = Aturcara::where('ac_jadual_kursus', $ac->jadual_kursus_id)->get();
            //     $num_sesi = count($num_sesi);

            // }
        }
        $pelawat = Dashboard::where('status', 'masuk')->get();
        // dd($kehadiran_staf);


        $jp = Auth::user()->jenis_pengguna;
        if (str_contains($jp, 'ULPK')) {
            $jpermohonan = 1;
        }
        elseif (str_contains($jp, 'Ejen')) {
            $jpermohonan = 1;
        }
        else {
            $jpermohonan = 0;
        }
        

        return view('dashboard', [
            'bulan_ini' => count($kursus_bulan_ini),
            'bulan_lalu' => count($kursus_bulan_lalu),
            'bulan_depan' => count($kursus_bulan_depan),
            'permohonan_tahun_ini' => count($permohonan_tahun_ini),
            'kehadiran_pk' => $pk,
            'kehadiran_staf' => $s,
            'jumlah_pelawat' => count($pelawat),
            'jadual_uls' => $jadual_uls,
            'jadual_ulpk' => $jadual_ulpk,
            'jadual' => $jadual_admin,
            'jperm' => $jpermohonan
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

    public function jadual_tahunan()
    {
        return view('dashboard_item.jadual_tahunan', [
            'jadual' => JadualKursus::with('tempat')->orderBy('tarikh_mula', 'desc')->get()
        ]);
    }

    public function filter()
    {
        $tahun = $_GET['tahun'];
        $tahun = JadualKursus::with('tempat')->whereYear('tarikh_mula', $tahun)->orderBy('tarikh_mula', 'desc')->get();
        return response()->json($tahun);
    }
}
