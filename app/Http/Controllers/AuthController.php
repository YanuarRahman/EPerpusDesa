<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

            // return redirect()->intended('dashboard');

            // mengecek aktif atau tidak nya user
            if (Auth::user()->status != 'active') {
                // untuk menolak akun yang tidak active
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                Session::flash('status', 'failed');
                Session::flash('message', 'Your Account Not Activated!!');
                return redirect('login');
            }

            // $request->session()->regenerate();

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

    public function create(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:100',
            'password' => 'required|min:6',
            'phone' => 'max:15',
            'address' => 'required',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        // $request->password = Hash::make($request->password);

        User::create($validated);
        Session::flash('status', 'success');
        Session::flash('message', 'Success, Now Waiting Account Activated!');
        return redirect('/login');
    }
}
