<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        $data = [
            'title' => 'Profile',
            'active' => 'profiles',
        ];
        return view('profile.profile', $data);
    }
}
