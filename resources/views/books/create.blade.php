@extends('dashboard.layout.main')
@section('container')

<h6>Add Books</h6>
<form action="/books" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-md-6">
        <div class="form-group">
            <label for="book_code" id="book_code" name="book_code" >Book Code:</label>
            <input type="text" class="form-control form-control-alternative @error('book_code') is-invalid @enderror" id="book_code" for="book_code" name="book_code" placeholder="Book Code.." autofocus>
            @error('book_code')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
            <label for="title" id="title" name="title" >Title Book:</label>
            <input type="text" class="form-control form-control-alternative @error('title') is-invalid @enderror" id="title" for="title" name="title" placeholder="Title Book.." autofocus>
            @error('title')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
            <label for="cover" id="cover" name="cover" >Cover Book:</label>
            <input type="file" class="form-control form-control-alternative @error('cover') is-invalid @enderror" id="cover" for="cover" name="cover" placeholder="Book Code.." autofocus>
            @error('cover')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
            <label for="status" id="status" name="status" >Status:</label>
            <input type="text" class="form-control form-control-alternative @error('status') is-invalid @enderror" id="status" for="status" name="status" placeholder="Status Book.." autofocus>
            @error('status')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <button type="submit" rel="tooltip" class="btn btn-success btn-icon btn-sm" data-original-title="" title="">
            Add Category<i class="ni ni-fat-add"></i>
          </button>
    </div>
</form>

@endsection