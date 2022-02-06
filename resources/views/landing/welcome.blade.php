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

    .slick-list {
        padding-left: 0px !important;
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
                    {{-- <div class="row border-icon">
                        <a href="" class="border border-danger">
                            <i class="fas fa-file-pdf text-danger"></i>
                        </a>
                        <a href="" class="border border-danger">
                            <i class="fas fa-file-pdf text-danger"></i>
                        </a>
                        <a href="" class="border border-danger">
                            <i class="fas fa-file-pdf text-danger"></i>
                        </a>
                    </div> --}}
                </div>

            </div>
            <div class="col-lg-5 col-md-5 d-flex justify-content-center">
                <div class="home-img">
                    <div class="circle">
                    </div>
                    <img src="{{ asset('images/landing.png') }}" alt="E book">
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid mt-5 container-body">
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-body">
                <h4><strong>Authors</strong></h4>
                <hr>
                <div class="authors">
                    @foreach ($authors as $author)
                    <div class="mt-3 px-2">
                        <div style="border-radius:10px;" class="card card-hover">
                            @if ($author->userdetail->thumbnail == null)
                            <img style="height: 200px; width:800px; border-radius:10px;"
                                src="{{ asset('images/no-data.jpg') }}" class="img-fluid" alt="">
                            @else
                            <img style="height: 200px; width:800px; border-radius:10px;" src="{{ $author->takeImage }}"
                                class="img-fluid " alt="">
                            @endif
                            <div class="card-body">
                                <div class="text-title mt-2">
                                    {{ $author->name }}
                                </div>
                                <div class="text-category-tag">
                                    {{ $author->userdetail->country ?? "confidential" }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-5 container-body">
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-body">
                <h4><strong>Recomendation For You</strong></h4>
                <hr>
                <div class="recomendatoionbook mt-3">
                    @foreach ($bookrecomendations as $recomendation)
                    <div class="py-3 px-2">
                        <a style="color: #ffffff00" href="{{ route('landingdetail', $recomendation->slug) }}"
                            class="text-decoration-none">
                            <div style="border-radius:10px; border: 1px solid;
                            padding: 10px;
                            box-shadow: 2px 2px 5px 2px #ebebeb;" class="card card-hover">
                                <div class="card-title">
                                    <img style="height: 150px; width:800px; border-radius:10px;"
                                        src="{{ $recomendation->takeImage }}" class="img-fluid" alt="">
                                </div>
                                <div style="margin-top: -20px" class="card-body">
                                    <div class="text-category-tag">
                                        {{ $recomendation->category->category_name }} |
                                        {{ $recomendation->tag->tag_name }}
                                    </div>
                                    <div class="text-title">
                                        {{ Str::limit($recomendation->title, 25) }}
                                    </div>
                                </div>
                                <hr>
                                <div class="card-text px-3">
                                    <div class="row justify-content-between px-3 mb-2 ">
                                        <div class="text-price">
                                            ${{ $recomendation->price }}
                                        </div>
                                        <div class="text-publish d-flex align-items-center">
                                            {{ $recomendation->order->count() }} sales
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div style="padding-Left:30px;padding-right:30px;" class="container-fluid mt-5 container-body">
    <div class="card">
        <div class="card-body">
            <h4><strong>All Books</strong></h4>
            <hr>
            <div class="row mt-3">
                @foreach ($books as $book)
                <div class="col-md-3 mt-3">
                    <a style="color: #ffffff00" href="{{ route('landingdetail', $book->slug) }}"
                        class="text-decoration-none">
                        <div style="border-radius:10px; border: 1px solid;
                        padding: 10px;
                        box-shadow: 2px 2px 5px 2px #ebebeb;" class="card card-hover">
                            <div class="card-title">
                                <img style="height: 150px; width:800px; border-radius:10px;"
                                    src="{{ $book->takeImage }}" class="img-fluid" alt="">
                            </div>
                            <div style="margin-top: -20px" class="card-body">
                                <div class="text-category-tag">
                                    {{ $book->category->category_name }} |
                                    {{ $book->tag->tag_name }}
                                </div>
                                <div class="text-title">
                                    {{ Str::limit($book->title, 25) }}
                                </div>
                            </div>
                            <hr>
                            <div class="card-text px-3">
                                <div class="row justify-content-between px-3 mb-2 ">
                                    <div class="text-price">
                                        ${{ $book->price }}
                                    </div>
                                    <div class="text-publish d-flex align-items-center">
                                        {{ $book->order->count() }} sales
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
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
    $('.recomendatoionbook').slick({
    infinite: false,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
        {
        breakpoint: 1024,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 3,
            infinite: true,
            dots: true
        }
        },
        {
        breakpoint: 600,
        settings: {
            slidesToShow: 1,
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
<script>
    $('.authors').slick({
    infinite: false,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
        {
        breakpoint: 1024,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 3,
            infinite: true,
            dots: true
        }
        },
        {
        breakpoint: 600,
        settings: {
            slidesToShow: 1,
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
