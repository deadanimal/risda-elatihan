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
            // alert('Maaf, No. Kad Pengenalan tiada dalam pangkalan data e-SPEK');
            $message = 'Maaf, No. Kad Pengenalan tiada dalam pangkalan data e-SPEK';
            echo "<script type='text/javascript'>alert('$message');</script>";
            return redirect('/register');
        } else {
            $data = $data_pk[0];
            // dd($data);
            return view('pendaftaran.pk', [
                'data'=>$data
            ]);
        }
    }

    public function daftar_pengguna(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'no_KP' => $request->no_KP,
        // ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->no_KP = $request->no_KP;

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

        // $pk = PekebunKecil::create([
        //     'id_Pengguna' => $user['id'],
        //     'Jantina_ID' => $data_pk['Jantina_ID'],
        //     'Jantina' => $data_pk['Jantina'],
        //     'Warganegara_ID' => $data_pk['Warganegara_ID'],
        //     'Warganegara' => $data_pk['Warganegara'],
        //     'Bangsa_ID' => $data_pk['Bangsa_ID'],
        //     'Bangsa' => $data_pk['Bangsa'],
        //     'Jalan' => $data_pk['Jalan'],
        //     'Nama_Kampung' => $data_pk['Nama_Kampung'],
        //     'Bandar' => $data_pk['Bandar'],
        //     'Poskod' => $data_pk['Poskod'],
        //     'U_Negeri_ID' => $data_pk['U_Negeri_ID'],
        //     'Negeri' => $data_pk['U_Negeri_ID'],
        //     'U_Daerah_ID' => $data_pk['U_Daerah_ID'],
        //     'Daerah' => $data_pk['Daerah'],
        //     'U_Mukim_ID' => $data_pk['U_Mukim_ID'],
        //     'Mukim' => $data_pk['Mukim'],
        //     'U_Kampung_ID' => $data_pk['U_Kampung_ID'],
        //     'Kampung' => $data_pk['Kampung'],
        //     'U_Seksyen_ID' => $data_pk['U_Seksyen_ID'],
        //     'Seksyen' => $data_pk['Seksyen'],
        //     'Penempatan_ID' => $data_pk['Penempatan_ID'],
        //     'Penempatan' => $data_pk['Penempatan'],
        //     'Telefon' => $data_pk['Telefon'],
        // ]);

        // event(new Registered($pk));

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
            // $d_tanah = Tanah::create([
            //     'id_pekebun_kecil' => $pk['id'],
            //     'U_Tanah_ID' => $tanah['U_Tanah_ID'],
            //     'No_Geran' => $tanah['No_Geran'],
            //     'No_Lot' => $tanah['No_Lot'],
            //     'U_SyaratT_ID' => $tanah['U_SyaratT_ID'],
            //     'Syarat' => $tanah['Syarat'],
            //     'U_Negeri_ID' => $tanah['U_Negeri_ID'],
            //     'U_Daerah_ID' => $tanah['U_Daerah_ID'],
            //     'U_Mukim_ID' => $tanah['U_Mukim_ID'],
            //     'U_Seksyen_ID' => $tanah['U_Seksyen_ID'],
            //     'U_Kampung_ID' => $tanah['U_Kampung_ID'],
            //     'U_Parlimen_ID' => $tanah['U_Parlimen_ID'],
            //     'U_Dun_ID' => $tanah['U_Dun_ID'],
            //     'Luas_Lot' => $tanah['Luas_Lot'],
            //     'DaeBahagian_Pemilikanrah' => $tanah['Bahagian_Pemilikan'],
            //     'Luas_Pemilikan' => $tanah['Luas_Pemilikan'],
            // ]);

            // event(new Registered($d_tanah));

            $tanamans = $tanah['Tanaman'];
            foreach($tanamans as $tanaman){
                $d_tanaman = new Tanaman;
                $d_tanaman->id_tanah = $d_tanah->id;
                $d_tanaman->Jenis_Tanaman = $tanaman['Jenis_Tanaman'];
                $d_tanaman->Peratus_Tanaman = $tanaman['Peratus_Tanaman'];
                $d_tanaman->Luas_Tanaman = $tanaman['Luas_Tanaman'];

                $d_tanaman->save();
                // $d_tanaman = Tanaman::create([
                //     'id_tanah' => $d_tanah['id'],
                //     'Jenis_Tanaman' => $tanaman['Jenis_Tanaman'],
                //     'Peratus_Tanaman' => $tanaman['Peratus_Tanaman'],
                //     'Luas_Tanaman' => $tanaman['Luas_Tanaman'],
                // ]);

                // event(new Registered($d_tanaman));
            }
        }

        Mail::to($request->email)->send(new PendaftaranPK());
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
