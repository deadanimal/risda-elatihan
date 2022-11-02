<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function loginWithFacebook()
    {
        $user = Socialite::driver('facebook')->user();
        $isUser = User::where('email', $user->email)->first();
        if ($isUser) {
            Auth::login($isUser);
        } else {
            $createUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'fb_id' => $user->id,
                'password' => encrypt('pnsb1234'),
                'jenis_pengguna' => 'Peserta ULPK',
            ]);
            $test = User::find($createUser->id);
            $test->jenis_pengguna = 'Peserta ULPK';
            $test->save();

            Auth::login($createUser);
        }
        return redirect('/');
    }

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function loginWithGoogle()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $isUser = User::where('email', $user->email)->first();
        if ($isUser) {
            Auth::login($isUser);
        } else {
            $createUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'password' => encrypt('pnsb1234'),
            ]);

            $test = User::find($createUser->id);
            $test->jenis_pengguna = 'Peserta ULPK';
            $test->save();
            Auth::login($createUser);
        }
        return redirect('/');

    }
}
