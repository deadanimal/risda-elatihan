<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrePostTestRequest;
use App\Http\Requests\UpdatePrePostTestRequest;
use App\Models\JadualKursus;
use App\Models\Permohonan;
use App\Models\PrePostTest;
use Illuminate\Support\Facades\DB;

class PrePostTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('penilaian.pre-post.index', [
            'jadual_kursus' => JadualKursus::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createPrePost(JadualKursus $jadual_kursus)
    {
        return view('penilaian.pre-post.create', [
            'jk_id' => $jadual_kursus->id,
        ]);

    }

    public function jawabPrePost()
    {
        $permohonan = Permohonan::where('no_pekerja', auth()->user()->id)->firstorFail();

        return view('penilaian.pre-post.answer', [
            'jadual_kursus' => JadualKursus::where('kod_kursus', $permohonan->kod_kursus)->first(),
        ]);
    }

    public function mulaPenilaian(JadualKursus $jadual_kursus)
    {
        return view('penilaian.pre-post.answer2', [
            'jadual_kursus' => $jadual_kursus,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePrePostTestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrePostTestRequest $request)
    {

        switch ($request->jenis) {
            case 'A':
                PrePostTest::create([
                    'jadual_kursus_id' => $request->jadual_kursus_id,
                    'jenis_soalan' => "FILL IN THE BLANK",
                    'soalan' => $request->soalan,
                    'status' => $request->status_soalan,
                    'jawapan' => $request->jawapanA,
                ]);
                break;
            case 'B':
                $pre = PrePostTest::create([
                    'jadual_kursus_id' => $request->jadual_kursus_id,
                    'jenis_soalan' => "MULTIPLE CHOISE",
                    'soalan' => $request->soalan,
                    'status' => $request->status_soalan,
                    'jawapan' => null,
                ]);
                foreach ($request->jawapanMultiple as $key => $jawapan) {
                    $str = "check-" . $key;
                    if ($request->$str) {
                        DB::table('jawapan_multiple')->insert([
                            'soalan_id' => $pre->id,
                            'jawapan' => $jawapan,
                            'yang_betul' => 'betul',
                        ]);
                    } else {
                        DB::table('jawapan_multiple')->insert([
                            'soalan_id' => $pre->id,
                            'jawapan' => $jawapan,
                            'yang_betul' => 'salah',
                        ]);
                    }
                }
                break;
            case 'C':
                $pre = PrePostTest::create([
                    'jadual_kursus_id' => $request->jadual_kursus_id,
                    'jenis_soalan' => "SINGLE CHOISE",
                    'soalan' => $request->soalan,
                    'status' => $request->status_soalan,
                    'jawapan' => null,
                ]);
                foreach ($request->jawapanMultiple as $key => $jawapan) {
                    $str = "check-" . $key;
                    if ($request->$str) {
                        DB::table('jawapan_multiple')->insert([
                            'soalan_id' => $pre->id,
                            'jawapan' => $jawapan,
                            'yang_betul' => 'betul',
                        ]);
                    } else {
                        DB::table('jawapan_multiple')->insert([
                            'soalan_id' => $pre->id,
                            'jawapan' => $jawapan,
                            'yang_betul' => 'salah',
                        ]);
                    }
                }
                break;
            case 'D':
                PrePostTest::create([
                    'jadual_kursus_id' => $request->jadual_kursus_id,
                    'jenis_soalan' => "TRUE OR FALSE",
                    'soalan' => $request->soalan,
                    'status' => $request->status_soalan,
                    'jawapan' => $request->jawapanD,
                ]);
                break;
            default:
                return abort(404);
                break;
        }

        alert()->success('SOALAN PRE TEST / POST TEST KURSUS TELAH BERJAYA DISIMPAN', 'Berjaya');
        return redirect(route('pre-post-test.show', $request->jadual_kursus_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrePostTest  $prePostTest
     * @return \Illuminate\Http\Response
     */
    public function show(JadualKursus $pre_post_test)
    {
        $jadualkursus = $pre_post_test;
        return view('penilaian.pre-post.show-main', [
            'jadual_kursus' => $jadualkursus,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrePostTest  $prePostTest
     * @return \Illuminate\Http\Response
     */
    public function edit(PrePostTest $prePostTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePrePostTestRequest  $request
     * @param  \App\Models\PrePostTest  $prePostTest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrePostTestRequest $request, PrePostTest $prePostTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrePostTest  $prePostTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrePostTest $prePostTest)
    {
        $prePostTest->delete();
        return back();
    }
}
