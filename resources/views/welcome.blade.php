<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
        <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://kit.fontawesome.com/5e81b262d9.js" crossorigin="anonymous"></script>
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        @vite('resources/sass/app.scss')

        <!-- Scripts -->
        @vite('resources/js/app.js')
    </head>
<body>

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid text-center">
                <div class="d-flex">
                    <img src="{{ asset('images/brand/logo.png') }}" alt="" class="me-3" height="50" width="50">
                    <h3>Web Portal</h3>
                </div>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="d-flex align-items-center">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
                <a class="nav-link" href="{{ route('register') }}">Register</a>
              </div>
            </div>
          </nav>


          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img style="width: 5000px;" src="{{ asset('storage/' . $activeProduct->productImages?->first()->image_path) }}" height="800"   alt="...">
              </div>
              @foreach ($mainProducts as $mainProduct)
                <div class="carousel-item">
                    <img src="{{ asset('storage/' . $mainProduct->productImages?->first()->image_path) }}" class="d-block w-100" height="800" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
            @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

      <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
        <h1 class="text-center fw-bolder mt-4"> SERVICES OFFER </h1>
        <div class="carousel-inner w-75 mx-auto align-items-center">
          @foreach ($products as $index => $product)
          <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            <div class="card">
              <div class="card-body">
                <img src="{{ asset('storage/'. $product->productImages?->first()?->image_path) }}" class="card-img-top" height="300px">
                <hr/>
                <h2 class="text-start">{{ $product?->product_name }}</h2>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev" style="color: black">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next" style="color: black">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>


      <div class="container mt-5">
          <div class="row">
            <div class="owl-carousel owl-theme">

          </div>
      </div>
      </div>


        </div>

    <div class="container-fluid">
        <div class="row" style="margin-top: 10%">
            <div class="col-1"></div>
            <div class="col-6">
                <h1 style="font-size: 90px; font-weight: 700; color: rgb(3, 3, 124)">About Us</h1>
                <p>
                    {{ $aboutUs->text_header }}
                </p>
                <h1 style="color: rgb(3, 3, 124); font-weight: 600" class="mt-3">{{ $aboutUs->header }}</h1>
                <p>
                    {{ $aboutUs->second_text }}
                </p>
            </div>
            <div class="col-5">
                <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="" height="700" width="850">
            </div>
        </div>
    </div>
    <div class="" style="margin-top: 5%; margin-bottom: 5%">
        <h1 class="text-center">Our Top Customers</h1>

        <div class="row">
            @foreach ($topCustomers as $topCustomer)
            <div class="col-3 card">
                <img src="{{ asset('storage/' . $topCustomer->image) }}" class="" alt="..." height="150" width="700">
                <div class="card-body">
                  <h5 class="card-title">{{ $topCustomer->name }}</h5>
                  <p class="card-text">{{ $topCustomer->comment }}</p>
                </div>
              </div>
            @endforeach
        </div>
    </div>
</body>
</html>
