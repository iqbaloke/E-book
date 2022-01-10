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
<div style="padding-top: 100px" class="container">
    <h3 class="text-center">All Categorys</h3>
    <div class="row">
        @foreach ($categorys as $category)
        <div class="col-md-3 py-3">
            <div class="card">
                <a style="color: rgba(255, 255, 255, 0)" href="{{ route('categorydetail', $category->category_name) }}">
                    <div class="card  card-hover">
                        <div class="card-title text-center">
                            <img style="height: 150px; width:250px;" src="{{ $category->takeImage }}" class="img-fluid" alt="">
                        </div>
                        <div class="card-body">
                            <div class="text-title">
                                {{ $category->category_name }}
                            </div>
                            <div class="text-publish">
                                {{ $category->book->count() }} category in book
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div style="height: 1000px">

</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
{{-- <script>
    $('.responsive').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 3
});
</script> --}}
{{-- <script>
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
</script> --}}
@endsection
