@extends('dashboard.layout.main')
@section('container')
<h6>Edit Category</h6>

<form action="/categories/{{ $category->slug }}" method="post">
    @csrf
    <div class="col-md-6">
        <div class="form-group">
            <label for="name" id="name" name="name" >Name :</label>
            <input type="text" class="form-control form-control-alternative @error('name') is-invalid @enderror" id="name" for="name" name="name" autofocus value="{{ old('name', $category->name )}}">
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
            <label for="slug" id="slug" name="name" >Slug :</label>
            <input type="text" class="form-control form-control-alternative @error('slug') is-invalid @enderror" id="slug" for="slug" name="slug" readonly value="{{ old('slug', $category->slug )}}">
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <button type="submit" rel="tooltip" class="btn btn-success btn-icon btn-sm" data-original-title="" title="">
           Update Category <i class="ni ni-settings-gear-65 pt-1"></i>
          </button>
    </div>
</form>



@endsection