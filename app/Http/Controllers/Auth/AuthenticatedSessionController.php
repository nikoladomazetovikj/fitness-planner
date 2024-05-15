<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Country;
use App\Models\User;
use App\Providers\AppServiceProvider;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register', ['countries' => Country::all()]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(RegisterRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country_id' => $request->country_id,
            'city' => $request->city,
            'dob' => $request->dob
        ]);

        Auth::login($user);

        return redirect(AppServiceProvider::HOME);
    }

    /**
     * Handle an incoming authentication request.
     */
//    public function store(RegisterRequest $request): \Illuminate\Http\RedirectResponse
//    {
//        $request->authenticate();
//
//        $request->session()->regenerate();
//
//        return redirect()->intended(AppServiceProvider::HOME);
//    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
