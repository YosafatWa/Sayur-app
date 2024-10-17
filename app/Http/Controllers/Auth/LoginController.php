<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('home'); // Mengarahkan ke view login
    }

    // Memproses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Mencoba untuk login
        if (Auth::attempt($request->only('email', 'password'))) {
            // Jika berhasil, redirect ke halaman yang diinginkan
            return redirect()->route('vegetable.index'); // Ganti dengan rute yang sesuai
        }

        // Jika gagal, redirect kembali ke form dengan error
        return redirect()->back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
}
