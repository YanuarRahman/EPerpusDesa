<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentLogController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'rent-log',
            'active' => 'rent-logs'
        ];
        return view('rentlogs.rentlogs', $data);
    }
}
