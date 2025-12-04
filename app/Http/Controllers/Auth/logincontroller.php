<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'nis_nip' => 'required',
            'password' => 'required'
        ]);

        // Coba login
        if (Auth::attempt(['nis_nip' => $request->nis_nip, 'password' => $request->password])) {
            $request->session()->regenerate();

            // Ambil user
            $user = Auth::user();

            // Redirect berdasarkan role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'siswa') {
                return redirect()->route('siswa.dashboard');
            } elseif ($user->role === 'pemilik') {
                return redirect()->route('pemilik.dashboard');
            }

            return redirect()->route('login')->with('error', 'Role tidak dikenali.');
        }

        // Jika gagal login
        return back()->with('error', 'Nomor Induk atau Password salah!');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
