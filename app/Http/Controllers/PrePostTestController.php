<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrePostTestRequest;
use App\Http\Requests\UpdatePrePostTestRequest;
use App\Models\JadualKursus;
use App\Models\JawapanMultiple;
use App\Models\JawapanPenilaian;
use App\Models\Permohonan;
use App\Models\PrePostTest;
use Illuminate\Http\Request;
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
        $permohonan = Permohonan::with('jadualKursus')->where('no_pekerja', auth()->user()->id)
            ->where('status_permohonan', 4)
            ->where('dinilai_pre', null)->get()->first();
        // dd($permohonan);
        if ($permohonan == null) {
            alert()->error('Anda tidak membuat sebarang permohonan lagi.', 'Tiada permohonan');
            return back();
        } else {
            return view('penilaian.pre-post.answer', [
                'permohonan' => $permohonan,
            ]);
        }
    }

    public function mulaPenilaian(JadualKursus $jadual_kursus)
    {
        return view('penilaian.pre-post.answer2', [
            'jadual_kursus' => $jadual_kursus,
        ]);
    }

    public function simpanPenilaian(Request $request)
    {
        $jadual_kursus = JadualKursus::findorFail($request->jadual_kursus_id);

        $markah = 0;

        foreach ($jadual_kursus->preposttest as $ppt) {

            foreach ($request->jawapan as $key => $jawapan) {

                if ($ppt->id == $key) {

                    if ($ppt->jenis_soalan == "FILL IN THE BLANK") {
                        if ($ppt->jawapan == $jawapan) {
                            $markah++;
                        }
                    }
                    if ($ppt->jenis_soalan == "MULTIPLE CHOICE") {
                        $multiple_true = 0;
                        $mul[$ppt->id] = true;

                        foreach ($ppt->multiple as $m) {
                            if ($m->yang_betul == 'betul') {
                                $multiple_true++;
                            }
                        }
                        foreach ($jawapan as $j) {
                            if ($j == "salah") {
                                $mul[$ppt->id] = false;
                            }
                        }
                        if (count($jawapan) < $multiple_true) {
                            $mul[$ppt->id] = false;
                        }
                    }
                    if ($ppt->jenis_soalan == "SINGLE CHOICE") {
                        if ($jawapan == 'betul') {
                            $markah++;
                        }
                    }
                    if ($ppt->jenis_soalan == "TRUE OR FALSE") {
                        if ($jawapan == $ppt->jawapan) {
                            $markah++;
                        }
                    }
                }
            }
        }

        if (isset($mul)) {
            foreach ($mul as $m) {
                if ($m) {
                    $markah++;
                }
            }
        }

        $total = count($jadual_kursus->preposttest);

        $newMarkah = ($markah / $total) * 100;

        JawapanPenilaian::create([
            'jadual_kursus_id' => $jadual_kursus->id,
            'user_id' => auth()->user()->id,
            'markah' => $newMarkah,
        ]);

        $permohonan = Permohonan::where('kod_kursus', $request->jadual_kursus_id)->first();
        $permohonan->update([
            'dinilai_pre' => 'Ya',
        ]);

        alert()->success('Selesai Menjawab Penilaian : Markah anda ' . $newMarkah . "%");
        return redirect()->route('dashboard');
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
                    'jenis_soalan' => "MULTIPLE CHOICE",
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
                    'jenis_soalan' => "SINGLE CHOICE",
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
        alert()->success('SOALAN PRE TEST TELAH DISIMPAN', 'BERJAYA');
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
    public function edit(PrePostTest $pre_post_test)
    {
        return view('penilaian.pre-post.edit', [
            'prepost' => $pre_post_test,
        ]);
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
        DB::table('jawapan_multiple')->where('soalan_id', $prePostTest->id)->delete();
        $prePostTest->delete();
        return back();
    }
}
