@extends('dashboard.layout.main')
@section('container')
  <h6>Books Page</h6>
 <div class="text-start">
  <a href="/books/create" class="btn btn-success btn-icon btn-sm mt-2" role="button">Add Category <i class="ni ni-fat-add"></i></a>
</div>

  {{-- flash --}}
  @if(session()->has('success'))
    <div class="col-md-6">
      <div class="alert alert-success alert-dismissible">
        {{ session('success') }}
      </div>
    </div>
  @endif

 {{-- table--}}
 <table class="table">
  <thead>
      <tr>
          <th class="text-center">No</th>
          <th class="text-center">Book Code</th>
          <th class="text-center">Title</th>
          <th class="text-center">Category</th>
          <th class="text-center">Status</th>
          <th class="text-center">Actions</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($books as $book)
      <tr>
        <td class="text-center">{{ $loop->iteration }}</td>
        <td class="text-center">{{ $book->book_code }}</td>
        <td class="text-center">{{ $book->title }}</td>
        <td class="text-center">
          @foreach ($book->categories as $item)
          - {{ $item->name }} <br>
          @endforeach
        </td>
        <td class="text-center">{{ $book->status }}</td>
        <td class="td-actions text-center">
          <button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm " data-original-title="" title="">
            <i class="ni ni-bold-up pt-1"></i>
          </button>
          <a href="/books/{{ $book->slug }}/edit" class="btn btn-warning btn-icon btn-sm "> <i class="ni ni-settings pt-1"></i></a>
          <form action="/books/{{ $book->slug }}" method="post" class="d-inline">
            @csrf
            @method('delete')
            <button class="btn btn-danger btn-icon btn-sm " onclick="return confirm('Are You Sure!!')">
              <i class="ni ni-fat-remove pt-1"></i>
            </button>
          </form>
        </td>
      </tr>
    @endforeach
      
  </tbody>
</table>
 {{-- endtable --}}
@endsection  
  