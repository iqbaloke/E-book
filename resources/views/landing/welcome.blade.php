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
    <h4><strong>Authors</strong></h4>
    <div class="container mt-3">
        <div style="align-items: flex-start; " class="authors">
            @foreach ($authors as $author)
            <div class="mt-3 px-2">
                {{-- <a style="color: #ffffff00" href="{{ route('landingdetail', $author->slug) }}" --}} {{--
                    class="text-decoration-none"> --}}
                    <div class="card card-shadow card-hover">
                        <div class="card-title">
                            @if ($author->takeImage == "/storage/")
                            <img style="height: 200px; width:800px;" src="{{ asset('images/no-image.png') }}"
                                class="img-fluid border" alt="">
                            @else
                            <img style="height: 200px; width:800px;" src="{{ $author->takeImage }}"
                                class="img-fluid border" alt="">
                            @endif
                        </div>
                        <div style="margin-top: -20px" class="card-body">
                            <div class="text-title">
                                {{ $author->name }}
                            </div>
                            <div class="text-category-tag">
                                {{ $author->userdetail->country ?? "confidential" }}
                            </div>
                            {{-- <div class="row justify-content-between px-3 py-2 ">
                                <div class="text-price">
                                    ${{ $author->income->total_income ?? "0"}}
                                </div>
                                <div class="text-publish d-flex align-items-center">
                                    {{ $author->book->count() }} Books
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    {{--
                </a> --}}
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="container mt-5 container-body">
    <h4><strong>Recomendation Books</strong></h4>
    <div class="container mt-3">
        <div style="align-items: flex-start; " class="recomendatoionbook">
            @foreach ($bookrecomendations as $recomendation)
            <div class="mt-3 px-2">
                <a style="color: #ffffff00" href="{{ route('landingdetail', $recomendation->slug) }}"
                    class="text-decoration-none">
                    <div class="card card-shadow card-hover">
                        <div class="card-title">
                            <img style="height: 150px; width:800px;" src="{{ $recomendation->takeImage }}"
                                class="img-fluid" alt="">
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
<div class="container mt-5 container-body">
    <h4><strong>All Books</strong></h4>
    <div class="row">
        @foreach ($books as $book)
        <div class="col-md-3 mt-3">
            <a style="color: #ffffff00" href="{{ route('landingdetail', $book->slug) }}" class="text-decoration-none">
                <div class="card card-shadow card-hover">
                    <div class="card-title">
                        <img style="height: 150px; width:800px;" src="{{ $book->takeImage }}" class="img-fluid" alt="">
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
    slidesToShow: 4,
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
    slidesToShow: 4,
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
