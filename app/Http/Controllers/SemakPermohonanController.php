<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSemakPermohonanRequest;
use App\Http\Requests\UpdateSemakPermohonanRequest;
use App\Mail\PermohonanLulus;
use App\Models\Agensi;
use App\Models\JadualKursus;
use App\Models\KategoriAgensi;
use App\Models\PekebunKecil;
use App\Models\Permohonan;
use App\Models\SemakPermohonan;
use App\Models\Staf;
use App\Models\Tanah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class SemakPermohonanController extends Controller
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
        $check = Auth::user()->jenis_pengguna;

        // $pemohon = Permohonan::with(['jadual', 'peserta', 'data_staf', 'data_pk'])->get();
        $kategori = KategoriAgensi::where('Kategori_Agensi', 'Tempat Kursus')->first()->id;
        $tempat = Agensi::with('kategori')->where('kategori_agensi', $kategori)->get();

        if (str_contains($check, 'ULS')) {
            if (str_contains($check, 'Penyokong')) {
                $jadual = JadualKursus::where('kursus_unit_latihan','Staf')->get();
                $pemohon = Permohonan::with(['jadual', 'peserta', 'data_staf'])->where('status_permohonan', '!=', '0')->get();
            }
            foreach ($pemohon as $key => $p) {
                if ($p->peserta == null) {
                    $p->delete();
                }
                if ($p->data_staf == null) {
                    $p->delete();
                }
            }

            return view('permohonan_kursus.semakan_permohonan.uls.index', [
                'pemohon' => $pemohon,
                'tempat' => $tempat
            ]);
        } elseif (str_contains($check, 'ULPK')) {
        $pemohon = Permohonan::with(['jadual', 'peserta','data_pk'])->get();

            $pekebun_kecil = [];
            foreach ($pemohon as $key => $p) {
                if ($p->peserta == null) {
                    $p->delete();
                }
                if ($p->data_pk != null) {
                    array_push($pekebun_kecil, $p);
                }
            }
            // dd($pekebun_kecil);
            return view('permohonan_kursus.semakan_permohonan.ulpk.index', [
                'pemohon' => $pekebun_kecil,
                'tempat' => $tempat
            ]);
        } else {
        $pemohon = Permohonan::with(['jadual', 'peserta', 'data_staf', 'data_pk'])->get();

            $staf = [];
            $pekebun_kecil = [];

            // dd($pemohon);
            foreach ($pemohon as $key => $p) {
                if ($p->peserta == null) {
                    $p->delete();
                } else {
                    if ($p->peserta['jenis_pengguna'] == 'Peserta ULS') {
                        $p->jenis_peserta = 'Peserta ULS';
                    } elseif ($p->peserta['jenis_pengguna'] == 'Peserta ULPK') {
                        $p->jenis_peserta = 'Peserta ULPK';
                    }

                    if ($p->jenis_peserta == 'Peserta ULS') {
                        $p->gred = null;
                        $p->pusat_tanggungjawab = null;
                        $data_staf = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', 'f9d00dae5c6d6d549c306bae6e88222eb2f84307')
                            ->get('https://www4.risda.gov.my/fire/getallstaff/')
                            ->getBody()
                            ->getContents();

                        $data_staf = json_decode($data_staf, true);
                        foreach ($data_staf as $key => $s) {
                            if ($s['nokp'] == $p->peserta->no_KP) {
                                $p->gred = $s['Gred'];
                                $p->pusat_tanggungjawab = $s['NamaPT'];
                            }
                        }

                        array_push($staf, $p);
                    } elseif ($p->jenis_peserta == 'Peserta ULPK') {
                        $data_pk = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', '1cc11a9fec81dc1f99f353f403d6f5bac620aa8f')
                            ->get('https://www4.risda.gov.my/espek/portalpkprofiltanah/?nokp=' . $p->peserta->no_KP)
                            ->getBody()
                            ->getContents();

                        $data_pk = json_decode($data_pk, true);

                        // check if not pk
                        if (!empty($data_pk['message'])) {
                            // alert()->error('No. Kad Pengenalan tiada dalam pangkalan data HRIP');
                            // return back();
                        } else {
                            $p->pekebun_kecil = $data_pk[0];
                            array_push($pekebun_kecil, $p);
                        }
                    }

                    $p['tarikh'] = date('H:i, d/m/Y', strtotime($p->created_at));
                }
            }

            if (Auth::user()->jenis_pengguna == 'Penyokong') {
                return view('permohonan_kursus.semakan_permohonan.index_penyokong', [
                    'pemohon' => $pemohon,
                    'staf' => $staf,
                    'pekebun_kecil' => $pekebun_kecil,
                    'tempat' => $tempat
                ]);
            }

            return view('permohonan_kursus.semakan_permohonan.index', [
                'pemohon' => $pemohon,
                'staf' => $staf,
                'pekebun_kecil' => $pekebun_kecil,
                'tempat' => $tempat
            ]);
        }
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
     * @param  \App\Http\Requests\StoreSemakPermohonanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSemakPermohonanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SemakPermohonan  $semakPermohonan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peserta = Permohonan::find($id);

        if ($peserta->peserta->jenis_pengguna == 'Peserta ULS') {
            return view('permohonan_kursus.semakan_permohonan.uls.show', [
                'user' => $peserta,
            ]);
        } elseif ($peserta->peserta->jenis_pengguna == 'Peserta ULPK') {
            $data_user = User::with('data_pk')->where('id', $peserta->no_pekerja)->first();
            $data_tanah = Tanah::with('tanaman')->where('id_pekebun_kecil', $data_user->data_pk->id)->get();
            $tahun = substr($data_user->no_KP, 0, 2);
            $tahun = (int)$tahun;
            if ($tahun <= 30) {
                $tahun_lahir = '20' . $tahun;
            } else {
                $tahun_lahir = '19' . $tahun;
            }
            $data_user['tarikh_lahir'] = substr($data_user->no_KP, 4, 2) . '/' . substr($data_user->no_KP, 2, 2) . '/' . $tahun_lahir;

            return view('permohonan_kursus.semakan_permohonan.ulpk.show', [
                'pengguna' => $data_user,
                'tanah' => $data_tanah,
                'user' => $peserta
            ]);
        }


        // return view('permohonan_kursus.semakan_permohonan.show', [
        //     'staf' => $pemohon,
        //     'user' => $peserta,
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SemakPermohonan  $semakPermohonan
     * @return \Illuminate\Http\Response
     */
    public function edit(SemakPermohonan $semakPermohonan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSemakPermohonanRequest  $request
     * @param  \App\Models\SemakPermohonan  $semakPermohonan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSemakPermohonanRequest $request, SemakPermohonan $semakPermohonan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SemakPermohonan  $semakPermohonan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permohonan = Permohonan::find($id);
        $permohonan->delete();
        alert()->success('Maklumat berjaya dihapus', 'Berjaya');
        return redirect('/pengurusan_peserta/semakan_pemohon');
    }

    public function pengesahan_pukal(Request $request)
    {
        foreach ($request->pemohon as $key => $p) {
            $pemohon = Permohonan::find($p);
            $pemohon->status_permohonan = '4';
            $agensi = Agensi::where('id', $pemohon->jadual->kursus_tempat)->first();

            $pemohon->save();
            Mail::to('applicantsppeps01@gmail.com')->send(new PermohonanLulus($pemohon, $agensi));
        }

        alert()->success('Peserta telah diluluskan.', 'Berjaya');
        return redirect('/pengurusan_peserta/semakan_pemohon');
    }

    public function sokongan_pukal(Request $request)
    {
        foreach ($request->pemohon as $key => $p) {
            $pemohon = Permohonan::find($p);
            $pemohon->status_permohonan = '2';

            $pemohon->save();
        }

        alert()->success('Peserta telah diberi sokongan.', 'Berjaya');
        return redirect('/pengurusan_peserta/semakan_pemohon');
    }

    public function filter()
    {
        $unitlatihan = $_GET['unit_latihan'];
        $tempat = $_GET['tempat_kursus'];

        $permohonan = Permohonan::with(['tempat', 'peserta', 'data_staf', 'data_pk', 'jadual'])->get();

        $result = [];
        if ($unitlatihan != null) {
            // ada unit latihan
            if ($tempat != null) {
                // ada tempat
                foreach ($permohonan as $key => $p) {
                    if ($p->jadual->kursus_unit_latihan == $unitlatihan) {
                        if ($p->tempat->id == $tempat) {
                            array_push($result, $p);
                        }
                    }
                }
            } else {
                // tiada tempat
                foreach ($permohonan as $key => $p) {
                    if ($p->jadual->kursus_unit_latihan == $unitlatihan) {
                        array_push($result, $p);
                    }
                }
            }
        } else {
            // tiada unit latihan
            if ($tempat != null) {
                // ada tempat
                foreach ($permohonan as $key => $p) {
                    if ($p->tempat->id == $tempat) {
                        array_push($result, $p);
                    }
                }
            } else {
                // tiada tempat
                foreach ($permohonan as $key => $p) {
                    array_push($result, $p);
                }
            }
        }

        return response()->json($result);
    }
}
