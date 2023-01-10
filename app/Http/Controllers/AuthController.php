<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login.login_view');
    }

    public function register(Request $request)
    {
        return view('login.register_view');
    }
}
