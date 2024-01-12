<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function index(){
        $judul = "Halaman utama";

        return view('auth.login',compact('judul'));
    }

    function proses_login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/home')->with('loading','Welcome');
        }

        return redirect()->route('login')->with('login_gagal', 'Login Gagal!');
    }

    public function log_out() {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        request()->session()->forget(['email', 'name', 'password']);

        return redirect()->route('login');
    }
}
