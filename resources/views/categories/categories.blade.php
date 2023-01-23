@extends('dashboard.layout.main')
@section('container')
  <h6>Category</h6>
    <div class="text-start">
      <button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm" data-original-title="" title="">
        Add Category<i class="ni ni-fat-add"></i>
      </button>
    </div>
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
             
              <button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm " data-original-title="" title="">
                Edit <i class="ni ni-settings-gear-65 pt-1"></i>
              </button>
              <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm " data-original-title="" title="">
                Delete <i class="ni ni-fat-remove pt-1"></i>
                </button>
            </td>
            
          </tr>
          @endforeach
      </tbody>
  </table>
  </div>
 </div>
@endsection  
  