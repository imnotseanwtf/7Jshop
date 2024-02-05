@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Hello, world!</title>
    <style>
        body {
            background-color: #F2F0EB;
        }
    </style>
  </head>
  <body>


  <div class="container-fluid">
  <div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <a href="{{ route('order.show', $activeProduct?->id) }}">
          <img style="width: 5000px;" src="{{ asset('storage/' . $activeProduct->productImages?->first()->image_path) }}" height="800"   alt="...">
      </a>
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    @foreach ($mainProducts as $mainProduct)
    <div class="carousel-item">
        <a href="{{ route('order.show', $mainProduct?->id) }}">
            <img src="{{ asset('storage/' . $mainProduct->productImages?->first()->image_path) }}" class="d-block w-100" height="800" alt="...">
        </a>
            <div class="carousel-caption d-none d-md-block">
            </div>
      </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" style="color: black" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" style="color: black" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha384-4+0r1L3FJ25njq8q2u9LfT9G5Q5IYxuVo1q8Q8C5V6DSc8w+JzX4+6t6E4XskKp4" crossorigin="anonymous"></script>

<script>
  $(document).ready(function() {
    // Activate the carousel
    $('#carouselExampleCaptions').carousel({
      interval: 2000, // Set the interval for autoplay in milliseconds (e.g., 2000ms = 2 seconds)
      pause: 'hover' // Pause on mouse hover (optional)
    });
  });
</script>



<div class="container mt-5">
    <h1 class="display-6 text-center fw-bold"> SERVICES OFFER   </h1>
    <div class="row">
      <div class="owl-carousel owl-theme">
        @foreach ($products as $product)
        <div class="card">
            <div class="card-body">
            <img src="{{ asset('storage/'. $product->productImages?->first()->image_path) }}" class="card-img-top" height="300px" >
                <hr/>
                <div class="text-start" style="display: inline-block; width: 98%; ">
                 <a href="{{ route('order.show', $product?->id) }}" style="text-decoration: none"><h2 class="text-start">{{ $product?->product_name }}</h2></a>
                </div>
            </div>
      </div>
        @endforeach
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
   </script>
  </div>
</body>
</html>
@endsection
