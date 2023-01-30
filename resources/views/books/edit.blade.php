@extends('dashboard.layout.main')
@section('container')

<h6>Edit Books</h6>
<form action="/books/{{ $books->slug }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="col-md-6">
        <div class="form-group">
            <label for="book_code" id="book_code" name="book_code" >Book Code:</label>
            <input type="text" class="form-control form-control-alternative @error('book_code') is-invalid @enderror" id="book_code" for="book_code" name="book_code" placeholder="Book Code.." value="{{ $books->book_code }}">
            @error('book_code')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
            <label for="title" id="title" name="title" >Title Book:</label>
            <input type="text" class="form-control form-control-alternative @error('title') is-invalid @enderror" id="title" for="title" name="title" placeholder="Title Book.." value="{{ $books->title }}">
            @error('title')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <div>
            <label for="CurrentCategory">Current Category</label>
            <ul>
              @foreach ($books->categories as $category)
                  <li>{{ $category->name }}</li>
              @endforeach
            </ul>
          </div>
          <label for="category">Category Book :</label>
            <select name="category[]" id="category" for="category" class="form-control select-multiple" multiple>
              @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
            <div>
              <label for="CurrentCover" style="display: block" class="mt-2">Current Book</label>
              @if ($books->cover)
                  <img src="{{ asset('storage/cover/'.$books->cover) }}" alt="" width="200px">
              @else
                  <img src="{{ asset('img/default.png') }}" alt="" width="200px">
              @endif
            </div>
            <label for="cover" id="cover" name="cover" >Cover Book:</label>
            <input type="file" class="form-control form-control-alternative @error('cover') is-invalid @enderror" id="cover" for="cover" name="cover" placeholder="Book Code.." value="">
            @error('cover')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
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