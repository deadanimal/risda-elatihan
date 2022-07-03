<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\KursusPenilaian;
use App\Models\JawapanPk;
use App\Models\JadualKursus;
use App\Models\Aturcara;
use App\Models\Agensi;
use App\Models\Permohonan;
use App\Models\JawapanMultiplePost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class KursusPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth::user()->jenis_pengguna=='Peserta ULPK') {
            $permohonan = Permohonan::with('jadual')->where('no_pekerja', auth()->user()->id)
            ->where('status_permohonan', 4)
            ->get()->first();

            return view('penilaian.penilaian-kursus-ulpk', [
                'permohonan'=>$permohonan
                // 'jadual_kursus'=>$jadual_kursus
            ]);
        } elseif (auth::user()->jenis_pengguna=='Urus Setia ULPK') {
            $jadual_kursus = JadualKursus::with('tempat')->where('kursus_unit_latihan', 'Pekebun Kecil')->get();

            return view('penilaian.kursus.index-ulpk', [
                'jadual_kursus'=>$jadual_kursus
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $jadual_kursus =JadualKursus::findOrFail($id);
        $aturcara = Aturcara::where('ac_jadual_kursus', $jadual_kursus->id)->get();

        // dd( $jadual_kursus );

        return view('penilaian.kursus.create', [
            'jadual_kursus'=>$jadual_kursus,
            'aturcara'=>$aturcara
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKursusPenilaianRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $kursusPenilaian = new KursusPenilaian;


        $kursusPenilaian->jadual_kursus_id= $request->jadual_kursus_id;
        $kursusPenilaian->bahagian="A";
        $kursusPenilaian->kategori_jawapan="C";
        $kursusPenilaian->kategori_soalan="Penilaian Setiap Slot Program";
        $kursusPenilaian->jawapan=$request->jawapan;
        $kursusPenilaian->jawapan_betul=$request->jawapan_betul;
        $kursusPenilaian->soalan=$request->soalan;
        $kursusPenilaian->status_soalan=$request->status_soalan;

        $kursusPenilaian->save();

        // $jawapanPK = new JawapanPk;
        // // $jawapanPk->kursus_penilaian_id = $request->jadual_kursus_id;
        // $jawapanPk->pilihanJawapan = $request->pilihanJawapan;

        // $jawapanPk->save();

        // KursusPenilaian::create([
        //     "jadual_kursus_id" =>$jadual_kursus_id,
        //     "bahagian" => "A",
        //     "kategori_jawapan"=>"Penilaian Setiap Slot Program",
        //     "kategori_soalan"=>$kategori_soalan,
        //     "jawapan"=>$jawapan,
        //     "soalan"=>$soalan,
        //     "status_soalan"=>$status_soalan

        // ]);

        // JawapanPk::create([
        //    "kursus_penilaian_id"=>$KursusPenilaian->id,
        //    "pilihanJawapan"=>$pilihanJawapan
        // ]);



        alert()->success('Soalan Telah Ditambah', 'Berjaya');
        return redirect('/penilaian/penilaian-kursus/ulpk/'.$kursusPenilaian->jadual_kursus_id);

        // switch ($request->jenis) {
        //     case 'A':
        //         KursusPenilaian::create([
        //             'jadual_kursus_id' => $request->jadual_kursus_id,
        //             'jenis_soalan' => "FILL IN THE BLANK",
        //             'soalan' => $request->soalan,
        //             'status' => $request->status_soalan,
        //             'jawapan' => $request->jawapanA,
        //         ]);
        //         break;
        //     case 'B':
        //         $post = KursusPenilaian::create([
        //             'jadual_kursus_id' => $request->jadual_kursus_id,
        //             'jenis_soalan' => "MULTIPLE CHOICE",
        //             'soalan' => $request->soalan,
        //             'status' => $request->status_soalan,
        //             'jawapan' => null,
        //         ]);
        //         foreach ($request->jawapanMultiple as $key => $jawapan) {
        //             $str = "check-" . $key;
        //             if ($request->$str) {
        //                 JawapanMultiplePost::create([
        //                     'post_test_id' => $post->id,
        //                     'jawapan' => $jawapan,
        //                     'yang_betul' => 'betul',
        //                 ]);
        //             } else {
        //                 JawapanMultiplePost::create([
        //                     'post_test_id' => $post->id,
        //                     'jawapan' => $jawapan,
        //                     'yang_betul' => 'salah',
        //                 ]);
        //             }
        //         }
        //         break;
        //     case 'C':
        //         $post = KursusPenilaian::create([
        //             'jadual_kursus_id' => $request->jadual_kursus_id,
        //             'jenis_soalan' => "SINGLE CHOICE",
        //             'soalan' => $request->soalan,
        //             'status_soalan' => $request->status_soalan,
        //             'jawapan' => null,

        //         ]);
        //         foreach ($request->jawapanMultiple as $key => $jawapan) {
        //             $str = "check-" . $key;
        //             if ($request->$str) {
        //                 JawapanPk::create([
        //                     'post_test_id' => $post->id,
        //                     'jawapan' => $jawapan,
        //                     'yang_betul' => 'betul',
        //                 ]);
        //             } else {
        //                 JawapanMultiplePost::create([
        //                     'post_test_id' => $post->id,
        //                     'jawapan' => $jawapan,
        //                     'yang_betul' => 'salah',
        //                 ]);
        //             }
        //         }
        //         break;
        //     case 'D':
        //         KursusPenilaian::create([
        //             'jadual_kursus_id' => $request->jadual_kursus_id,
        //             'jenis_soalan' => "TRUE OR FALSE",
        //             'soalan' => $request->soalan,
        //             'status' => $request->status_soalan,
        //             'jawapan' => $request->jawapanD,
        //         ]);
        //         break;
        //     default:
        //         return abort(404);
        //         break;
        // }

        // alert()->success('SOALAN POST TEST TELAH DISIMPAN', 'BERJAYA');
        // return redirect(route('post-test.index', $request->jadual_kursus_id));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KursusPenilaian  $kursusPenilaian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadual_kursus = JadualKursus::find($id);
        $penilaianKursus = KursusPenilaian::where('jadual_kursus_id', $jadual_kursus->id)->get();
        $aturcara = Aturcara::where('ac_jadual_kursus', $jadual_kursus->id)->get()->first();
        $agensi = Agensi::where('id', $jadual_kursus->kursus_tempat)->first();

        return view('penilaian.kursus.bahagianA', [
            'jadual_kursus' => $jadual_kursus,
            'nama_kursus' => $jadual_kursus->kursus_nama,
            'agensi'=>$agensi,
            'aturcara'=>$aturcara,
            'penilaianKursus'=>$penilaianKursus
        ]);
    }


    public function bahagianB($id)
    {
        $jadual_kursus = JadualKursus::find($id);
        $agensi = Agensi::where('id', $jadual_kursus->kursus_tempat)->first();


        return view('penilaian.kursus.bahagianB', [
            'jadual_kursus' => $jadual_kursus,
            'nama_kursus' => $jadual_kursus->kursus_nama,
            'agensi'=>$agensi

        ]);
    }

    public function bahagianC($id)
    {
        $jadual_kursus = JadualKursus::find($id);
        $agensi = Agensi::where('id', $jadual_kursus->kursus_tempat)->first();


        return view('penilaian.kursus.bahagianC', [
            'jadual_kursus' => $jadual_kursus,
            'nama_kursus' => $jadual_kursus->kursus_nama,
            'agensi'=>$agensi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KursusPenilaian  $kursusPenilaian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penilaiankursus = KursusPenilaian::find($id);

        // $jadual_kursus =JadualKursus::where('id',$penilaiankursus->jadual_kursus_id)->get()->first();



        return view('penilaian.kursus.edit', [
        // 'jadual_kursus'=>$jadual_kursus,
        'penilaiankursus'=>$penilaiankursus
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKursusPenilaianRequest  $request
     * @param  \App\Models\KursusPenilaian  $kursusPenilaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kursusPenilaian = KursusPenilaian::find($id);

        $kursusPenilaian->jadual_kursus_id= $request->jadual_kursus_id;
        $kursusPenilaian->bahagian="A";
        $kursusPenilaian->kategori_jawapan=$request->kategori_jawapan;
        $kursusPenilaian->kategori_soalan=$request->kategori_soalan;
        $kursusPenilaian->jawapan=$request->jawapan;
        $kursusPenilaian->status_soalan=$request->status_soalan;

        if ($request->kategori_jawapan == 'C') {
            foreach ($kursusPenilaian->multiple as $jawapanM) {
                $jawapanM->update([
                    'yang_betul' => 'salah',
                ]);
            }
            JawapanMultiplePost::find($request->checkbetul)->update([
                'yang_betul' => 'betul',
            ]);
            foreach ($request->jawapanMultiple as $key => $jm) {
                JawapanMultiplePost::find($key)->update([
                    'jawapan' => $jm,
                ]);
            }
        }

        $kursusPenilaian->save();
        alert()->success('Soalan Telah Dikemaskini', 'Berjaya');
        return redirect('/penilaian/penilaian-kursus/ulpk/'.$kursusPenilaian->jadual_kursus_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KursusPenilaian  $kursusPenilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $kursusPenilaian = KursusPenilaian::where('id',$id)->first();
        $kursusPenilaian->delete();
        alert()->success('Soalan Telah Dihapus', 'Berjaya');

        return redirect()->back();

    }

    // public function jawab_penilaian(KursusPenilaian $kursusPenilaian)
    // {
    //     return view ()
    // }
}
