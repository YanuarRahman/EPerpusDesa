<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Profile',
            'active' => 'Profiles'
        ];
        return view('profile.profile', $data);
    }
}
