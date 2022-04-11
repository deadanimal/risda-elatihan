<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMatlamatBilanganKursusRequest;
use App\Http\Requests\UpdateMatlamatBilanganKursusRequest;
use App\Models\BidangKursus;
use App\Models\KategoriKursus;
use App\Models\KodKursus;
use App\Models\MatlamatBilanganKursus;
use Illuminate\Http\Request;

class MatlamatBilanganKursusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('utiliti.matlamat_tahunan.kursus.index', [
            'matlamat_tahunan' => MatlamatBilanganKursus::all()
        ]);
    }

    public function carian(Request $request)
    {
        if ($request->jenis_m == 'bidang kursus') {
            $carian = BidangKursus::with('matlamat_kursus')->whereYear('created_at', $request->tahun)->get();
        } elseif($request->jenis_m == 'kategori kursus') {
            $carian = KategoriKursus::whereYear('created_at', $request->tahun)->get();
        }elseif($request->jenis_m == 'tajuk kursus'){
            $carian = KodKursus::whereYear('created_at', $request->tahun)
                ->get();
        }

        $bulan = [
            '1'=> 0,
            '2'=> 0,
            '3'=> 0,
            '4'=> 0,
            '5'=>0,
            '6'=>0,
            '7'=>0,
            '8'=>0,
            '9'=>0,
            '10'=>0,
            '11'=>0,
            '12'=>0,
        ];
        foreach ($carian as $key => $c) {
            if ($c->matlamat_kursus == null) {
                $c['matlamat_kursus_cm'] = $bulan;
            }else{
                $c['matlamat_kursus_cm'] = [
                    '1'=> $c['matlamat_kursus']->jan,
                    '2'=> $c['matlamat_kursus']->feb,
                    '3'=> $c['matlamat_kursus']->mac,
                    '4'=> $c['matlamat_kursus']->apr,
                    '5'=> $c['matlamat_kursus']->mei,
                    '6'=> $c['matlamat_kursus']->jun,
                    '7'=> $c['matlamat_kursus']->jul,
                    '8'=> $c['matlamat_kursus']->ogos,
                    '9'=> $c['matlamat_kursus']->sept,
                    '10'=> $c['matlamat_kursus']->okt,
                    '11'=> $c['matlamat_kursus']->nov,
                    '12'=> $c['matlamat_kursus']->dis,
                ];
            }
            // dd($c['matlamat_kursus_cm']);
            $c['jumlah'] = array_sum($c['matlamat_kursus_cm']);
        }

        // dd($carian[0]->matlamat_kursus_cm);

        $tahun = $request->tahun;
        $jenis =[];
        $jenis['name'] = ucwords($request->jenis_m);
        $jenis['val'] = $request->jenis_m;
        $jenis['sub'] = str_replace(' ','_',$request->jenis_m);
        // dd($jenis);
        $title = strtoupper($request->jenis_m);

        // dd($carian);
        return view('utiliti.matlamat_tahunan.kursus.carian',[
            'matlamat_tahunan'=>$carian,
            'tahun'=>$tahun,
            'jenis'=>$jenis,
            'title'=>$title,
            'carian'=>$carian
        ]);
    }

    public function kemaskini($title, $year)
    {
        if ($title == 'bidang_kursus') {
            $carian = BidangKursus::with('matlamat_kursus')->whereYear('created_at', $year)->get();
        } elseif($title == 'kategori_kursus') {
            $carian = KategoriKursus::whereYear('created_at', $year)->get();
        }elseif($title == 'tajuk_kursus'){
            $carian = KodKursus::whereYear('created_at', $year)
                ->get();
        }

        $bulan = [
            '1'=> 0,
            '2'=> 0,
            '3'=> 0,
            '4'=> 0,
            '5'=>0,
            '6'=>0,
            '7'=>0,
            '8'=>0,
            '9'=>0,
            '10'=>0,
            '11'=>0,
            '12'=>0,
        ];
        foreach ($carian as $key => $c) {
            if ($c->matlamat_kursus == null) {
                $c['matlamat_kursus_cm'] = $bulan;
                $status = 'create';
            }else{
                $c['matlamat_kursus_cm'] = [
                    '1'=> $c['matlamat_kursus']->jan,
                    '2'=> $c['matlamat_kursus']->feb,
                    '3'=> $c['matlamat_kursus']->mac,
                    '4'=> $c['matlamat_kursus']->apr,
                    '5'=> $c['matlamat_kursus']->mei,
                    '6'=> $c['matlamat_kursus']->jun,
                    '7'=> $c['matlamat_kursus']->jul,
                    '8'=> $c['matlamat_kursus']->ogos,
                    '9'=> $c['matlamat_kursus']->sept,
                    '10'=> $c['matlamat_kursus']->okt,
                    '11'=> $c['matlamat_kursus']->nov,
                    '12'=> $c['matlamat_kursus']->dis,
                ];
                $status = 'update';
            }
            $c['jumlah'] = array_sum($c['matlamat_kursus_cm']);
        }

        $tahun = $year;
        $jenis =[];
        $title = str_replace('_',' ',$title);
        $jenis['name'] = ucwords($title);
        $jenis['val'] = $title;
        $jenis['sub'] = str_replace(' ','_',$title);
        $title = strtoupper($title);

        return view('utiliti.matlamat_tahunan.kursus.edit',[
            'matlamat_tahunan'=>$carian,
            'tahun'=>$tahun,
            'jenis'=>$jenis,
            'title'=>$title,
            'carian'=>$carian,
            'status'=>$status
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
     * @param  \App\Http\Requests\StoreMatlamatBilanganKursusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatlamatBilanganKursusRequest $request)
    {
        // dd($request->bulan);
        $bulan=[
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
            $mt_kursus = new MatlamatBilanganKursus;
            $mt_kursus->bidang = $r;
            foreach ($request->bulan[$key] as $l => $b) {
                // dd($bulan[1]);
                $mon = $bulan[$l];
                $mt_kursus->$mon = $b;
            }
             $mt_kursus->save();
        }
        
        alert()->success('Maklumat telah berjaya disimpan', 'Berjaya');
        return redirect('/utiliti/matlamat_tahunan/kursus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MatlamatBilanganKursus  $matlamatBilanganKursus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MatlamatBilanganKursus  $matlamatBilanganKursus
     * @return \Illuminate\Http\Response
     */
    public function edit(MatlamatBilanganKursus $matlamatBilanganKursus)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMatlamatBilanganKursusRequest  $request
     * @param  \App\Models\MatlamatBilanganKursus  $matlamatBilanganKursus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMatlamatBilanganKursusRequest $request, MatlamatBilanganKursus $matlamatBilanganKursus)
    {
        //
    }

    public function update_table(UpdateMatlamatBilanganKursusRequest $request)
    {
        $bulan=[
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
            $mt_kursus = MatlamatBilanganKursus::where('bidang', $r)->first();
            $mt_kursus->bidang = $r;
            foreach ($request->bulan[$key] as $l => $b) {
                // dd($bulan[1]);
                $mon = $bulan[$l];
                $mt_kursus->$mon = $b;
            }
             $mt_kursus->save();
        }
        
        alert()->success('Maklumat telah berjaya dikemaskini', 'Berjaya');
        return redirect('/utiliti/matlamat_tahunan/kursus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MatlamatBilanganKursus  $matlamatBilanganKursus
     * @return \Illuminate\Http\Response
     */
    public function destroy(MatlamatBilanganKursus $matlamatBilanganKursus)
    {
        //
    }
}
