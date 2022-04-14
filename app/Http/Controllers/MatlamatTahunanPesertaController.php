<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMatlamatTahunanPesertaRequest;
use App\Http\Requests\UpdateMatlamatTahunanPesertaRequest;
use App\Models\BidangKursus;
use App\Models\KategoriKursus;
use App\Models\KodKursus;
use App\Models\MatlamatTahunanPeserta;
use Illuminate\Http\Request;

class MatlamatTahunanPesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('utiliti.matlamat_tahunan.peserta.index');
    }

    public function carian(Request $request)
    {
        $bulan = [
            '1' => 0,
            '2' => 0,
            '3' => 0,
            '4' => 0,
            '5' => 0,
            '6' => 0,
            '7' => 0,
            '8' => 0,
            '9' => 0,
            '10' => 0,
            '11' => 0,
            '12' => 0,
        ];

        if ($request->jenis_m == 'bidang kursus') {
            $carian = BidangKursus::with('matlamat_kursus')->whereYear('created_at', $request->tahun)->get();
            foreach ($carian as $key => $c) {
                if ($c->matlamat_kursus == null) {
                    $c['matlamat_kursus_cm'] = $bulan;
                } else {
                    $c['matlamat_kursus_cm'] = [
                        '1' => $c['matlamat_kursus']->jan,
                        '2' => $c['matlamat_kursus']->feb,
                        '3' => $c['matlamat_kursus']->mac,
                        '4' => $c['matlamat_kursus']->apr,
                        '5' => $c['matlamat_kursus']->mei,
                        '6' => $c['matlamat_kursus']->jun,
                        '7' => $c['matlamat_kursus']->jul,
                        '8' => $c['matlamat_kursus']->ogos,
                        '9' => $c['matlamat_kursus']->sept,
                        '10' => $c['matlamat_kursus']->okt,
                        '11' => $c['matlamat_kursus']->nov,
                        '12' => $c['matlamat_kursus']->dis,
                    ];
                }
                // dd($c['matlamat_kursus_cm']);
                $c['jumlah'] = array_sum($c['matlamat_kursus_cm']);
            }

            // dd($carian[0]->matlamat_kursus_cm);

            $tahun = $request->tahun;
            $jenis = [];
            $jenis['name'] = ucwords($request->jenis_m);
            $jenis['val'] = $request->jenis_m;
            $jenis['sub'] = str_replace(' ', '_', $request->jenis_m);
            // dd($jenis);
            $title = strtoupper($request->jenis_m);
            return view('utiliti.matlamat_tahunan.kursus.carian', [
                'matlamat_tahunan' => $carian,
                'tahun' => $tahun,
                'jenis' => $jenis,
                'title' => $title,
                'carian' => $carian
            ]);
        } elseif ($request->jenis_m == 'kategori kursus') {
            $carian = KategoriKursus::with('bidang')->whereYear('created_at', $request->tahun)->get()->groupBy('U_Bidang_Kursus');
            $bidang = BidangKursus::all();
            foreach ($carian as $a => $c) {
                foreach ($c as $aa => $cc) {
                    if ($cc->matlamat_kursus == null) {
                        $cc['matlamat_kursus_cm'] = $bulan;
                    } else {
                        $cc['matlamat_kursus_cm'] = [
                            '1' => $cc['matlamat_kursus']->jan,
                            '2' => $cc['matlamat_kursus']->feb,
                            '3' => $cc['matlamat_kursus']->mac,
                            '4' => $cc['matlamat_kursus']->apr,
                            '5' => $cc['matlamat_kursus']->mei,
                            '6' => $cc['matlamat_kursus']->jun,
                            '7' => $cc['matlamat_kursus']->jul,
                            '8' => $cc['matlamat_kursus']->ogos,
                            '9' => $cc['matlamat_kursus']->sept,
                            '10' => $cc['matlamat_kursus']->okt,
                            '11' => $cc['matlamat_kursus']->nov,
                            '12' => $cc['matlamat_kursus']->dis,
                        ];
                    }
                    // dd($cc['matlamat_kursus_cm']);
                    $cc['jumlah'] = array_sum($cc['matlamat_kursus_cm']);
                }
            }

            // dd($carian[0]->matlamat_kursus_cm);

            $tahun = $request->tahun;
            $jenis = [];
            $jenis['name'] = ucwords($request->jenis_m);
            $jenis['val'] = $request->jenis_m;
            $jenis['sub'] = str_replace(' ', '_', $request->jenis_m);
            // dd($jenis);
            $title = strtoupper($request->jenis_m);
            // dd($carian, $bidang);
            return view('utiliti.matlamat_tahunan.kursus.carian_kategori', [
                'tahun' => $tahun,
                'jenis' => $jenis,
                'title' => $title,
                'carian' => $carian,
                'bidang_h' => $bidang
            ]);
        } elseif ($request->jenis_m == 'tajuk kursus') {
            $bidang = BidangKursus::all();
            $kategori = KategoriKursus::get()->groupBy('U_Bidang_Kursus');
            $carian = KodKursus::whereYear('created_at', $request->tahun)->get()->groupBy('U_Kategori_Kursus');

            foreach ($carian as $a => $c) {
                foreach ($c as $aa => $cc) {
                    if ($cc->matlamat_kursus == null) {
                        $cc['matlamat_kursus_cm'] = $bulan;
                    } else {
                        $cc['matlamat_kursus_cm'] = [
                            '1' => $cc['matlamat_kursus']->jan,
                            '2' => $cc['matlamat_kursus']->feb,
                            '3' => $cc['matlamat_kursus']->mac,
                            '4' => $cc['matlamat_kursus']->apr,
                            '5' => $cc['matlamat_kursus']->mei,
                            '6' => $cc['matlamat_kursus']->jun,
                            '7' => $cc['matlamat_kursus']->jul,
                            '8' => $cc['matlamat_kursus']->ogos,
                            '9' => $cc['matlamat_kursus']->sept,
                            '10' => $cc['matlamat_kursus']->okt,
                            '11' => $cc['matlamat_kursus']->nov,
                            '12' => $cc['matlamat_kursus']->dis,
                        ];
                    }
                    // dd($cc['matlamat_kursus_cm']);
                    $cc['jumlah'] = array_sum($cc['matlamat_kursus_cm']);
                }
            }

            $tahun = $request->tahun;
            $jenis = [];
            $jenis['name'] = ucwords($request->jenis_m);
            $jenis['val'] = $request->jenis_m;
            $jenis['sub'] = str_replace(' ', '_', $request->jenis_m);
            // dd($jenis);
            $title = strtoupper($request->jenis_m);
            // dd($carian, $kategori, $bidang);
            return view('utiliti.matlamat_tahunan.kursus.carian_tajuk', [
                'tahun' => $tahun,
                'jenis' => $jenis,
                'title' => $title,
                'carian' => $carian,
                'bidang_h' => $bidang,
                'kategori_h' => $kategori
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
     * @param  \App\Http\Requests\StoreMatlamatTahunanPesertaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatlamatTahunanPesertaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MatlamatTahunanPeserta  $matlamatTahunanPeserta
     * @return \Illuminate\Http\Response
     */
    public function show(MatlamatTahunanPeserta $matlamatTahunanPeserta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MatlamatTahunanPeserta  $matlamatTahunanPeserta
     * @return \Illuminate\Http\Response
     */
    public function edit(MatlamatTahunanPeserta $matlamatTahunanPeserta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMatlamatTahunanPesertaRequest  $request
     * @param  \App\Models\MatlamatTahunanPeserta  $matlamatTahunanPeserta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMatlamatTahunanPesertaRequest $request, MatlamatTahunanPeserta $matlamatTahunanPeserta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MatlamatTahunanPeserta  $matlamatTahunanPeserta
     * @return \Illuminate\Http\Response
     */
    public function destroy(MatlamatTahunanPeserta $matlamatTahunanPeserta)
    {
        //
    }
}
