@extends('layouts.landing.back')
@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
    integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"
    integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<style>
    .slick-prev:before {
        color: black;
    }

    .slick-next:before {
        color: black;
    }
</style>
<section class="home d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-7">
                <div class="home-text">
                    <h1>Best Mobile App Template for Your Business</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="home-btn">
                        <a href="" class="btn btn-1">download app</a>
                    </div>
                    <div class="row border-icon">
                        <a href="" class="border border-danger">
                            <i class="fas fa-file-pdf text-danger"></i>
                        </a>
                        <a href="" class="border border-danger">
                            <i class="fas fa-file-pdf text-danger"></i>
                        </a>
                        <a href="" class="border border-danger">
                            <i class="fas fa-file-pdf text-danger"></i>
                        </a>
                    </div>
                </div>

            </div>
            <div class="col-lg-5 col-md-5">
                <div class="home-img">
                    <div class="circle">
                    </div>
                    <img src="{{ asset('images/landing.png') }}" alt="E book">
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container mt-5 container-body">
    <h4><strong>Author</strong></h4>
    <div class="container mt-3">
        <div style="align-items: flex-start;" class="responsive">
            @foreach ($authors as $author)
            <div class="px-2">
                <div class="card">
                    <div class="card-body">
                        {{ $author->name }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="container mt-5 container-body">
    <h4><strong>Recomendation for you</strong></h4>
    <div class="row">
        @foreach ($books as $book)
        <div class="col-md-3 mt-3">
            <a style="color: #ffffff00" href="{{ route('landingdetail', $book->slug) }}" class="text-decoration-none">
                <div class="card card-shadow card-hover">
                    <div class="card-title">
                        <img style="max-height: 120px; width:300px;" src="{{ $book->takeImage }}" class="img-fluid"
                            alt="">
                    </div>
                    <div style="margin-top: -20px" class="card-body">
                        <div class="text-category-tag">
                            {{ $book->category->category_name }} |
                            {{ $book->tag->tag_name }}
                        </div>
                        <div class="text-title">
                            {{ $book->title }}
                        </div>
                        <div class="row justify-content-between px-3 mt-2">
                            <div class="text-price">
                                ${{ $book->price }}
                            </div>
                            <div class="text-publish">
                                123 sales
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div style="height: 100px">

    </div>
</div>

@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
    $('.responsive').slick({

  infinite: false,
  speed: 300,
  slidesToShow: 5,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
</script>
@endsection
