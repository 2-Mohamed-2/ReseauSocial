<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Commissariat;
use App\Models\Session;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
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
        $commissariats = Commissariat::all();
        return view('auth.login', compact('commissariats'));
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        // dd($request->ip());

        Session::create([
            'user_id'=> Auth::user()->id,
            'debut'=> Carbon::now()->toDateTimeString(),
            'ip_address'=> $request->ip(),
        ]);

        $request->session()->regenerate();
        if (Auth::user()->isActive == false) {
            return redirect('/Profil')->with('info', "Veuillez s'il vous plait changer de mot de passe avant de continuer !");
        }
        else {
            return redirect()->intended(RouteServiceProvider::HOME);
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
        $test = Auth::user()->sessions->last();
        $test->fin = Carbon::now()->toDateTimeString();
        $test->save();
        
        // dd($test->debut);
        // $id = User::findOrFail(Auth::user()->id);

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
