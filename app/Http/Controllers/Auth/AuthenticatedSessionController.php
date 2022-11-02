<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Dashboard;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)

    {
        // dd($request);

        $email = $request->email;
        $kp = $request->no_KP;
        $password = $request->password;

        // condition untuk berbeza tab(pk, staf, ejen)
        if ($request->pengguna == 'staf') {
            $check_staf = User::where('no_KP', $kp)->first()->jenis_pengguna;

            if ($check_staf == 'Peserta ULPK') {
                alert()->error('Sila log masuk menggunakan tab log masuk yang betul', 'Gagal');
                return back();
            } elseif ($check_staf == 'Ejen Pelaksana') {
                alert()->error('Sila log masuk menggunakan tab log masuk yang betul', 'Gagal');
                return back();
            }
        }

        // confition untuk login type
        if ($request->pengguna == 'pk') {
            if ($kp != null) {
                $check_ic = User::where('no_KP', $kp)->first();
            } else {
                $check_ic = User::where('email', $email)->first();
            }
            
            if ($check_ic == null) {
                alert()->error('Butiran yang anda masukkan tiada dalam rekod kami. Sila lakukan pendaftaran.');
                return back();
            }else {
                $login_type = $check_ic->login_type;
            }

            if ($login_type == 'emel') {
                if ($email == null) {
                    alert()->error('Sila log masuk menggunakan jenis ID yang dipilih semasa pendaftaran', 'Gagal');
                    return back();
                }
            } elseif ($login_type == 'nric') {
                if ($kp == null) {
                    alert()->error('Sila log masuk menggunakan jenis ID yang dipilih semasa pendaftaran', 'Gagal');
                    return back();
                }
            }
        }

        $user = User::where('email', $email)->orWhere('no_KP', $kp)->first();
        if ($user == null) {
            alert()->error('No . Kad Pengenalan atau emel yang dimasukkan tiada dalam pangkalan data RISDA e-Latihan');
            return back();
        }

        // check status akaun
        if ($user->status_akaun == null) {
            alert()->error('Akaun Anda Tidak Aktif', 'Gagal');
            return redirect()->back();
        }

        if ($kp != null) {
            $request->authenticate();
        } else {
            $request->authenticate_email();
        }

        $request->session()->regenerate();

        $check = Dashboard::where('user_id', $user->id)->where('status', 'masuk')->first();
        if ($check == null) {
            $pelawat = new Dashboard;
            $pelawat->user_id = $user->id;
            $pelawat->status = 'masuk';
            $pelawat->save();
        }
        return redirect()->intended(RouteServiceProvider::HOME);
    }


    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        // $pelawat = Dashboard::where('user_id', Auth::id())->where('status', 'masuk')->first();
        // $pelawat->status = 'keluar';
        // $pelawat->save();

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
