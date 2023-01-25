@extends('dashboard.layout.main')
@section('container')
<h6>Edit Category</h6>

<form action="/categories" method="post">
    @csrf
    <div class="col-md-6">
        <div class="form-group">
            <label for="name" id="name" name="name" >Name :</label>
            <input type="text" class="form-control form-control-alternative @error('name') is-invalid @enderror" id="name" for="name" name="name" placeholder="Name Category.." autofocus>
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <button type="submit" rel="tooltip" class="btn btn-success btn-icon btn-sm" data-original-title="" title="">
            \Edit Category<i class="ni ni-fat-add"></i>
          </button>
    </div>
</form>



@endsection