@extends('dashboard.layout.main')
@section('container')
  <h6>Category</h6>
    <div class="text-start">
      <a href="/categories/create" class="btn btn-success btn-icon btn-sm" role="button">Add Category <i class="ni ni-fat-add"></i></a>
    </div>

    {{-- flash --}}
    @if(session()->has('success'))
      <div class="col-md-6">
          <div class="alert alert-success alert-dismissible">
            {{ session('success') }}
          </div>
      </div>
    @endif

 <div class="row">
  <div class="col-md-8">
    <table class="table">
      <thead>
          <tr>
              <th class="text-center">No</th>
              <th class="text-center">Name</th>
              <th class="text-center">Actions</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
          <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td class="text-center">{{ $category->name }}</td>
            <td class="td-actions text-center">
             
             
              <a href="/categories/{{ $category->slug }}/edit" class="btn btn-info btn-icon btn-sm ">Edit <i class="ni ni-settings-gear-65 pt-1"></i></a>
              {{-- <a href="/categories/{{ $category->slug }}" class="btn btn-danger btn-icon btn-sm "  onclick="return confirm('Are You Sure!!')">Delete <i class="ni ni-fat-remove pt-1"></i></a> --}}
             <form action="/categories/{{ $category->slug }}" method="post" class="d-inline">
              @csrf
              @method('delete')
              <button class="btn btn-danger btn-icon btn-sm " onclick="return confirm('Are You Sure!!')">
                Delete <i class="ni ni-fat-remove pt-1"></i>
              </button>
            </form>
            </td>
            
          </tr>
          @endforeach
      </tbody>
  </table>
  </div>
 </div>

{{-- <script>
window.setTimeout(function() {
  $(".alert").fadeTo(500, 0).slideUp(500, function(){
  $(this).remove(); 
  });
}, 5000);
</script> --}}

@endsection  
  