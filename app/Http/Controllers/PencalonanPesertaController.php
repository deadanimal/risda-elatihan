<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePencalonanPesertaRequest;
use App\Http\Requests\UpdatePencalonanPesertaRequest;
use App\Models\Aturcara;
use App\Models\JadualKursus;
use App\Models\Kehadiran;
use App\Models\PencalonanPeserta;
use App\Models\Permohonan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PencalonanPesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->jenis_pengguna == 'Urus Setia ULS') {
            $jadual = JadualKursus::with(['tempat', 'status_pelaksanaan'])->where('kursus_unit_latihan', 'Staf')->get();
        } elseif (Auth::user()->jenis_pengguna == 'Urus Setia ULPK') {
            $jadual = JadualKursus::with(['tempat', 'status_pelaksanaan'])->where('kursus_unit_latihan', 'Pekebun Kecil')->get();
        } else {
            $jadual = JadualKursus::with(['tempat', 'status_pelaksanaan'])->get();
        }
        return view('pengurusan_peserta.pencalonan.index', [
            'jadual' => $jadual,
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
     * @param  \App\Http\Requests\StorePencalonanPesertaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePencalonanPesertaRequest $request)
    {
        // dd($request);
        $pencalonan = new PencalonanPeserta($request->all());
        $pencalonan->dicalon_oleh = Auth::id();
        $pencalonan->status = 'Lulus';
        $pencalonan->save();
        alert()->success('Maklumat telah disimpan.', ' Berjaya');
        return redirect('/pengurusan_peserta/pencalonan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PencalonanPeserta  $pencalonanPeserta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadual = JadualKursus::find($id);
        $peserta_daftar = PencalonanPeserta::where('jadual', $id)->get();
// dd($peserta_daftar->isNotEmpty());
        $data_staf = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', 'f9d00dae5c6d6d549c306bae6e88222eb2f84307')
            ->get('https://www4.risda.gov.my/fire/getallstaff/')
            ->getBody()
            ->getContents();

        $data_staf = json_decode($data_staf, true);

        if ($peserta_daftar->isNotEmpty()) {
            foreach ($peserta_daftar as $key => $p) {
                foreach ($data_staf as $a => $staf) {
                    if ($p->maklumat_peserta->no_KP == $staf['nokp']) {
                        $p['pusat_tanggungjawab'] = $staf['NamaPT'];
                        $p['gred'] = $staf['Gred'];
                    }
                }
            }
        }
        
        
        // dd($peserta_daftar->first()->maklumat_peserta);
        return view('pengurusan_peserta.pencalonan.show', [
            'peserta_daftar' => $peserta_daftar,
            'jadual' => $jadual
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PencalonanPeserta  $pencalonanPeserta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_staf = User::where('jenis_pengguna', 'Peserta ULS')->get();

        $espek = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', 'f9d00dae5c6d6d549c306bae6e88222eb2f84307')
            ->get('https://www4.risda.gov.my/fire/getallstaff/')
            ->getBody()
            ->getContents();

        $espek = json_decode($espek, true);

        foreach ($data_staf as $a => $ds) {

            $hari = 0;

            // bilangan hari kursus
            $tahun = date('Y');
            $kursus = Permohonan::where('no_pekerja', $ds->id)->whereYear('created_at', $tahun)->get();

            foreach ($kursus as $key => $k) {
                $hari = $hari + ($k->jadual->bilangan_hari);
            }

            $pencalonan = PencalonanPeserta::where('peserta', $ds->id)->whereYear('created_at', $tahun)->get();
            foreach ($pencalonan as $key => $pen) {
                $hari = $hari + ($pen->jadual->bilangan_hari);
            }

            $ds['hari_berkursus'] = $hari;

            // catatan
            $tarikh_jadual = JadualKursus::find($id)->tarikh_mula;
            $tarikh_jadual_8 = date('Y-m-d', strtotime($tarikh_jadual . ' - 8 days'));
            $tarikh_latest_permohonan = date('d-m-Y', 0);
            $tarikh_latest_pencalonan = date('d-m-Y', 0);

            $permohonan_latest = Permohonan::where('no_pekerja', $ds->id)->get();
            foreach ($permohonan_latest as $key => $perm) {
                $jadual_permohonan = JadualKursus::find($perm->kod_kursus)->tarikh_tamat;
                if ($jadual_permohonan > $tarikh_latest_permohonan) {
                    $tarikh_latest_permohonan = $jadual_permohonan;
                }
            }
            $pencalonan_latest = PencalonanPeserta::where('peserta', $ds->id)->get();
            foreach ($pencalonan_latest as $key => $plate) {
                $jadual_pencalonan = JadualKursus::find($plate->jadual)->tarikh_tamat;
                if ($jadual_pencalonan > $tarikh_latest_pencalonan) {
                    $tarikh_latest_pencalonan = $jadual_pencalonan;
                }
            }

            if ($tarikh_latest_pencalonan > $tarikh_latest_permohonan) {
                $tarikh_latest = $tarikh_latest_pencalonan;
            } else {
                $tarikh_latest = $tarikh_latest_permohonan;
            }

            if ($tarikh_latest > $tarikh_jadual) {
                $ds['catatan'] = 'Calon kursus lain';
            } else {
                if (date('Y-m-d', strtotime($tarikh_latest . ' + 8 days')) >= $tarikh_jadual) {
                    $ds['catatan'] = 'Kursus yang dipohon kurang dari 8 hari selepas tarikh tamat kursus yang terkini';
                } else {
                    $ds['catatan'] = '-';
                }
            }

            foreach ($espek as $k => $ep) {
                if ($ep['nokp'] == $ds->no_KP) {
                    $ds['NamaPT'] = $ep['NamaPT'];
                    $ds['Gred'] = $ep['Gred'];
                }
            }
        }
        return view('pengurusan_peserta.pencalonan.peserta', [
            'list_staf' => $data_staf,
            'id' => $id
        ]);
        // $peserta = User::where('jenis_pengguna', 'Peserta ULS')->get();

        // foreach ($peserta as $key => $p) {
        //     $hari = 0;
        //     // e-spek
        //     $data_staf = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', 'f9d00dae5c6d6d549c306bae6e88222eb2f84307')
        //         ->get('https://www4.risda.gov.my/fire/getallstaff/')
        //         ->getBody()
        //         ->getContents();

        //     $data_staf = json_decode($data_staf, true);
        //     foreach ($data_staf as $key => $staf) {
        //         if ($p->no_KP == $staf['nokp']) {
        //             $p['pusat_tanggungjawab'] = $staf['NamaPT'];
        //             $p['gred'] = $staf['Gred'];
        //         }
        //     }

        //     // bilangan hari kursus
        //     $tahun = date('Y');
        //     $kursus = Permohonan::where('no_pekerja', $p->id)->whereYear('created_at', $tahun)->get();
        //     // dd($kursus);
        //     foreach ($kursus as $key => $k) {
        //         $hari = $hari+($k->jadualKursus->bilangan_hari);
        //     }
        //     $pencalonan = PencalonanPeserta::where('peserta', $p->id)->whereYear('created_at', $tahun)->get();
        //     foreach ($pencalonan as $key => $pen) {
        //         $hari = $hari+($pen->jadualKursus->bilangan_hari);
        //     }
        //     // $kursus_hari = Kehadiran::where('no_pekerja', $p->id)->whereYear('created_at', $tahun)->get();
        //     // $hari = count($kursus_hari);
        //     $p['hari_berkursus'] = $hari;

        //     // catatan
        //     $tarikh_jadual = JadualKursus::find($id)->tarikh_mula;
        //     $tarikh_jadual_8 = date('Y-m-d', strtotime($tarikh_jadual. ' - 8 days')); 
        //     $tarikh_latest_permohonan = date('d-m-Y', 0);
        //     $tarikh_latest_pencalonan = date('d-m-Y', 0);

        //     $permohonan_latest = Permohonan::where('no_pekerja', $p->id)->get();
        //     foreach ($permohonan_latest as $key => $perm) {
        //         $jadual_permohonan = JadualKursus::find($perm->kod_kursus)->tarikh_tamat;
        //         if ($jadual_permohonan > $tarikh_latest_permohonan) {
        //             $tarikh_latest_permohonan = $jadual_permohonan;
        //         }
        //     }
        //     $pencalonan_latest = PencalonanPeserta::where('peserta', $p->id)->get();
        //     foreach ($pencalonan_latest as $key => $plate) {
        //         $jadual_pencalonan = JadualKursus::find($plate->jadual)->tarikh_tamat;
        //         if ($jadual_pencalonan > $tarikh_latest_pencalonan) {
        //             $tarikh_latest_pencalonan = $jadual_pencalonan;
        //         }
        //     }

        //     if ($tarikh_latest_pencalonan > $tarikh_latest_permohonan) {
        //         $tarikh_latest = $tarikh_latest_pencalonan;
        //     } else {
        //         $tarikh_latest = $tarikh_latest_permohonan;
        //     }

        //     if ( $tarikh_latest > $tarikh_jadual ) {
        //         $p['catatan'] = 'Calon kursus lain';
        //     } else {
        //         if (date('Y-m-d', strtotime($tarikh_latest. ' + 8 days')) >= $tarikh_jadual) {
        //             $p['catatan'] = 'Kursus yang dipohon kurang dari 8 hari selepas tarikh tamat kursus yang terkini';
        //         } else {
        //             $p['catatan'] = '-';
        //         }

        //     }
        // }
        // dd($peserta);
        // return view('pengurusan_peserta.pencalonan.peserta', [
        //     'id' => $id,
        //     'peserta' => $peserta,
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePencalonanPesertaRequest  $request
     * @param  \App\Models\PencalonanPeserta  $pencalonanPeserta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePencalonanPesertaRequest $request, PencalonanPeserta $pencalonanPeserta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PencalonanPeserta  $pencalonanPeserta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pencalonan)
    {
        $pencalonan = PencalonanPeserta::find($id_pencalonan);
        $pencalonan->delete();

        alert()->success('Pencalonan telah dihapus.', 'Berjaya');
        return back();
        // return redirect('/pengurusan_peserta/pencalonan');
    }

    public function maklumat_peserta($id, $id_peserta)
    {

        function displayDates($date1, $date2, $format = 'Y-m-d')
        {
            $dates = array();
            $current = strtotime($date1);
            $date2 = strtotime($date2);
            $stepVal = '+1 day';
            while ($current <= $date2) {
                $dates[] = date($format, $current);
                $current = strtotime($stepVal, $current);
            }
            return $dates;
        }
        $ic = User::findOrFail($id_peserta)->no_KP;
        $data_staf = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', 'f9d00dae5c6d6d549c306bae6e88222eb2f84307')
            ->get('https://www4.risda.gov.my/fire/getallstaff/')
            ->getBody()
            ->getContents();

        $data_staf = json_decode($data_staf, true);
        foreach ($data_staf as $key => $staf) {
            if ($ic == $staf['nokp']) {
                $peserta = $staf;
            }
        }

        $jadual = JadualKursus::find($id);
        $hari = ['Pertama', 'Kedua', 'Ketiga', 'Keempat', 'Kelima', 'Keenam'];
        $date = displayDates($jadual->tarikh_mula, $jadual->tarikh_tamat);
        // dd($date);

        $sejarah_permohonan = Permohonan::where('no_pekerja', $id_peserta)->get();

        foreach ($sejarah_permohonan as $sp) {
            foreach ($sp->kehadiran as $kh) {
                // dd($kh);
                $kh->aturcara = Aturcara::where('id', $kh->jadual_kursus_ref)->first();
                $kh->aturcara->ac_hari = (int)$kh->aturcara->ac_hari;
                $kh->aturcara->ac_hari = $kh->aturcara->ac_hari - 1;
            }
        }



        // dd($sejarah_permohonan);
        return view('pengurusan_peserta.pencalonan.maklumat_peserta', [
            'peserta' => $peserta,
            'jadual' => $jadual,
            'sejarah_permohonan' => $sejarah_permohonan,
            'date' => $date,
            'hari' => $hari
        ]);
    }
}
