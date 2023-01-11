@extends('dashboard.layout.main')
@section('container')
  <h6>Dashboard</h6>

  

<div class="row">
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card ">
      <div class="card-body p-3 primary">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold text-center">Books</p>
              <h5 class="font-weight-bolder text-center">
                {{ $book }}
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-warning shadow-danger text-center rounded-circle">
              <i class="ni ni-book-bookmark text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card ">
      <div class="card-body p-3 primary">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold text-center">Categories</p>
              <h5 class="font-weight-bolder text-center">
                {{ $category }}
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-success shadow-danger text-center rounded-circle">
              <i class="ni ni-credit-card text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card ">
      <div class="card-body p-3 primary">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold text-center">User</p>
              <h5 class="font-weight-bolder text-center">
                {{ $user }}
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow-danger text-center rounded-circle">
              <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


 
</div>
  
@endsection  
  