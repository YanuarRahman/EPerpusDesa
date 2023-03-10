@extends('dashboard.layout.main')
@section('container')
<h6>Edit Category</h6>
<a href="/categories" class="btn btn-primary btn-icon btn-sm mt-2"><i class="ni ni-bold-left"></i> Back</a>
<form action="/categories/{{ $category->slug }}" method="post">
    @csrf
    @method('put')
    <div class="col-md-6">
        <div class="form-group">
            <label for="name" id="name" name="name" >Name :</label>
            <input type="text" class="form-control form-control-alternative @error('name') is-invalid @enderror" id="name" for="name" name="name"  value="{{ old('name', $category->name )}}" autofocus>
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