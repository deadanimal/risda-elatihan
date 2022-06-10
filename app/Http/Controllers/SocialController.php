<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
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
        $isUser = User::where('fb_id', $user->id)->first();
        dd($user, $isUser);
        if ($isUser) {
            Auth::login($isUser);
            return redirect('/dashboard');
        } else {
            $createUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'fb_id' => $user->id,
                'password' => encrypt('pnsb1234')
            ]);

            Auth::login($createUser);
            return redirect('/dashboard');
        }
    }
}
