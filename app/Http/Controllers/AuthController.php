<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login.login_view');
    }

    public function register()
    {
        return view('login.register_view');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required',],
            'password' => ['required'],
        ]);

        // cek login ada atau tidak
        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate();
            // return redirect()->intended('dashboard');

            // mengecek aktif atau tidak nya user
            if (Auth::user()->status != 'active') {
                Session::flash('status', 'failed');
                Session::flash('message', 'Your Account Not Activated!!');
                return redirect('login');
            }
            if (Auth::user()->role_id == 1) {
                return redirect('dashboard');
            };

            if (Auth::user()->role_id == 2) {
                return redirect('profile');
            }
        }
        // login gagal
        Session::flash('status', 'failed');
        Session::flash('message', 'Login Invalid!!');
        return redirect('login');
        // return redirect('dashboard')->with('status', 'Profile updated!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->flush();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
