<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\PendaftaranEP;
use App\Mail\PendaftaranPK;
use App\Models\GAP;
use App\Models\PekebunKecil;
use App\Models\Staf;
use App\Models\Tanah;
use App\Models\Tanaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class SemakanController extends Controller
{
    public function check_espek(Request $request)
    {
        $nric = $request->nric;
        $check_nric = User::where('no_KP', $nric)->first();

        if ($check_nric != null) {
            alert()->info('Nombor kad pengenalan ini telah didaftarkan', 'Semakan Gagal');
            return back();
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
                $user->email = $staf['email']; #tukar email staf
                $user->password = Hash::make('pnsb1234');
                $user->no_KP = $staf['nokp'];
                $user->jenis_pengguna = 'Peserta ULS';
                $user->assignRole('Peserta ULS');
                $user->status_akaun = '1';

                $user->save();

                $data_email = [
                    'password' => $randomString,
                    'email' => $user->email,
                    'nokp' => $user->no_KP,
                    'nama' => $user->name,
                ];
                $recipient = 'applicantsppeps01@gmail.com';
                Mail::send('emails.pendaftaran_staf', $data_email, function ($message) use ($recipient) {
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
            alert()->info('No. Kad Pengenalan anda tiada dalam sistem HRIP.')->persistent('Tutup');
            return back();
        } else {
            $data = $data_pk[0];
            // dd($data);
            return view('pendaftaran.pk', [
                'data' => $data,
            ]);
        }
    }

    public function daftar_pengguna(Request $request)
    {
        $check_pengguna = User::where('email', $request->email)->first();
        if ($check_pengguna != null) {
            alert()->info('Email ini telah didaftarkan', 'Pendaftaran Gagal');
            return redirect('/register');
        }
        if ($request->jenis_pengguna == 'ejen_pelaksana') {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->no_KP = $request->no_KP;
            $user->jenis_pengguna = 'Ejen Pelaksana';
            $user->assignRole('Ejen Pelaksana');
            $user->status_akaun = '1';

            $user->save();
            Mail::to($request->email)->send(new PendaftaranEP($user));
            alert()->success('Sila semak email anda untuk notifikasi pendaftaran.', 'Pendaftaran Berjaya');
            return redirect('/');
        } else {
            $user = new User;
            $user->login_type = $request->login_type;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->no_KP = $request->no_KP;
            $user->jenis_pengguna = 'Peserta ULPK';
            $user->assignRole('Peserta ULPK');
            $user->status_akaun = '1';

            $user->save();

            // save data pekebun kecil from api
            $data_pk = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', '1cc11a9fec81dc1f99f353f403d6f5bac620aa8f')
                ->get('https://www4.risda.gov.my/espek/portalpkprofiltanah/?nokp=' . $request->no_KP)
                ->getBody()
                ->getContents();

            $data_pk = json_decode($data_pk, true);
            $data = $data_pk[0];

            $pk = new PekebunKecil;
            $pk->id_Pengguna = $user->id;
            $pk->Jantina_ID = $data['Jantina_ID'];
            $pk->Jantina = $data['Jantina'];
            $pk->Warganegara_ID = $data['Warganegara_ID'];
            $pk->Warganegara = $data['Warganegara'];
            $pk->Bangsa_ID = $data['U_Bangsa_ID'];
            $pk->Bangsa = $data['Bangsa'];
            $pk->Nombor = $data['Nombor'];
            $pk->Jalan = $data['Jalan'];
            $pk->Nama_Kampung = $data['Nama_Kampung'];
            $pk->Bandar = $data['Bandar'];
            $pk->Poskod = $data['Poskod'];
            $pk->U_Negeri_ID = $data['U_Negeri_ID'];
            $pk->Negeri = $data['Negeri'];
            $pk->U_Daerah_ID = $data['U_Daerah_ID'];
            $pk->Daerah = $data['Daerah'];
            $pk->U_Mukim_ID = $data['U_Mukim_ID'];
            $pk->Mukim = $data['Mukim'];
            $pk->U_Kampung_ID = $data['U_Kampung_ID'];
            $pk->Kampung = $data['Kampung'];
            $pk->U_Seksyen_ID = $data['U_Seksyen_ID'];
            $pk->Seksyen = $data['Seksyen'];
            $pk->Penempatan_ID = $data['Penempatan_ID'];
            $pk->Penempatan = $data['Penempatan'];
            $pk->Telefon = $data['Telefon'];
            $pk->U_Parlimen_ID = $data['U_Parlimen_ID'];
            $pk->Parlimen = $data['Parlimen'];
            $pk->U_Dun_ID = $data['U_Dun_ID'];
            $pk->Dun = $data['Dun'];
            $pk->Kod_PT_Lokaliti = $data['Kod_PT_Lokaliti'];
            $pk->Pusat_Tanggungjawab_Lokaliti = $data['Pusat_Tanggungjawab_Lokaliti'];

            $pk->save();

            // save data pekebun kecil from api
            foreach ($data['Tanah'] as $key => $dtanah) {
                $tanah = new Tanah;
                $tanah->id_pekebun_kecil = $pk->id;
                $tanah->U_Tanah_ID = $dtanah['U_Tanah_ID'];
                $tanah->No_Geran = $dtanah['No_Geran'];
                $tanah->No_Lot = $dtanah['No_Lot'];
                $tanah->U_SyaratT_ID = $dtanah['U_SyaratT_ID'];
                $tanah->Syarat = $dtanah['Syarat'];
                $tanah->U_Negeri_ID = $dtanah['U_Negeri_ID'];
                $tanah->U_Daerah_ID = $dtanah['U_Daerah_ID'];
                $tanah->U_Mukim_ID = $dtanah['U_Mukim_ID'];
                $tanah->U_Seksyen_ID = $dtanah['U_Seksyen_ID'];
                $tanah->U_Kampung_ID = $dtanah['U_Kampung_ID'];
                $tanah->U_Parlimen_ID = $dtanah['U_Parlimen_ID'];
                $tanah->U_Dun_ID = $dtanah['U_Dun_ID'];
                $tanah->Luas_Lot = $dtanah['Luas_Lot'];
                $tanah->Bahagian_Pemilikan = $dtanah['Bahagian_Pemilikan'];
                $tanah->Luas_Pemilikan = $dtanah['Luas_Pemilikan'];
                $tanah->Bil_Pemilik_Atas_Geran = $dtanah['Bil_Pemilik_Atas_Geran'];
                $tanah->U_Pengurusan_Tanah_ID = $dtanah['U_Pengurusan_Tanah_ID'];
                $tanah->Pengurusan = $dtanah['Pengurusan'];
                $tanah->U_Taraf_ID = $dtanah['U_Taraf_ID'];
                $tanah->Taraf = $dtanah['Taraf'];
                $tanah->Penempatan_id = $dtanah['Penempatan_id'];
                $tanah->Penempatan = $dtanah['Penempatan'];
                $tanah->Kod_PT_Tanah = $dtanah['Kod_PT_Tanah'];
                $tanah->Pusat_Tanggungjawab_Tanah = $dtanah['Pusat_Tanggungjawab_Tanah'];

                $tanah->save();

                foreach ($dtanah['Tanaman'] as $key => $dtanaman) {
                    $tanaman = new Tanaman;
                    $tanaman->id_tanah = $tanah->id;
                    $tanaman->Jenis_Tanaman = $dtanaman['Jenis_Tanaman'];
                    $tanaman->Peratus_Tanaman = $dtanaman['Peratus_Tanaman'];
                    $tanaman->Luas_Tanaman = $dtanaman['Luas_Tanaman'];
                    $tanaman->U_Lib_Jenis_Tanaman = $dtanaman['U_Lib_Jenis_Tanaman_ID'];
                    $tanaman->Tahun_Tanam = $dtanaman['Tahun_Tanam'];
                    $tanaman->U_Agensi_Bantuan_ID = $dtanaman['U_Agensi_Bantuan_ID'];
                    $tanaman->Agensi = $dtanaman['Agensi'];
                    $tanaman->U_Pendekatan_ID = $dtanaman['U_Pendekatan_ID'];
                    $tanaman->Pendekatan = $dtanaman['Pendekatan'];
                    $tanaman->Hasil = $dtanaman['Hasil'];
                    $tanaman->U_JProduk_ID = $dtanaman['U_JProduk_ID'];
                    $tanaman->Produk = $dtanaman['Produk'];
                    $tanaman->U_SPengusahan_ID = $dtanaman['U_SPengusahan_ID'];
                    $tanaman->Status = $dtanaman['Status'];

                    $tanaman->save();

                    foreach ($dtanaman['GAP'] as $key => $dgap) {
                        $gap = new GAP;
                        $gap->id_tanaman=$tanaman->id;
                        $gap->U_JnsAmalan_ID=$dgap['U_JnsAmalan_ID'];
                        $gap->Amalan=$dgap['Amalan'];
                        $gap->U_Tahap_ID=$dgap['U_Tahap_ID'];
                        $gap->Tahap=$dgap['Tahap'];

                        $gap->save();
                    }
                }
            }

            Mail::to($request->email)->send(new PendaftaranPK($user));
            alert()->success('Sila semak email anda untuk notifikasi pendaftaran.', 'Pendaftaran Berjaya');
            return redirect('/');
        }
    }
}
