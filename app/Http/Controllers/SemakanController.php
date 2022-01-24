<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PekebunKecil;
use App\Models\Tanah;
use App\Models\Tanaman;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\PendaftaranPK;
use App\Models\Staf;
use App\Mail\PendaftaranStaf;

class SemakanController extends Controller
{
    public function check_espek(Request $request)
    {
        $nric = $request->nric;

        // testing
        if ($nric == '000000000001') {
            $data = [];
            return view('pendaftaran.staf', [
                'nric' => $nric
            ]);
        }

        // check staf
        $data_staf = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', 'f9d00dae5c6d6d549c306bae6e88222eb2f84307')
            ->get('https://www4.risda.gov.my/fire/getallstaff/')
            ->getBody()
            ->getContents();

        $data_staf = json_decode($data_staf, true);
        foreach ($data_staf as $key => $staf) {
            if ($staf['nokp'] == $nric) {

                // generate random password
                $length = 10;
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }

                // create staff
                $user = new User;
                $user->name = $staf['nama'];
                $user->email = 'applicantsppeps01@gmail.com'; #tukar email staf
                $user->password = Hash::make($randomString);
                $user->no_KP = $staf['nokp'];
                $user->jenis_pengguna = 'Staf';

                $user->save();

                $staf_d = new Staf;
                $staf_d->id_Pengguna = $user->id;
                $staf_d->nopekerja =  $staf['nopekerja'];
                $staf_d->GelaranJwtn =  $staf['GelaranJwtn'];
                $staf_d->Gred =  $staf['Gred'];
                $staf_d->Jawatan =  $staf['Jawatan'];
                $staf_d->Kod_PT =  $staf['Kod_PT'];
                $staf_d->NamaPT =  $staf['NamaPT'];
                $staf_d->Negeri =  $staf['Negeri'];
                $staf_d->NamaPA =  $staf['NamaPA'];
                $staf_d->NamaUnit =  $staf['NamaUnit'];
                $staf_d->StesenBertugas =  $staf['StesenBertugas'];
                $staf_d->notel =  $staf['notel'];

                $staf_d->save();

                $data_email= [
                    'password' => $randomString,
                    'email' => $user->email,
                    'nokp' => $user->no_KP,
                    'nama'=> $user->name
                ];
                $recipient = $user->email;
                Mail::send('emails.pendaftaran_staf', $data_email, function($message)use($recipient) {
                    $message->to($recipient)
                            ->subject("RISDA | e-LATIHAN - Pendaftaran Berjaya");
                });
                alert()->success('Sila semak email anda untuk notifikasi pendaftaran.', 'Pendaftaran Berjaya');
                return redirect('/');
            }
        }

        // check pekebun kecil
        $data_pk = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', '1cc11a9fec81dc1f99f353f403d6f5bac620aa8f')
            ->get('https://www4.risda.gov.my/espek/portalpkprofiltanah/?nokp=' . $nric)
            ->getBody()
            ->getContents();

        $data_pk = json_decode($data_pk, true);

