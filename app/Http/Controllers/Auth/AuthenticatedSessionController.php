<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $user = User::where('no_KP', $request->no_KP)->get()->first();
        // dd($request);
        // $request->authenticate();

        if ($user == null) {
            alert()->error('Akaun anda tiada dalam rekod kami.');
            return back();
        }
        $this->validate($request, [
            'password' => 'required',
        ]);

        if (Hash::check($request->password, $user->password)) {
            $request->authenticate();
            $request->session()->regenerate();

            alert()->success('Log masuk berjaya');
            return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            alert()->error('Sila masukkan kata laluan yang betul.');
            return back();
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
