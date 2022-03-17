<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\PendaftaranEP;
use App\Mail\PendaftaranPK;
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

        // testing
        if ($nric == '621003065611') {
            $data = [];
            return view('pendaftaran.staf', [
                'nric' => $nric,
            ]);
        } elseif ($nric == '670208055215') {
            $data = [];
            return view('pendaftaran.staf', [
                'nric' => $nric,
            ]);
        } elseif ($nric == '840209115186') {
            $data = [];
            return view('pendaftaran.staf', [
                'nric' => $nric,
            ]);
        } elseif ($nric == '861120495509') {
            $data = [];
            return view('pendaftaran.staf', [
                'nric' => $nric,
            ]);
        } elseif ($nric == '610916015420') {
            $data = [];
            return view('pendaftaran.staf', [
                'nric' => $nric,
            ]);
        } elseif ($nric == '980410025195') {
            $data = [];
            return view('pendaftaran.pk', [
                'nric' => $nric,
            ]);
        } elseif ($nric == '931117035449') {
            // penyokong
            $data = [];
            return view('pendaftaran.staf', [
                'nric' => $nric,
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
                $user->jenis_pengguna = 'Urus Setia ULS';

                $user->save();

                $data_email = [
                    'password' => $randomString,
                    'email' => $user->email,
                    'nokp' => $user->no_KP,
                    'nama' => $user->name,
                ];
                $recipient = $user->email;
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
            return view('pendaftaran.pk', [
                'data' => $data,
            ]);
        }
    }

    public function daftar_pengguna(Request $request)
    {
        if ($request->no_KP == '621003065611') {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->no_KP = $request->no_KP;
            $user->jenis_pengguna = 'AdminBTM';
            // $user->assignRole('AdminBTM');
            $user->save();
            Mail::to($request->email)->send(new PendaftaranPK($user));
            alert()->success('Sila semak email anda untuk notifikasi pendaftaran.', 'Pendaftaran Berjaya');
            return redirect('/');
        } else if ($request->no_KP == '670208055215') {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->no_KP = $request->no_KP;
            $user->jenis_pengguna = 'Urus Setia ULS';
            $user->assignRole('Urus Setia ULS');
            $user->save();
            Mail::to($request->email)->send(new PendaftaranPK($user));
            alert()->success('Sila semak email anda untuk notifikasi pendaftaran.', 'Pendaftaran Berjaya');
            return redirect('/');
        } else if ($request->no_KP == '840209115186') {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->no_KP = $request->no_KP;
            $user->jenis_pengguna = 'Peserta ULS';
            $user->assignRole('Peserta ULS');
            $user->save();
            Mail::to($request->email)->send(new PendaftaranPK($user));
            alert()->success('Sila semak email anda untuk notifikasi pendaftaran.', 'Pendaftaran Berjaya');
            return redirect('/');
        } else if ($request->no_KP == '861120495509') {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->no_KP = $request->no_KP;
            $user->jenis_pengguna = 'Urus Setia ULPK';
            $user->assignRole('Urus Setia ULPK');
            $user->save();
            Mail::to($request->email)->send(new PendaftaranPK($user));
            alert()->success('Sila semak email anda untuk notifikasi pendaftaran.', 'Pendaftaran Berjaya');
            return redirect('/');
        } else if ($request->no_KP == '660421015422') {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->no_KP = $request->no_KP;
            $user->jenis_pengguna = 'Peserta ULPK';
            $user->assignRole('Peserta ULPK');
            $user->save();
            Mail::to($request->email)->send(new PendaftaranPK($user));
            alert()->success('Sila semak email anda untuk notifikasi pendaftaran.', 'Pendaftaran Berjaya');
            return redirect('/');
        } else if ($request->no_KP == '610916015420') {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->no_KP = $request->no_KP;
            $user->jenis_pengguna = 'Peserta ULPK';
            $user->assignRole('Peserta ULPK');
            $user->save();
            Mail::to($request->email)->send(new PendaftaranPK($user));
            alert()->success('Sila semak email anda untuk notifikasi pendaftaran.', 'Pendaftaran Berjaya');
            return redirect('/');
        } else if ($request->no_KP == '980410025195') {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->no_KP = $request->no_KP;
            $user->jenis_pengguna = 'Agen Pelaksana ULS';

            $user->save();
            Mail::to($request->email)->send(new PendaftaranPK($user));
            alert()->success('Sila semak email anda untuk notifikasi pendaftaran.', 'Pendaftaran Berjaya');
            return redirect('/');
        } elseif ($request->no_KP == '931117035449') {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->no_KP = $request->no_KP;
            $user->jenis_pengguna = 'Penyokong';
            $user->assignRole('Penyokong');
            $user->save();
            Mail::to($request->email)->send(new PendaftaranPK($user));
            alert()->success('Sila semak email anda untuk notifikasi pendaftaran.', 'Pendaftaran Berjaya');
            return redirect('/');
        } else {

            if ($request->jenis_pengguna == 'ejen_pelaksana') {
                $user = new User;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->no_KP = $request->no_KP;
                $user->jenis_pengguna = 'Ejen Pelaksana';
                $user->assignRole('Ejen Pelaksana');

                $user->save();
                Mail::to($request->email)->send(new PendaftaranEP($user));
                alert()->success('Sila semak email anda untuk notifikasi pendaftaran.', 'Pendaftaran Berjaya');
                return redirect('/');
            } else {
                $user = new User;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->no_KP = $request->no_KP;
                $user->jenis_pengguna = 'Peserta ULPK';
                $user->assignRole('Peserta ULPK');

                $user->save();
                Mail::to($request->email)->send(new PendaftaranPK($user));
                alert()->success('Sila semak email anda untuk notifikasi pendaftaran.', 'Pendaftaran Berjaya');
                return redirect('/');
            }
        }
    }
}
