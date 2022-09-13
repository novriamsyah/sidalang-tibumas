<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class SistemLoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function lupa_password()
    {
        return view('lupa_password');
    }

    // Verifikasi Login
    public function verifikasiLogin(Request $request)
    {
    	if(Auth::attempt($request->only('username', 'password')))
    	{
            // dd(Auth::user()->role);
            Session::flash('berhasil_login', 'Kamu berhasil login ke dashboar');
    		return redirect('/');
    	}
        Session::flash('gagal_login', 'Maaf username atau password anda salah');
    	return redirect('/login');
        // dd($request->all());
    }

    // Proses Logout
    public function logout()
    {
    	Auth::logout();
    	return redirect('/login');
    }


}
