<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Branch;
use App\Models\Option;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $branches = Branch::all();
        return view('auth.login', compact('branches'));
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        //dd($request);
        $request->authenticate();

        $request->session()->regenerate(); 

        $options = Option::orderBy('number','asc')->orderBy('order','asc')->get();
        //$clients = Client::orderByDesc('id')->get();
        session(['options' => $options]);
        //dd($options);
        //return redirect()->intended(RouteServiceProvider::HOME);
        return redirect()->intended(RouteServiceProvider::HOME);

        //return redirect()->route('home')->with(['data' => $data]);  
        //return redirect()->intended(RouteServiceProvider::HOME)->with(['param' => 'value']);
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
