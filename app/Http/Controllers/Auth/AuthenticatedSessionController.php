<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'nis_nip' => 'required|string',
        'password' => 'required|string',
    ]);

    if (!Auth::attempt($request->only('nis_nip', 'password'), $request->boolean('remember'))) {
        return back()->withErrors([
            'nis_nip' => 'NIS/NIP atau password salah.',
        ])->onlyInput('nis_nip');
    }

    $request->session()->regenerate();

    $role = Auth::user()->role;

    if ($role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($role === 'pemilik') {
        return redirect()->route('pemilik.dashboard');
    } else {
        return redirect()->route('siswa.dashboard');
    }
}

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
