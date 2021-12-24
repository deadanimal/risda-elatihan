<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SemakanController extends Controller
{
    public function check_espek(Request $request)
    {
        $nric = $request->nric;

        $data_pk = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', '1cc11a9fec81dc1f99f353f403d6f5bac620aa8f')
            ->get('https://www4.risda.gov.my/espek/portalpkprofiltanah/?nokp=' . $nric)
            ->getBody()
            ->getContents();

        $data_pk = json_decode($data_pk, true);

        // check if not pk
        if (!empty($data_pk['message'])) {
            // echo '<script>alert("Maaf, No. Kad Pengenalan tiada dalam pangkalan data e-SPEK")</script>';
            return redirect('/register')->with('success', 'Tahniah, anda selesai menjawab soalan pengetahuan. Sila jawab soalan kemahiran.');;
        } else {
            $data = $data_pk[0];
            // dd($data);
            return view('pendaftaran.pk', [
                'data'=>$data
            ]);
        }
    }
}
