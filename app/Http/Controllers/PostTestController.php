<?php

namespace App\Http\Controllers;

use App\Models\JadualKursus;
use App\Models\JawapanMultiplePost;
use App\Models\JawapanPenilaian;
use App\Models\Permohonan;
use App\Models\PostTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostTestController extends Controller
{
    public function index($id)
    {
        $jadual_kursus = JadualKursus::where('id', $id)->first();

        return view('penilaian.post.index', [
            'jadual_kursus' => $jadual_kursus,
        ]);
    }

    public function create($id)
    {
        return view('penilaian.post.create', [
            'jk_id' => $id
        ]);
    }

    public function store(Request $request)
    {

        switch ($request->jenis) {
            case 'A':
                PostTest::create([
                    'jadual_kursus_id' => $request->jadual_kursus_id,
                    'jenis_soalan' => "FILL IN THE BLANK",
                    'soalan' => $request->soalan,
                    'status' => $request->status_soalan,
                    'jawapan' => $request->jawapanA,
                ]);
                break;
            case 'B':
                $post = PostTest::create([
                    'jadual_kursus_id' => $request->jadual_kursus_id,
                    'jenis_soalan' => "MULTIPLE CHOICE",
                    'soalan' => $request->soalan,
                    'status' => $request->status_soalan,
                    'jawapan' => null,
                ]);
                foreach ($request->jawapanMultiple as $key => $jawapan) {
                    $str = "check-" . $key;
                    if ($request->$str) {
                        JawapanMultiplePost::create([
                            'post_test_id' => $post->id,
                            'jawapan' => $jawapan,
                            'yang_betul' => 'betul',
                        ]);
                    } else {
                        JawapanMultiplePost::create([
                            'post_test_id' => $post->id,
                            'jawapan' => $jawapan,
                            'yang_betul' => 'salah',
                        ]);
                    }
                }
                break;
            case 'C':
                $post = PostTest::create([
                    'jadual_kursus_id' => $request->jadual_kursus_id,
                    'jenis_soalan' => "SINGLE CHOICE",
                    'soalan' => $request->soalan,
                    'status' => $request->status_soalan,
                    'jawapan' => null,
                ]);
                foreach ($request->jawapanMultiple as $key => $jawapan) {
                    $str = "check-" . $key;
                    if ($request->$str) {
                        JawapanMultiplePost::create([
                            'post_test_id' => $post->id,
                            'jawapan' => $jawapan,
                            'yang_betul' => 'betul',
                        ]);
                    } else {
                        JawapanMultiplePost::create([
                            'post_test_id' => $post->id,
                            'jawapan' => $jawapan,
                            'yang_betul' => 'salah',
                        ]);
                    }
                }
                break;
            case 'D':
                PostTest::create([
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

        alert()->success('SOALAN POST TEST TELAH DISIMPAN', 'BERJAYA');
        return redirect(route('post-test.index', $request->jadual_kursus_id));
    }

    public function destroy(PostTest $postTest)
    {
        DB::table('jawapan_multiple_post')->where('post_test_id', $postTest->id)->delete();
        $postTest->delete();
        return back();
    }

    public function edit(PostTest $postTest) {

        return view('penilaian.post.edit', [
            'prepost' => $postTest,
        ]);
    }

    public function update(Request $request, PostTest $postTest) {
        $postTest->soalan = $request->soalan;
        $postTest->status = $request->status;
        if ($request->jenis_soalan == 'FILL IN THE BLANK') {
            $postTest->jawapan = $request->jawapanA;
        } elseif ($request->jenis_soalan == 'MULTIPLE CHOICE') {
            foreach ($postTest->multiple as $jawapanM) {
                $jawapanM->update([
                    'yang_betul' => 'salah',
                ]);
            }
            foreach ($request->checkbetul as $key => $jm) {
                JawapanMultiplePost::find($key)->update([
                    'yang_betul' => 'betul',
                ]);
            }
            foreach ($request->jawapanMultiple as $key => $jm) {
                JawapanMultiplePost::find($key)->update([
                    'jawapan' => $jm,
                ]);
            }
        } elseif ($request->jenis_soalan == 'SINGLE CHOICE') {
            foreach ($postTest->multiple as $jawapanM) {
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
        } else {
            $postTest->jawapan = $request->jawapanD;
        }
        // dd($postTest);
        $postTest->save();
        alert()->success('SOALAN PRE TEST TELAH DIKEMASKINI', 'BERJAYA');
        return redirect('/penilaian/post-test/' . $postTest->jadual_kursus_id);
    }

    public function jawabPost()
    {
        $permohonan = Permohonan::with('jadualKursus')->where('no_pekerja', auth()->user()->id)
            ->where('status_permohonan', 4)
            ->where('dinilai_post', null)->get()->first();
        // dd($permohonan);
        if ($permohonan == null) {
            alert()->error('Anda tidak membuat sebarang permohonan lagi.', 'Tiada permohonan');
            return back();
        } else {
            return view('penilaian.post.answer', [
                'permohonan' => $permohonan,
            ]);
        }
    }

    public function mulaPenilaianPost(JadualKursus $jadual_kursus)
    {
        // $jadual_kursus = PostTest::where('jadual_kursus_id', $id)->get();
        // dd($jadual_kursus);
        return view('penilaian.post.answer2', [
            'jadual_kursus' => $jadual_kursus,
        ]);
    }

    public function simpanPenilaianPost(Request $request)
    {
        $jadual_kursus = JadualKursus::findorFail($request->jadual_kursus_id);

        $markah = 0;

        foreach ($jadual_kursus->posttest as $pt) {

            foreach ($request->jawapan as $key => $jawapan) {

                if ($pt->id == $key) {

                    if ($pt->jenis_soalan == "FILL IN THE BLANK") {
                        if ($pt->jawapan == $jawapan) {
                            $markah++;
                        }
                    }
                    if ($pt->jenis_soalan == "MULTIPLE CHOICE") {
                        $multiple_true = 0;
                        $mul[$pt->id] = true;

                        foreach ($pt->multiple as $m) {
                            if ($m->yang_betul == 'betul') {
                                $multiple_true++;
                            }
                        }
                        foreach ($jawapan as $j) {
                            if ($j == "salah") {
                                $mul[$pt->id] = false;
                            }
                        }
                        if (count($jawapan) < $multiple_true) {
                            $mul[$pt->id] = false;
                        }
                    }
                    if ($pt->jenis_soalan == "SINGLE CHOICE") {
                        if ($jawapan == 'betul') {
                            $markah++;
                        }
                    }
                    if ($pt->jenis_soalan == "TRUE OR FALSE") {
                        if ($jawapan == $pt->jawapan) {
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

        $total = count($jadual_kursus->posttest);

        $newMarkah = ($markah / $total) * 100;

        JawapanPenilaian::create([
            'jadual_kursus_id' => $jadual_kursus->id,
            'user_id' => auth()->user()->id,
            'markah' => $newMarkah,
        ]);

        $permohonan = Permohonan::where('kod_kursus', $request->jadual_kursus_id)->first();
        $permohonan->update([
            'dinilai_post' => 'Ya',
        ]);

        alert()->success('Selesai Menjawab Penilaian : Markah anda ' . $newMarkah . "%");
        return redirect()->route('dashboard');
    }
}
