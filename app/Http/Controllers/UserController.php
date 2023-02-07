<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'User',
            'active' => 'user',
        ];
        return view('user.users', $data);
    }
    public function profile()
    {
        $data = [
            'title' => 'Profile',
            'active' => 'profiles',
        ];
        return view('user.profile', $data);
    }
}
