<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'books',
            'active' => 'books'
        ];
        return view('books.books', $data);
    }
}
