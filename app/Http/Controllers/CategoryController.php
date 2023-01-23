<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Category',
            'active' => 'categories',
        ];
        return view('categories.categories', $data);
    }
}
