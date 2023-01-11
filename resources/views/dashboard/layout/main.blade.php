@include('dashboard.partials.header')

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>

  @include('dashboard.partials.sidebar')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('dashboard.partials.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
       

                  {{-- main --}}
                <main>
                  @yield('container')
                 
                </main>
                {{-- endmain --}}
              </div>
              <div class="card-body pt-12 pt-12 p-2">
                <div class="card-body-responsive pt-12">
                  
                </div>
              </div>
            </div>
          </div>
        </div>
       
        
      </div>
  </main>
  
  @include('dashboard.partials.footer')