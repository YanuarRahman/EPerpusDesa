<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        $data = [
            'title' => 'Profile',
        ];
        return view('profile.profile', $data);
    }
}