        // check if not pk
        if (!empty($data_pk['message'])) {
            alert()->error('No. Kad Pengenalan tiada dalam pangkalan data e-SPEK');
            return back();
        } else {
            $data = $data_pk[0];
            return view('pendaftaran.pk', [
                'data' => $data
            ]);
        }
    }

    public function daftar_pengguna(Request $request)
    {
        if ($request->no_KP == '000000000001') {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->no_KP = $request->no_KP;
            $user->jenis_pengguna = 'Staf';

            $user->save();
            Mail::to($request->email)->send(new PendaftaranPK($user));
            alert()->success('Sila semak email anda untuk notifikasi pendaftaran.', 'Pendaftaran Berjaya');
            return redirect('/');
        } else {

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->no_KP = $request->no_KP;
            $user->jenis_pengguna = 'Pekebun Kecil';

            $user->save();

            // event(new Registered($user));

            $data_pk = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', '1cc11a9fec81dc1f99f353f403d6f5bac620aa8f')
                ->get('https://www4.risda.gov.my/espek/portalpkprofiltanah/?nokp=' . $request->no_KP)
                ->getBody()
                ->getContents();

            $data_pk = json_decode($data_pk, true);
            $data_pk = $data_pk[0];
            // dd($data_pk);

            $pk = new PekebunKecil;
            $pk->id_Pengguna = $user->id;
            $pk->Jantina_ID =  $data_pk['Jantina_ID'];
            $pk->Jantina =  $data_pk['Jantina'];
            $pk->Warganegara_ID =  $data_pk['Warganegara_ID'];
            $pk->Warganegara =  $data_pk['Warganegara'];
            $pk->Bangsa_ID =  $data_pk['U_Bangsa_ID'];
            $pk->Bangsa =  $data_pk['Bangsa'];
            $pk->Jalan =  $data_pk['Jalan'];
            $pk->Nama_Kampung =  $data_pk['Nama_Kampung'];
            $pk->Bandar =  $data_pk['Bandar'];
            $pk->Poskod =  $data_pk['Poskod'];
            $pk->U_Negeri_ID =  $data_pk['U_Negeri_ID'];
            $pk->Negeri =  $data_pk['Negeri'];
            $pk->U_Daerah_ID =  $data_pk['U_Daerah_ID'];
            $pk->Daerah =  $data_pk['Daerah'];
            $pk->U_Mukim_ID =  $data_pk['U_Mukim_ID'];
            $pk->Mukim =  $data_pk['Mukim'];
            $pk->U_Kampung_ID =  $data_pk['U_Kampung_ID'];
            $pk->Kampung =  $data_pk['Kampung'];
            $pk->U_Seksyen_ID =  $data_pk['U_Seksyen_ID'];
            $pk->Seksyen =  $data_pk['Seksyen'];
            $pk->Penempatan_ID =  $data_pk['Penempatan_ID'];
            $pk->Penempatan =  $data_pk['Penempatan'];
            $pk->Telefon =  $data_pk['Telefon'];

            $pk->save();

            $tanahs = $data_pk['Tanah'];
            foreach ($tanahs as $tanah) {
                // dd($tanah['No_Geran']);

                $d_tanah = new Tanah;
                $d_tanah->id_pekebun_kecil = $pk->id;
                $d_tanah->U_Tanah_ID = $tanah['U_Tanah_ID'];
                $d_tanah->No_Geran = $tanah['No_Geran'];
                $d_tanah->No_Lot = $tanah['No_Lot'];
                $d_tanah->U_SyaratT_ID = $tanah['U_SyaratT_ID'];
                $d_tanah->Syarat = $tanah['Syarat'];
                $d_tanah->U_Negeri_ID = $tanah['U_Negeri_ID'];
                $d_tanah->U_Daerah_ID = $tanah['U_Daerah_ID'];
                $d_tanah->U_Mukim_ID = $tanah['U_Mukim_ID'];
                $d_tanah->U_Seksyen_ID = $tanah['U_Seksyen_ID'];
                $d_tanah->U_Kampung_ID = $tanah['U_Kampung_ID'];
                $d_tanah->U_Parlimen_ID = $tanah['U_Parlimen_ID'];
                $d_tanah->U_Dun_ID = $tanah['U_Dun_ID'];
                $d_tanah->Luas_Lot = $tanah['Luas_Lot'];
                $d_tanah->Bahagian_Pemilikan = $tanah['Bahagian_Pemilikan'];
                $d_tanah->Luas_Pemilikan = $tanah['Luas_Pemilikan'];

                $d_tanah->save();

                $tanamans = $tanah['Tanaman'];
                foreach ($tanamans as $tanaman) {
                    $d_tanaman = new Tanaman;
                    $d_tanaman->id_tanah = $d_tanah->id;
                    $d_tanaman->Jenis_Tanaman = $tanaman['Jenis_Tanaman'];
                    $d_tanaman->Peratus_Tanaman = $tanaman['Peratus_Tanaman'];
                    $d_tanaman->Luas_Tanaman = $tanaman['Luas_Tanaman'];

                    $d_tanaman->save();
                }
            }

            Mail::to($request->email)->send(new PendaftaranPK($user));
            alert()->success('Sila semak email anda untuk notifikasi pendaftaran.', 'Pendaftaran Berjaya');
            return redirect('/');
        }
    }
}
