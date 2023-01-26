<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Category',
            'active' => 'categories',
            'categories' => Category::all(),
        ];
        return view('categories.categories', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'categories',
            'active' => 'categories',

        ];
        return view('categories.create', $data);
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
            'name' => 'required|max:15|min:3|unique:categories',
        ]);

        Category::create($validateData);
        return redirect('categories')->with('success', "Data Success Added");

        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = [
            'active' => 'categories',
            'title' => 'Categories',
            'category' => Category::where('slug', $slug)->first(),
        ];
        return view('categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $slug)
    {
        $validateData = $request->validate([
            'name' => 'required|max:15|min:3|unique:categories',
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($validateData);
        return redirect('/categories')->with('success', "Data Success Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $slug)
    {
        $delete = Category::where('slug', $slug)->first();
        $delete->delete();
        return redirect('/categories')->with('success', 'Category Removed!!');
    }
}
