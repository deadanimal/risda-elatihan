<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMatlamatTahunanPesertaRequest;
use App\Http\Requests\UpdateMatlamatTahunanPesertaRequest;
use App\Models\BidangKursus;
use App\Models\KategoriKursus;
use App\Models\KodKursus;
use App\Models\MatlamatTahunanNegeri;
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
        if ($request->tahun == 'yyyy') {
            alert()->error('Sila masukkan tahun yang betul', 'Gagal');
            return back();
        } elseif ($request->tahun == null) {
            alert()->error('Sila masukkan tahun yang betul', 'Gagal');
            return back();
        }
        
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

        if ($request->jenis_m == 'pusat latihan') {
            $check = MatlamatTahunanPeserta::where('jenis', 'pusat_latihan')->whereYear('created_at', $request->tahun)->get();
            $month = [
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
            if ($check->isEmpty()) {
                $pusat = [
                    'IKPK Kelantan',
                    'IKPK Perak',
                    'Kolej RISDA Pahang',
                    'UCAM Melaka',
                    'Sabah',
                    'Sarawak',
                    'Pusat Tanggungjawab',
                    'Kolej RISDA Sdn Bhd'
                ];

                foreach ($pusat as $key => $pl) {
                    $reg_pl = new MatlamatTahunanPeserta;
                    $reg_pl->jenis = 'pusat_latihan';
                    $reg_pl->nama = $pl;
                    for ($i = 1; $i < 13; $i++) {
                        $nama_bulan = $month[$i];
                        $reg_pl->$nama_bulan = 0;
                    }

                    $reg_pl->save();
                }
            }

            $carian = $check;
            foreach ($carian as $key => $c) {
                if ($c->matlamat_peserta == null) {

                    if ($request->jenis_m == 'pusat latihan') {
                        $c['matlamat_peserta_cm'] = [
                            '1' => $c->jan,
                            '2' => $c->feb,
                            '3' => $c->mac,
                            '4' => $c->apr,
                            '5' => $c->mei,
                            '6' => $c->jun,
                            '7' => $c->jul,
                            '8' => $c->ogos,
                            '9' => $c->sept,
                            '10' => $c->okt,
                            '11' => $c->nov,
                            '12' => $c->dis,
                        ];
                    } else {
                        $c['matlamat_peserta_cm'] = $bulan;
                    }
                } else {
                    $c['matlamat_peserta_cm'] = [
                        '1' => $c['matlamat_peserta']->jan,
                        '2' => $c['matlamat_peserta']->feb,
                        '3' => $c['matlamat_peserta']->mac,
                        '4' => $c['matlamat_peserta']->apr,
                        '5' => $c['matlamat_peserta']->mei,
                        '6' => $c['matlamat_peserta']->jun,
                        '7' => $c['matlamat_peserta']->jul,
                        '8' => $c['matlamat_peserta']->ogos,
                        '9' => $c['matlamat_peserta']->sept,
                        '10' => $c['matlamat_peserta']->okt,
                        '11' => $c['matlamat_peserta']->nov,
                        '12' => $c['matlamat_peserta']->dis,
                    ];
                }
                // dd($c['matlamat_peserta_cm']);
                $c['jumlah'] = array_sum($c['matlamat_peserta_cm']);
            }
            $tahun = $request->tahun;
            $jenis = [];
            $jenis['name'] = ucwords($request->jenis_m);
            $jenis['val'] = $request->jenis_m;
            $jenis['sub'] = str_replace(' ', '_', $request->jenis_m);
            // dd($jenis);
            $title = strtoupper($request->jenis_m);

            return view('utiliti.matlamat_tahunan.peserta.carian.bidang', [
                'matlamat_tahunan' => $carian,
                'tahun' => $tahun,
                'jenis' => $jenis,
                'title' => $title,
                'carian' => $carian,
                'huruf' => $huruf,
                'huruf_kecil' => $huruf_kecil,
            ]);
        } elseif ($request->jenis_m == 'negeri') {

            $carian = KodKursus::with('matlamat_negeri_peserta')->whereYear('created_at', $request->tahun)->get();

            $neg = [

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
                '13' => 0,
            ];

            foreach ($carian as $key => $c) {
                if ($c->matlamat_negeri_peserta == null) {
                    $c['matlamat_negeri_peserta_cm'] = $neg;
                } else {
                    $c['matlamat_negeri_peserta_cm'] = [
                        '1' => $c['matlamat_negeri_peserta']->johor,
                        '2' => $c['matlamat_negeri_peserta']->kedah,
                        '3' => $c['matlamat_negeri_peserta']->kelantan,
                        '4' => $c['matlamat_negeri_peserta']->melaka,
                        '5' => $c['matlamat_negeri_peserta']->negeri_sembilan,
                        '6' => $c['matlamat_negeri_peserta']->pahang,
                        '7' => $c['matlamat_negeri_peserta']->perak,
                        '8' => $c['matlamat_negeri_peserta']->perlis,
                        '9' => $c['matlamat_negeri_peserta']->pulau_pinang,
                        '10' => $c['matlamat_negeri_peserta']->selangor,
                        '11' => $c['matlamat_negeri_peserta']->terengganu,
                        '12' => $c['matlamat_negeri_peserta']->sarawak,
                        '13' => $c['matlamat_negeri_peserta']->sabah,
                        '14' => $c['matlamat_negeri_peserta']->wpkl,
                    ];
                }
                // dd($c['matlamat_negeri_peserta_cm']);
                $c['jumlah'] = array_sum($c['matlamat_negeri_peserta_cm']);
            }

            // dd($carian[0]->matlamat_negeri_peserta_cm);

            $tahun = $request->tahun;
            $jenis = [];
            $jenis['name'] = ucwords($request->jenis_m);
            $jenis['val'] = $request->jenis_m;
            $jenis['sub'] = str_replace(' ', '_', $request->jenis_m);
            // dd($jenis);
            $title = strtoupper($request->jenis_m);
            return view('utiliti.matlamat_tahunan.peserta.carian.negeri', [
                'matlamat_tahunan' => $carian,
                'tahun' => $tahun,
                'jenis' => $jenis,
                'title' => $title,
                'carian' => $carian,
                'huruf' => $huruf,
                'huruf_kecil' => $huruf_kecil,
            ]);
        } else if ($request->jenis_m == 'bidang kursus') {
            $carian = BidangKursus::with('matlamat_peserta')->whereYear('created_at', $request->tahun)->get();
            foreach ($carian as $key => $c) {
                if ($c->matlamat_peserta == null) {
                    $c['matlamat_peserta_cm'] = $bulan;
                } else {
                    $c['matlamat_peserta_cm'] = [
                        '1' => $c['matlamat_peserta']->jan,
                        '2' => $c['matlamat_peserta']->feb,
                        '3' => $c['matlamat_peserta']->mac,
                        '4' => $c['matlamat_peserta']->apr,
                        '5' => $c['matlamat_peserta']->mei,
                        '6' => $c['matlamat_peserta']->jun,
                        '7' => $c['matlamat_peserta']->jul,
                        '8' => $c['matlamat_peserta']->ogos,
                        '9' => $c['matlamat_peserta']->sept,
                        '10' => $c['matlamat_peserta']->okt,
                        '11' => $c['matlamat_peserta']->nov,
                        '12' => $c['matlamat_peserta']->dis,
                    ];
                }
                // dd($c['matlamat_peserta_cm']);
                $c['jumlah'] = array_sum($c['matlamat_peserta_cm']);
            }

            // dd($carian[0]->matlamat_peserta_cm);

            $tahun = $request->tahun;
            $jenis = [];
            $jenis['name'] = ucwords($request->jenis_m);
            $jenis['val'] = $request->jenis_m;
            $jenis['sub'] = str_replace(' ', '_', $request->jenis_m);
            // dd($jenis);
            $title = strtoupper($request->jenis_m);
            return view('utiliti.matlamat_tahunan.peserta.carian.bidang', [
                'matlamat_tahunan' => $carian,
                'tahun' => $tahun,
                'jenis' => $jenis,
                'title' => $title,
                'carian' => $carian,
                'huruf' => $huruf,
                'huruf_kecil' => $huruf_kecil,
            ]);
        } elseif ($request->jenis_m == 'kategori kursus') {
            $carian = KategoriKursus::with('matlamat_peserta')->whereYear('created_at', $request->tahun)->get()->groupBy('U_Bidang_Kursus');
            $bidang = BidangKursus::with('matlamat_peserta')->whereYear('created_at', $request->tahun)->get();
            foreach ($carian as $a => $c) {
                foreach ($c as $aa => $cc) {
                    if ($cc->matlamat_peserta == null) {
                        $cc['matlamat_peserta_cm'] = $bulan;
                    } else {
                        $cc['matlamat_peserta_cm'] = [
                            '1' => $cc['matlamat_peserta']->jan,
                            '2' => $cc['matlamat_peserta']->feb,
                            '3' => $cc['matlamat_peserta']->mac,
                            '4' => $cc['matlamat_peserta']->apr,
                            '5' => $cc['matlamat_peserta']->mei,
                            '6' => $cc['matlamat_peserta']->jun,
                            '7' => $cc['matlamat_peserta']->jul,
                            '8' => $cc['matlamat_peserta']->ogos,
                            '9' => $cc['matlamat_peserta']->sept,
                            '10' => $cc['matlamat_peserta']->okt,
                            '11' => $cc['matlamat_peserta']->nov,
                            '12' => $cc['matlamat_peserta']->dis,
                        ];
                    }
                    // dd($cc['matlamat_peserta_cm']);
                    $cc['jumlah'] = array_sum($cc['matlamat_peserta_cm']);
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
            return view('utiliti.matlamat_tahunan.peserta.carian.kategori', [
                'tahun' => $tahun,
                'jenis' => $jenis,
                'title' => $title,
                'carian' => $carian,
                'huruf' => $huruf,
                'huruf_kecil' => $huruf_kecil,
                'bidang_h' => $bidang
            ]);
        } elseif ($request->jenis_m == 'tajuk kursus') {
            $bidang = BidangKursus::with('matlamat_peserta')->whereYear('created_at', $request->tahun)->get();
            $kategori = KategoriKursus::with('matlamat_peserta')->whereYear('created_at', $request->tahun)->get()->groupBy('U_Bidang_Kursus');
            $carian = KodKursus::with('matlamat_peserta')->whereYear('created_at', $request->tahun)->get()->groupBy('U_Kategori_Kursus');

            foreach ($carian as $a => $c) {
                foreach ($c as $aa => $cc) {
                    if ($cc->matlamat_peserta == null) {
                        $cc['matlamat_peserta_cm'] = $bulan;
                    } else {
                        $cc['matlamat_peserta_cm'] = [
                            '1' => $cc['matlamat_peserta']->jan,
                            '2' => $cc['matlamat_peserta']->feb,
                            '3' => $cc['matlamat_peserta']->mac,
                            '4' => $cc['matlamat_peserta']->apr,
                            '5' => $cc['matlamat_peserta']->mei,
                            '6' => $cc['matlamat_peserta']->jun,
                            '7' => $cc['matlamat_peserta']->jul,
                            '8' => $cc['matlamat_peserta']->ogos,
                            '9' => $cc['matlamat_peserta']->sept,
                            '10' => $cc['matlamat_peserta']->okt,
                            '11' => $cc['matlamat_peserta']->nov,
                            '12' => $cc['matlamat_peserta']->dis,
                        ];
                    }
                    // dd($cc['matlamat_peserta_cm']);
                    $cc['jumlah'] = array_sum($cc['matlamat_peserta_cm']);
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
            return view('utiliti.matlamat_tahunan.peserta.carian.tajuk', [
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
            $carian = BidangKursus::with('matlamat_peserta')->whereYear('created_at', $year)->get();
        } elseif ($title == 'kategori_kursus') {
            $carian = KategoriKursus::with('matlamat_peserta')->whereYear('created_at', $year)->get();
        } elseif ($title == 'tajuk_kursus') {
            $carian = KodKursus::with('matlamat_peserta')->whereYear('created_at', $year)
                ->get();
        } elseif ($title == 'pusat_latihan') {
            $carian = MatlamatTahunanPeserta::where('jenis', 'pusat_latihan')->whereYear('created_at', $year)
                ->get();
        } elseif ($title == 'negeri') {
            $carian = KodKursus::with('matlamat_negeri_peserta')->whereYear('created_at', $year)->get();

            $neg = [

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
                '13' => 0,
                '14' => 0,
            ];

            foreach ($carian as $key => $c) {

                if ($c->matlamat_negeri_peserta == null) {
                    $c['matlamat_negeri_peserta_cm'] = $neg;
                    if ($title == 'pusat_latihan') {
                        $status = 'update';
                    } else {
                        $status = 'create';
                    }
                } else {
                    $c['matlamat_negeri_peserta_cm'] = [
                        '1' => $c['matlamat_negeri_peserta']->johor,
                        '2' => $c['matlamat_negeri_peserta']->kedah,
                        '3' => $c['matlamat_negeri_peserta']->kelantan,
                        '4' => $c['matlamat_negeri_peserta']->melaka,
                        '5' => $c['matlamat_negeri_peserta']->negeri_sembilan,
                        '6' => $c['matlamat_negeri_peserta']->pahang,
                        '7' => $c['matlamat_negeri_peserta']->perak,
                        '8' => $c['matlamat_negeri_peserta']->perlis,
                        '9' => $c['matlamat_negeri_peserta']->pulau_pinang,
                        '10' => $c['matlamat_negeri_peserta']->selangor,
                        '11' => $c['matlamat_negeri_peserta']->terengganu,
                        '12' => $c['matlamat_negeri_peserta']->sarawak,
                        '13' => $c['matlamat_negeri_peserta']->sabah,
                        '14' => $c['matlamat_negeri_peserta']->wpkl,
                    ];
                    $status = 'update';
                }
                $c['jumlah'] = array_sum($c['matlamat_negeri_peserta_cm']);
            }
            $tahun = $year;
            $jenis = [];
            $title = str_replace('_', ' ', $title);
            $jenis['name'] = ucwords($title);
            $jenis['val'] = $title;
            $jenis['sub'] = str_replace(' ', '_', $title);
            $title = strtoupper($title);

            return view('utiliti.matlamat_tahunan.peserta.edit_negeri', [
                'matlamat_tahunan' => $carian,
                'tahun' => $tahun,
                'jenis' => $jenis,
                'title' => $title,
                'carian' => $carian,
                'status' => $status
            ]);
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
            if ($c->matlamat_peserta == null) {
                $c['matlamat_peserta_cm'] = $bulan;
                if ($title == 'pusat_latihan') {
                    $status = 'update';
                } else {
                    $status = 'create';
                }
            } else {
                $c['matlamat_peserta_cm'] = [
                    '1' => $c['matlamat_peserta']->jan,
                    '2' => $c['matlamat_peserta']->feb,
                    '3' => $c['matlamat_peserta']->mac,
                    '4' => $c['matlamat_peserta']->apr,
                    '5' => $c['matlamat_peserta']->mei,
                    '6' => $c['matlamat_peserta']->jun,
                    '7' => $c['matlamat_peserta']->jul,
                    '8' => $c['matlamat_peserta']->ogos,
                    '9' => $c['matlamat_peserta']->sept,
                    '10' => $c['matlamat_peserta']->okt,
                    '11' => $c['matlamat_peserta']->nov,
                    '12' => $c['matlamat_peserta']->dis,
                ];
                $status = 'update';
            }
            $c['jumlah'] = array_sum($c['matlamat_peserta_cm']);
        }
        $tahun = $year;
        $jenis = [];
        $title = str_replace('_', ' ', $title);
        $jenis['name'] = ucwords($title);
        $jenis['val'] = $title;
        $jenis['sub'] = str_replace(' ', '_', $title);
        $title = strtoupper($title);

        return view('utiliti.matlamat_tahunan.peserta.edit', [
            'matlamat_tahunan' => $carian,
            'tahun' => $tahun,
            'jenis' => $jenis,
            'title' => $title,
            'carian' => $carian,
            'status' => $status
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
     * @param  \App\Http\Requests\StoreMatlamatTahunanPesertaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatlamatTahunanPesertaRequest $request)
    {
        // dd($request->bulan);

        if ($request->jenis == 'negeri') {

            $bulan = [
                '',
                'johor',
                'kedah',
                'kelantan',
                'melaka',
                'negeri_sembilan',
                'pahang',
                'perak',
                'perlis',
                'pulau_pinang',
                'selangor',
                'terengganu',
                'sarawak',
                'sabah',
                'wpkl',
            ];

            foreach ($request->title as $key => $r) {
                // dd($r, $key);
                $mt_peserta = new MatlamatTahunanNegeri();
                $mt_peserta->nama = $r;
                $mt_peserta->peserta_ref = $request->id_title[$key];
                $mt_peserta->jenis = 'peserta';

                foreach ($request->bulan[$key] as $l => $b) {
                    $mon = $bulan[$l];
                    $mt_peserta->$mon = $b;
                }
                $mt_peserta->save();
            }
        } else {

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
                $mt_peserta = new MatlamatTahunanPeserta();
                $mt_peserta->nama = $r;
                if ($request->jenis == 'bidang_kursus') {
                    $mt_peserta->bidang_ref = $request->id_title[$key];
                    $mt_peserta->jenis = 'bidang';
                } elseif ($request->jenis == 'kategori_kursus') {
                    $mt_peserta->kategori_ref = $request->id_title[$key];
                    $mt_peserta->jenis = 'kategori';
                } elseif ($request->jenis == 'tajuk_kursus') {
                    $mt_peserta->tajuk_ref = $request->id_title[$key];
                    $mt_peserta->jenis = 'tajuk';
                }

                foreach ($request->bulan[$key] as $l => $b) {
                    // dd($bulan[1]);
                    $mon = $bulan[$l];
                    $mt_peserta->$mon = $b;
                }
                $mt_peserta->save();
            }
        }



        alert()->success('Maklumat telah berjaya disimpan', 'Berjaya');
        return redirect('/utiliti/matlamat_tahunan/peserta');
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

    public function update_table(UpdateMatlamatTahunanPesertaRequest $request)
    {
        // dd($request);
        if ($request->jenis == 'negeri') {

            $bulan = [
                '',
                'johor',
                'kedah',
                'kelantan',
                'melaka',
                'negeri_sembilan',
                'pahang',
                'perak',
                'perlis',
                'pulau_pinang',
                'selangor',
                'terengganu',
                'sarawak',
                'sabah',
                'wpkl',
            ];

            foreach ($request->title as $key => $r) {
                // dd($r, $key);
                $id = $request->id_mt[$key];
                $mt_peserta = MatlamatTahunanNegeri::find($id);
                $mt_peserta->nama = $r;
                $mt_peserta->peserta_ref = $request->id_title[$key];
                $mt_peserta->jenis = 'peserta';

                foreach ($request->bulan[$key] as $l => $b) {
                    $mon = $bulan[$l];
                    $mt_peserta->$mon = $b;
                }
                $mt_peserta->save();
            }
        } else {

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
                // dd($request->id_title);
                $id = $request->id_mt[$key];
                $mt_peserta = MatlamatTahunanPeserta::find($id);
                $mt_peserta->nama = $r;
                foreach ($request->bulan[$key] as $l => $b) {
                    // dd($bulan[1]);
                    $mon = $bulan[$l];
                    $mt_peserta->$mon = $b;
                }
                $mt_peserta->save();
            }
        }

        alert()->success('Maklumat telah berjaya disimpan', 'Berjaya');
        return redirect('/utiliti/matlamat_tahunan/peserta');
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
