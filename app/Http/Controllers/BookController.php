<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'active' => "books",
            'title' => "Books",
            'books' => Book::all(),
        ];

        return view('books.books', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'active' => "books",
            'title' => "Add Books",
        ];
        return view('books.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'book_code' => 'required',
            'title' => 'required|max:100',
        ]);

        Book::create($validateData);
        return redirect('books')->with('success', 'Books Success Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book, $slug)
    {
        $data = [
            'active' => 'books',
            'title' => 'Edit Book',
            'books' => Book::where('slug', $slug)->first(),
        ];
        return view('books.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book, $slug)
    {
        $validateData = $request->validate([
            'book_code' => 'required',
            'title' => 'required|max:100',
            'books' => Book::all(),
        ]);

        $book = Book::where('slug', $slug)->first();
        $book->slug = null;
        $book->update($validateData);
        return redirect('/books')->with('success', "Book Success Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book, $slug)
    {
        $delete = Book::where('slug', $slug)->first();
        $delete->delete();
        return redirect('/books')->with('success', 'Book Removed!!');
    }
}
