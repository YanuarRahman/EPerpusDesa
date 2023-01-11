<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'book' => Book::count(),
            'category' => Category::count(),
            'user' => User::count(),
        ];
        return view('dashboard.dashboard', $data);
    }
}
