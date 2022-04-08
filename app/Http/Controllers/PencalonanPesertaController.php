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
        // tukar
        // if (Auth::user()->jenis_pengguna == 'Urus Setia ULS') {
        //     $jadual = JadualKursus::with(['tempat', 'status_pelaksanaan'])->where('kursus_unit_latihan', 'Staf')->get();
        // } elseif (Auth::user()->jenis_pengguna == 'Urus Setia ULPK') {
        //     $jadual = JadualKursus::with(['tempat', 'status_pelaksanaan'])->where('kursus_unit_latihan', 'Pekebun Kecil')->get();
        // } else {
        //     $jadual = JadualKursus::with(['tempat', 'status_pelaksanaan'])->get();
        // }
        // return view('pengurusan_peserta.pencalonan.index', [
        //     'jadual' => $jadual,
        // ]);

        if (Auth::user()->jenis_pengguna == 'Urus Setia ULS') {
            $jadual = JadualKursus::with(['tempat', 'status_pelaksanaan'])->get();
        } elseif (Auth::user()->jenis_pengguna == 'Urus Setia ULPK') {
            $jadual = JadualKursus::with(['tempat', 'status_pelaksanaan'])->get();
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
        // dd($request->all());
        foreach ($request->peserta as $key => $peserta) {
            $pencalonan = new Permohonan;
            $pencalonan->no_pekerja = $request->peserta[$key];
            $pencalonan->kod_kursus = $request->jadual;
            // $pencalonan->dicalon_oleh = Auth::id();
            $pencalonan->status_permohonan = '6';
            $pencalonan->save();
        }
        alert()->success('Peserta telah dicalonkan.', ' Berjaya');
        return redirect('/pengurusan_peserta/pencalonan/' . $request->jadual);
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
        if ($jadual->kursus_unit_latihan == 'Staf') {
            $peserta_daftar = Permohonan::with(['kehadiran', 'jadual', 'peserta'])->where('kod_kursus', $id)->get();
            // dd($peserta_daftar->isNotEmpty());
            $data_staf = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', 'f9d00dae5c6d6d549c306bae6e88222eb2f84307')
                ->get('https://www4.risda.gov.my/fire/getallstaff/')
                ->getBody()
                ->getContents();

            $data_staf = json_decode($data_staf, true);

            if ($peserta_daftar->isNotEmpty()) {
                foreach ($peserta_daftar as $key => $p) {
                    foreach ($data_staf as $a => $staf) {
                        if ($p->peserta != null) {
                            if ($p->peserta->no_KP == $staf['nokp']) {
                                $p['pusat_tanggungjawab'] = $staf['NamaPT'];
                                $p['gred'] = $staf['Gred'];
                            }
                        }
                    }
                }
            }

            return view('pengurusan_peserta.pencalonan.show', [
                'peserta_daftar' => $peserta_daftar,
                'jadual' => $jadual
            ]);
        } elseif ($jadual->kursus_unit_latihan == 'Pekebun Kecil') {
            $peserta_daftar = Permohonan::with(['kehadiran', 'jadual', 'peserta'])->where('kod_kursus', $id)->get();
            foreach ($peserta_daftar as $b => $pk) {
                $data_pk = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', '1cc11a9fec81dc1f99f353f403d6f5bac620aa8f')
                    ->get('https://www4.risda.gov.my/espek/portalpkprofiltanah/?nokp=' . $pk->peserta->no_KP)
                    ->getBody()
                    ->getContents();
                $data_pk = json_decode($data_pk, true);
                try {
                    $data_pk = $data_pk[0];
                    $pk['alamat'] = $data_pk['Nombor'] . ', ' . $data_pk['Jalan'] . ', ' . $data_pk['Nama_Kampung'] . ', ' . $data_pk['Poskod'] . ' ' . $data_pk['Bandar'] . ', ' . $data_pk['Negeri'];
                } catch (\Throwable $th) {
                    $pk['alamat'] = 'No. Kad Pengenalan tiada dalam e-SPEK Pekebun Kecil';
                }
            }

            return view('pengurusan_peserta.pencalonan.show_ulpk', [
                'peserta_daftar' => $peserta_daftar,
                'jadual' => $jadual
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PencalonanPeserta  $pencalonanPeserta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $check = JadualKursus::find($id);
        if ($check->kursus_unit_latihan == 'Staf') {
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
                // dd($pencalonan);
                foreach ($pencalonan as $key => $pen) {
                    $hari = $hari + ($pen->jadualKursus->bilangan_hari);
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
            return view('pengurusan_peserta.pencalonan.peserta_uls', [
                'list_staf' => $data_staf,
                'id' => $id
            ]);
        } elseif ($check->kursus_unit_latihan == 'Pekebun Kecil') {
            $user_pk = User::where('jenis_pengguna', 'Peserta ULPK')->get();

            foreach ($user_pk as $b => $pk) {
                $hari = 0;

                // bilangan hari kursus
                $tahun = date('Y');
                $kursus = Permohonan::where('no_pekerja', $pk->id)->whereYear('created_at', $tahun)->get();

                foreach ($kursus as $key => $k) {
                    $hari = $hari + ($k->jadual->bilangan_hari);
                }

                $pencalonan = PencalonanPeserta::with('jadualKursus')->where('peserta', $pk->id)->whereYear('created_at', $tahun)->get();
                // dd($pencalonan);
                foreach ($pencalonan as $key => $pen) {
                    $hari = $hari + ($pen->jadualKursus->bilangan_hari);
                }

                $pk['hari_berkursus'] = $hari;

                // catatan
                $tarikh_jadual = JadualKursus::find($id)->tarikh_mula;
                $tarikh_jadual_8 = date('Y-m-d', strtotime($tarikh_jadual . ' - 8 days'));
                $tarikh_latest_permohonan = date('d-m-Y', 0);
                $tarikh_latest_pencalonan = date('d-m-Y', 0);

                $permohonan_latest = Permohonan::where('no_pekerja', $pk->id)->get();
                foreach ($permohonan_latest as $key => $perm) {
                    $jadual_permohonan = JadualKursus::find($perm->kod_kursus)->tarikh_tamat;
                    if ($jadual_permohonan > $tarikh_latest_permohonan) {
                        $tarikh_latest_permohonan = $jadual_permohonan;
                    }
                }
                $pencalonan_latest = PencalonanPeserta::where('peserta', $pk->id)->get();
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
                    $pk['catatan'] = 'Calon kursus lain';
                } else {
                    if (date('Y-m-d', strtotime($tarikh_latest . ' + 8 days')) >= $tarikh_jadual) {
                        $pk['catatan'] = 'Kursus yang dipohon kurang dari 8 hari selepas tarikh tamat kursus yang terkini';
                    } else {
                        $pk['catatan'] = '-';
                    }
                }

                $data_pk = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', '1cc11a9fec81dc1f99f353f403d6f5bac620aa8f')
                    ->get('https://www4.risda.gov.my/espek/portalpkprofiltanah/?nokp=' . $pk->no_KP)
                    ->getBody()
                    ->getContents();
                $data_pk = json_decode($data_pk, true);
                try {
                    $data_pk = $data_pk[0];
                    $pk['alamat'] = $data_pk['Nombor'] . ', ' . $data_pk['Jalan'] . ', ' . $data_pk['Nama_Kampung'] . ', ' . $data_pk['Poskod'] . ' ' . $data_pk['Bandar'] . ', ' . $data_pk['Negeri'];
                } catch (\Throwable $th) {
                    $pk['alamat'] = 'No. Kad Pengenalan tiada dalam e-SPEK Pekebun Kecil';
                }
            }

            return view('pengurusan_peserta.pencalonan.peserta_ulpk', [
                'list_pk' => $user_pk,
                'id' => $id
            ]);
        }
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
        $pencalonan = Permohonan::find($id_pencalonan);
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

        $check = JadualKursus::find($id);

        if ($check->kursus_unit_latihan == 'Staf') {
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

            $sejarah_permohonan = Permohonan::with('jadual')->where('no_pekerja', $id_peserta)->get();
            foreach ($sejarah_permohonan as $sp) {
                foreach ($sp->kehadiran as $kh) {
                    // dd($kh);
                    $kh->aturcara = Aturcara::where('id', $kh->jadual_kursus_ref)->first();
                    $kh->aturcara->ac_hari = (int)$kh->aturcara->ac_hari;
                    $kh->aturcara->ac_hari = $kh->aturcara->ac_hari - 1;
                }
            }

            $sejarah_pencalonan = PencalonanPeserta::with(['kehadiran', 'jadualKursus', 'maklumat_peserta'])->where('peserta', $id_peserta)->get();
            foreach ($sejarah_pencalonan as $sc) {
                if ($sc->kehadiran != null) {
                    foreach ($sc->kehadiran as $ch) {
                        // dd($ch);
                        $ch->aturcara = Aturcara::where('id', $ch->jadual_kursus_ref)->first();
                        $ch->aturcara->ac_hari = (int)$ch->aturcara->ac_hari;
                        $ch->aturcara->ac_hari = $ch->aturcara->ac_hari - 1;
                    }
                }
            }

            return view('pengurusan_peserta.pencalonan.maklumat_peserta_uls', [
                'peserta' => $peserta,
                'jadual' => $jadual,
                'sejarah_permohonan' => $sejarah_permohonan,
                'sejarah_pencalonan' => $sejarah_pencalonan,
                'date' => $date,
                'hari' => $hari
            ]);
        } elseif ($check->kursus_unit_latihan == 'Pekebun Kecil') {

            $ic = User::findOrFail($id_peserta)->no_KP;
            $data_pk = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', '1cc11a9fec81dc1f99f353f403d6f5bac620aa8f')
                ->get('https://www4.risda.gov.my/espek/portalpkprofiltanah/?nokp=' . $ic)
                ->getBody()
                ->getContents();
            $data_pk = json_decode($data_pk, true);
            $pk = $data_pk[0];
            $pk['alamat'] = $pk['Nombor'] . ', ' . $pk['Jalan'] . ', ' . $pk['Nama_Kampung'] . ', ' . $pk['Poskod'] . ' ' . $pk['Bandar'] . ', ' . $pk['Negeri'];

            $jadual = JadualKursus::find($id);
            $hari = ['Pertama', 'Kedua', 'Ketiga', 'Keempat', 'Kelima', 'Keenam'];
            $date = displayDates($jadual->tarikh_mula, $jadual->tarikh_tamat);

            $sejarah_permohonan = Permohonan::with('jadual')->where('no_pekerja', $id_peserta)->get();
            foreach ($sejarah_permohonan as $sp) {
                foreach ($sp->kehadiran as $kh) {
                    $kh->aturcara = Aturcara::where('id', $kh->jadual_kursus_ref)->first();
                    $kh->aturcara->ac_hari = (int)$kh->aturcara->ac_hari;
                    $kh->aturcara->ac_hari = $kh->aturcara->ac_hari - 1;
                }
            }

            $sejarah_pencalonan = PencalonanPeserta::with(['kehadiran', 'jadualKursus', 'maklumat_peserta'])->where('peserta', $id_peserta)->get();
            foreach ($sejarah_pencalonan as $sc) {
                if ($sc->kehadiran != null) {
                    foreach ($sc->kehadiran as $ch) {
                        // dd($ch);
                        $ch->aturcara = Aturcara::where('id', $ch->jadual_kursus_ref)->first();
                        $ch->aturcara->ac_hari = (int)$ch->aturcara->ac_hari;
                        $ch->aturcara->ac_hari = $ch->aturcara->ac_hari - 1;
                    }
                }
            }

            return view('pengurusan_peserta.pencalonan.maklumat_peserta_ulpk', [
                'peserta' => $pk,
                'jadual' => $jadual,
                'sejarah_permohonan' => $sejarah_permohonan,
                'sejarah_pencalonan' => $sejarah_pencalonan,
                'date' => $date,
                'hari' => $hari
            ]);
        }
    }
}
