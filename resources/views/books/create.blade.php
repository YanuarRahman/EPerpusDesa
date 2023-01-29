@extends('dashboard.layout.main')
@section('container')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
            <label for="image" id="image" name="image" >Image Book:</label>
            <input type="file" class="form-control form-control-alternative @error('image') is-invalid @enderror" id="image" for="image" name="image" placeholder="Book Code.." autofocus>
            @error('image')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
            <label for="category">Category Book :</label>
            <select name="category[]" id="category" for="category" class="form-control select-multiple" multiple>
              <option value="Choose Category" hidden>~Choose Category~</option>
              @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
            {{-- <label for="status" id="status" name="status" >Status:</label>
            <input type="text" class="form-control form-control-alternative @error('status') is-invalid @enderror" id="status" for="status" name="status" placeholder="Status Book.." autofocus>
            @error('status')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror --}}
        </div>
        <button type="submit" rel="tooltip" class="btn btn-success btn-icon btn-sm" data-original-title="" title="">
            Add Category<i class="ni ni-fat-add"></i>
          </button>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.select-multiple').select2();
});
</script>
@endsection
