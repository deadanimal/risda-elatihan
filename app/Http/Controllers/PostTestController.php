<?php

namespace App\Http\Controllers;

use App\Models\JadualKursus;
use App\Models\PostTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostTestController extends Controller
{
    public function index(JadualKursus $jadualKursus)
    {
        return view('penilaian.post.index', [
            'jadual_kursus' => $jadualKursus,
        ]);
    }

    public function create(JadualKursus $jadualKursus)
    {
        return view('penilaian.post.create', [
            'jadual_kursus' => $jadualKursus,
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
                        DB::table('jawapan_multiple_post')->insert([
                            'post_test_id' => $post->id,
                            'jawapan' => $jawapan,
                            'yang_betul' => 'betul',
                        ]);
                    } else {
                        DB::table('jawapan_multiple_post')->insert([
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
                        DB::table('jawapan_multiple_post')->insert([
                            'post_test_id' => $post->id,
                            'jawapan' => $jawapan,
                            'yang_betul' => 'betul',
                        ]);
                    } else {
                        DB::table('jawapan_multiple_post')->insert([
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
        DB::table('jawapan_multiple')->where('soalan_id', $postTest->id)->delete();
        $postTest->delete();
        return back();
    }
}
