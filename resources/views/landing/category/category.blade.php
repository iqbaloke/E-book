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
<div style="padding-top: 100px" class="container-fluid">
    {{-- <div class="row d-flex align-items-center"> --}}
        {{-- <div class="col-md-6 d-flex align-items-center">
            <div class="px-3 py-3">
                <p style="font-size: 30px;  font-weight: 700;
                            color: #000000;
                            margin: 0 0 ">Become A Creators,</p>
                <p style="font-size: 16px;  font-weight: 500;
                            color: #000000;
                            margin: 0 0;
                            padding-top:10px;
                            ">show your work to others, that your work is really quality and useful for others</p>
                <div class="mt-4">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div> --}}
        {{-- <div class="col-md-6 d-flex align-items-center">
            <img style=" border: 2px solid rgba(128, 128, 128, 0); border-radius: 20px;"
                src="{{ asset('images/person.jpg') }}" alt="">
        </div> --}}
    {{-- </div> --}}
    <div style="padding-top:100px; padding-bottom:50px;" class="text-center">
        <div>
            <p style="font-size: 30px;  font-weight: 700; color: #000000; margin: 0 0 ">Become A Creators,</p>
            <p style="font-size: 16px;  font-weight: 500; color: #000000; margin: 0 0; padding-bottom:10px;">show your
                work
                to others, that your work is really quality and useful for others</p>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <div class="col-md-6">
                <form action="">
                    <input type="text" name="" id="" class="form-control">
                </form>
            </div>
        </div>
    </div>
    {{-- <div class="card mt-4">
        <div class="card-body"> --}}
            <div class="row mt-5">
                @foreach ($categorys as $category)
                <div class="col-md-3 py-3">
                    <a style="color: rgba(255, 255, 255, 0)"
                        href="{{ route('categorydetail', $category->category_name) }}">
                        <div style="border-radius:10px; border: 1px solid;
                            padding: 10px;
                            box-shadow: 2px 2px 5px 2px #ebebeb;" class="card card-hover">
                            <img style="height: 200px; width:800px; border-radius:10px;"
                                src="{{ $category->takeImage }}" class="img-fluid" alt="">
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
                @endforeach
            </div>
            {{--
        </div>
    </div> --}}
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
