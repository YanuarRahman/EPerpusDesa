<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'categories' => Category::all(),
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
            'categories' => Category::all(),
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
            'book_code' => 'required|unique:books',
            'title' => 'required|max:100',
        ]);

        // uploadmimage
        $newName = '';
        if ($request->file('image')) {
            // dapetin extensions
            $extension = $request->file('image')->getClientOriginalExtension();
            // nimpa extensin ke nama yang baru
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('cover', $newName);
        };

        $request['cover'] = $newName;
        $query = Book::create($request->all());
        $query->categories()->sync($request->category);
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
    public function edit($slug)
    {
        $data = [
            'active' => 'books',
            'title' => 'Edit Book',
            'books' => Book::where('slug', $slug)->first(),
            'categories' => Category::all(),
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
    public function update(Request $request, $slug)
    {

        if ($request->file('image')) {
            // dapetin extensions
            $extension = $request->file('image')->getClientOriginalExtension();
            // nimpa extensin ke nama yang baru
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        };

        // $validateData = $request->validate([
        //     'book_code' => 'required',
        //     'title' => 'required|max:100',

        // ]);

        $book = Book::where('slug', $slug)->first();
        $book->update($request->all());;

        if ($request->categories) {
            $book->categories()->sync($request->categories);
        }

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
        if ($book->cover) {
            Storage::delete($book->cover);
        };
        $delete = Book::where('slug', $slug)->first();
        $delete->delete();
        return redirect('/books')->with('success', 'Book Removed!!');
    }
}
