<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMatlamatTahunanPerbelanjaanRequest;
use App\Http\Requests\UpdateMatlamatTahunanPerbelanjaanRequest;
use App\Models\BidangKursus;
use App\Models\KategoriKursus;
use App\Models\KodKursus;
use App\Models\MatlamatTahunanPerbelanjaan;
use Illuminate\Http\Request;

class MatlamatTahunanPerbelanjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('utiliti.matlamat_tahunan.perbelanjaan.index');
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
     * @param  \App\Http\Requests\StoreMatlamatTahunanPerbelanjaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatlamatTahunanPerbelanjaanRequest $request)
    {
        // dd($request);
        $bulan = [
            '',
            'jan',
            'feb',
            'mac',
            'apr',
            'mei',
            'jun',
            'jul',
            'ogos',
            'sept',
            'okt',
            'nov',
            'dis'
        ];
        foreach ($request->title as $key => $r) {
            // dd($r, $key);
            $mt_perbelanjaan = new MatlamatTahunanPerbelanjaan();
            $mt_perbelanjaan->nama = $r;
            if ($request->jenis == 'bidang_kursus') {
                $mt_perbelanjaan->bidang_ref = $request->id_title[$key];
                $mt_perbelanjaan->jenis = 'bidang';
            } elseif ($request->jenis == 'kategori_kursus') {
                $mt_perbelanjaan->kategori_ref = $request->id_title[$key];
                $mt_perbelanjaan->jenis = 'kategori';
            } elseif ($request->jenis == 'tajuk_kursus') {
                $mt_perbelanjaan->tajuk_ref = $request->id_title[$key];
                $mt_perbelanjaan->jenis = 'tajuk';
            }
            
            foreach ($request->bulan[$key] as $l => $b) {
                // dd($bulan[1]);
                $mon = $bulan[$l];
                $mt_perbelanjaan->$mon = $b;
            }
            $mt_perbelanjaan->save();
        }

        alert()->success('Maklumat telah berjaya disimpan', 'Berjaya');
        return redirect('/utiliti/matlamat_tahunan/perbelanjaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MatlamatTahunanPerbelanjaan  $matlamatTahunanPerbelanjaan
     * @return \Illuminate\Http\Response
     */
    public function show(MatlamatTahunanPerbelanjaan $matlamatTahunanPerbelanjaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MatlamatTahunanPerbelanjaan  $matlamatTahunanPerbelanjaan
     * @return \Illuminate\Http\Response
     */
    public function edit(MatlamatTahunanPerbelanjaan $matlamatTahunanPerbelanjaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMatlamatTahunanPerbelanjaanRequest  $request
     * @param  \App\Models\MatlamatTahunanPerbelanjaan  $matlamatTahunanPerbelanjaan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMatlamatTahunanPerbelanjaanRequest $request, MatlamatTahunanPerbelanjaan $matlamatTahunanPerbelanjaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MatlamatTahunanPerbelanjaan  $matlamatTahunanPerbelanjaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(MatlamatTahunanPerbelanjaan $matlamatTahunanPerbelanjaan)
    {
        //
    }

    public function carian(Request $request)
    {
        $huruf = range('A', 'Z');
        $huruf_kecil = range('a', 'z');

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
            $carian = BidangKursus::with('matlamat_perbelanjaan')->whereYear('created_at', $request->tahun)->get();
            foreach ($carian as $key => $c) {
                if ($c->matlamat_perbelanjaan == null) {
                    $c['matlamat_perbelanjaan_cm'] = $bulan;
                } else {
                    $c['matlamat_perbelanjaan_cm'] = [
                        '1' => $c['matlamat_perbelanjaan']->jan,
                        '2' => $c['matlamat_perbelanjaan']->feb,
                        '3' => $c['matlamat_perbelanjaan']->mac,
                        '4' => $c['matlamat_perbelanjaan']->apr,
                        '5' => $c['matlamat_perbelanjaan']->mei,
                        '6' => $c['matlamat_perbelanjaan']->jun,
                        '7' => $c['matlamat_perbelanjaan']->jul,
                        '8' => $c['matlamat_perbelanjaan']->ogos,
                        '9' => $c['matlamat_perbelanjaan']->sept,
                        '10' => $c['matlamat_perbelanjaan']->okt,
                        '11' => $c['matlamat_perbelanjaan']->nov,
                        '12' => $c['matlamat_perbelanjaan']->dis,
                    ];
                }
                // dd($c['matlamat_perbelanjaan_cm']);
                $c['jumlah'] = array_sum($c['matlamat_perbelanjaan_cm']);
            }

            // dd($carian[0]->matlamat_perbelanjaan_cm);

            $tahun = $request->tahun;
            $jenis = [];
            $jenis['name'] = ucwords($request->jenis_m);
            $jenis['val'] = $request->jenis_m;
            $jenis['sub'] = str_replace(' ', '_', $request->jenis_m);
            // dd($jenis);
            $title = strtoupper($request->jenis_m);
            return view('utiliti.matlamat_tahunan.perbelanjaan.carian.bidang', [
                'matlamat_tahunan' => $carian,
                'tahun' => $tahun,
                'jenis' => $jenis,
                'title' => $title,
                'carian' => $carian,
                'huruf' => $huruf,
                'huruf_kecil' => $huruf_kecil,
            ]);
        } elseif ($request->jenis_m == 'kategori kursus') {
            $carian = KategoriKursus::with( 'matlamat_perbelanjaan' )->whereYear('created_at', $request->tahun)->get()->groupBy('U_Bidang_Kursus');
            $bidang = BidangKursus::with('matlamat_perbelanjaan')->whereYear('created_at', $request->tahun)->get();
            foreach ($carian as $a => $c) {
                foreach ($c as $aa => $cc) {
                    if ($cc->matlamat_perbelanjaan == null) {
                        $cc['matlamat_perbelanjaan_cm'] = $bulan;
                    } else {
                        $cc['matlamat_perbelanjaan_cm'] = [
                            '1' => $cc['matlamat_perbelanjaan']->jan,
                            '2' => $cc['matlamat_perbelanjaan']->feb,
                            '3' => $cc['matlamat_perbelanjaan']->mac,
                            '4' => $cc['matlamat_perbelanjaan']->apr,
                            '5' => $cc['matlamat_perbelanjaan']->mei,
                            '6' => $cc['matlamat_perbelanjaan']->jun,
                            '7' => $cc['matlamat_perbelanjaan']->jul,
                            '8' => $cc['matlamat_perbelanjaan']->ogos,
                            '9' => $cc['matlamat_perbelanjaan']->sept,
                            '10' => $cc['matlamat_perbelanjaan']->okt,
                            '11' => $cc['matlamat_perbelanjaan']->nov,
                            '12' => $cc['matlamat_perbelanjaan']->dis,
                        ];
                    }
                    // dd($cc['matlamat_perbelanjaan_cm']);
                    $cc['jumlah'] = array_sum($cc['matlamat_perbelanjaan_cm']);
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
            return view('utiliti.matlamat_tahunan.perbelanjaan.carian.kategori', [
                'tahun' => $tahun,
                'jenis' => $jenis,
                'title' => $title,
                'carian' => $carian,
                'huruf' => $huruf,
                'huruf_kecil' => $huruf_kecil,
                'bidang_h' => $bidang
            ]);
        } elseif ($request->jenis_m == 'tajuk kursus') {
            $bidang = BidangKursus::with('matlamat_perbelanjaan')->whereYear('created_at', $request->tahun)->get();
            $kategori = KategoriKursus::with('matlamat_perbelanjaan')->whereYear('created_at', $request->tahun)->get()->groupBy('U_Bidang_Kursus');
            $carian = KodKursus::with('matlamat_perbelanjaan')->whereYear('created_at', $request->tahun)->get()->groupBy('U_Kategori_Kursus');

            foreach ($carian as $a => $c) {
                foreach ($c as $aa => $cc) {
                    if ($cc->matlamat_perbelanjaan == null) {
                        $cc['matlamat_perbelanjaan_cm'] = $bulan;
                    } else {
                        $cc['matlamat_perbelanjaan_cm'] = [
                            '1' => $cc['matlamat_perbelanjaan']->jan,
                            '2' => $cc['matlamat_perbelanjaan']->feb,
                            '3' => $cc['matlamat_perbelanjaan']->mac,
                            '4' => $cc['matlamat_perbelanjaan']->apr,
                            '5' => $cc['matlamat_perbelanjaan']->mei,
                            '6' => $cc['matlamat_perbelanjaan']->jun,
                            '7' => $cc['matlamat_perbelanjaan']->jul,
                            '8' => $cc['matlamat_perbelanjaan']->ogos,
                            '9' => $cc['matlamat_perbelanjaan']->sept,
                            '10' => $cc['matlamat_perbelanjaan']->okt,
                            '11' => $cc['matlamat_perbelanjaan']->nov,
                            '12' => $cc['matlamat_perbelanjaan']->dis,
                        ];
                    }
                    // dd($cc['matlamat_perbelanjaan_cm']);
                    $cc['jumlah'] = array_sum($cc['matlamat_perbelanjaan_cm']);
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
            return view('utiliti.matlamat_tahunan.perbelanjaan.carian.tajuk', [
                'tahun' => $tahun,
                'jenis' => $jenis,
                'title' => $title,
                'carian' => $carian,
                'huruf' => $huruf,
                'huruf_kecil' => $huruf_kecil,
                'bidang_h' => $bidang,
                'kategori_h' => $kategori
            ]);
        }
    }

    public function kemaskini($title, $year)
    {
        if ($title == 'bidang_kursus') {
            $carian = BidangKursus::with('matlamat_perbelanjaan')->whereYear('created_at', $year)->get();
        } elseif ($title == 'kategori_kursus') {
            $carian = KategoriKursus::with('matlamat_perbelanjaan')->whereYear('created_at', $year)->get();
        } elseif ($title == 'tajuk_kursus') {
            $carian = KodKursus::with('matlamat_perbelanjaan')->whereYear('created_at', $year)
                ->get();
        }

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
        foreach ($carian as $key => $c) {
            if ($c->matlamat_perbelanjaan == null) {
                $c['matlamat_perbelanjaan_cm'] = $bulan;
                $status = 'create';
            } else {
                $c['matlamat_perbelanjaan_cm'] = [
                    '1' => $c['matlamat_perbelanjaan']->jan,
                    '2' => $c['matlamat_perbelanjaan']->feb,
                    '3' => $c['matlamat_perbelanjaan']->mac,
                    '4' => $c['matlamat_perbelanjaan']->apr,
                    '5' => $c['matlamat_perbelanjaan']->mei,
                    '6' => $c['matlamat_perbelanjaan']->jun,
                    '7' => $c['matlamat_perbelanjaan']->jul,
                    '8' => $c['matlamat_perbelanjaan']->ogos,
                    '9' => $c['matlamat_perbelanjaan']->sept,
                    '10' => $c['matlamat_perbelanjaan']->okt,
                    '11' => $c['matlamat_perbelanjaan']->nov,
                    '12' => $c['matlamat_perbelanjaan']->dis,
                ];
                $status = 'update';
            }
            $c['jumlah'] = array_sum($c['matlamat_perbelanjaan_cm']);
        }

        $tahun = $year;
        $jenis = [];
        $title = str_replace('_', ' ', $title);
        $jenis['name'] = ucwords($title);
        $jenis['val'] = $title;
        $jenis['sub'] = str_replace(' ', '_', $title);
        $title = strtoupper($title);

        return view('utiliti.matlamat_tahunan.perbelanjaan.edit', [
            'matlamat_tahunan' => $carian,
            'tahun' => $tahun,
            'jenis' => $jenis,
            'title' => $title,
            'carian' => $carian,
            'status' => $status
        ]);
    }

    public function update_table(UpdateMatlamatTahunanPerbelanjaanRequest $request)
    {
        $bulan = [
            '',
            'jan',
            'feb',
            'mac',
            'apr',
            'mei',
            'jun',
            'jul',
            'ogos',
            'sept',
            'okt',
            'nov',
            'dis'
        ];
        foreach ($request->title as $key => $r) {
            // dd($r, $key);
            $mt_perbelanjaan = MatlamatTahunanPerbelanjaan::where('nama', $r)->first();
            $mt_perbelanjaan->nama = $r;
            foreach ($request->bulan[$key] as $l => $b) {
                // dd($bulan[1]);
                $mon = $bulan[$l];
                $mt_perbelanjaan->$mon = $b;
            }
            $mt_perbelanjaan->save();
        }

        alert()->success('Maklumat telah berjaya dikemaskini', 'Berjaya');
        return redirect('/utiliti/matlamat_tahunan/kursus');
    }
}
