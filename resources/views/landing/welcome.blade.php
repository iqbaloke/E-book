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
<div style="padding-top: 20px;" class=" mt-5 container-body">
    <div class="mt-3">
        <div class="card">
            <div class="category py-2">
                @foreach ($category as $author)
                <div class="text-center">
                    {{ $author->category_name }}
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@role('super admin|admin|creator')
<div style="padding-top: 100px;" class="container-fluid">
    <div class="row">
        <div class="col-md-6 d-flex align-items-center">
            <div style=" border: 2px solid rgb(89, 0, 255); border-radius: 10px;" class="px-3 py-3">
                <p style="font-size: 24px;  font-weight: 700;
                    color: #000000;
                    margin: 0 0 ">Hi, {{ auth()->user()->name }}</p>
                <p style="font-size: 24px;  font-weight: 700;
                    color: #000000;
                    margin: 0 0 ">show that your work is of high quality and worthy of being seen by others</p>
                <p style="font-size: 16px;  font-weight: 500;
                    color: #000000;
                    margin: 0 0 ">upload your product now and show it to others</p>
                <a href="{{ route('bookcreator') }}" class="btn btn-primary btn-sm mt-4">Upload new product</a>
            </div>
        </div>
        {{-- <div class="col-md-6 d-flex align-items-center">
            <img style=" border: 2px solid rgba(128, 128, 128, 0); border-radius: 20px; height:230px;"
                src="{{ asset('images/person.jpg') }}" alt="">
        </div> --}}
    </div>
</div>
@endrole
@role('super admin|admin|wreitter')
<div style="padding-top: 100px;" class="container-fluid">
    <div class="row">
        <div class="col-md-6 d-flex align-items-center">
            <div style=" border: 2px solid rgb(89, 0, 255); border-radius: 10px;" class="px-3 py-3">
                <p style="font-size: 24px;  font-weight: 700;
                    color: #000000;
                    margin: 0 0 ">Hi, {{ auth()->user()->name }}</p>
                <p style="font-size: 24px;  font-weight: 700;
                    color: #000000;
                    margin: 0 0 ">increase your income, by becoming a creator !!!</p>
                <p style="font-size: 16px;  font-weight: 500;
                    color: #000000;
                    margin: 0 0 ">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua</p>
                <a href="{{ route('becomeacreator') }}" class="btn btn-primary btn-sm mt-4">Becomeming a creator</a>
            </div>
        </div>
        {{-- <div class="col-md-6 d-flex align-items-center">
            <img style=" border: 2px solid rgba(128, 128, 128, 0); border-radius: 20px; height:230px;"
                src="{{ asset('images/person.jpg') }}" alt="">
        </div> --}}
    </div>
</div>
@endrole
<div class="container-fluid mt-5 container-body">
    <div class="container-fluid mt-3">
        <div class="row justify-content-between px-3">
            <h5><strong>Recomendation For You</strong></h5>
            <h5 class="text-success"><strong>see all <i class="fa-solid fa-arrow-right"></i></strong></h5>
        </div>
        <div class="recomendatoionbook mt-2">
            @foreach ($bookrecomendations as $recomendation)
            <div class="py-2 px-1">
                <a style="color: #ffffff00" href="{{ route('landingdetail', $recomendation->slug) }}"
                    class="text-decoration-none">
                    <div style="border-radius:3px; border: 1px solid;
                            box-shadow: 2px 2px 5px 2px #ebebeb;" class="card card-hover">
                        <img class="card-img-top" src="{{ $recomendation->takeImage }}" alt="" style="height: 180px;">
                        <div style="margin-top: -10px; height:150px;" class="card-body">
                            <div class="text-category-tag">
                                {{ $recomendation->category->category_name }} |
                                {{ $recomendation->tag->tag_name }}
                            </div>
                            <div class="text-title">
                                {{ Str::limit($recomendation->title, 75) }}
                            </div>
                            <div class="text-title text-dark ml-1 mt-1">
                                <div class="row">
                                    <i class="fa-solid fa-star text-warning mr-1"></i>
                                    <h6>4.6 (reviews)</h6>
                                </div>
                            </div>
                            <div style="font-size: 16px; color:rgb(100, 100, 100);">
                                Author : {{ $recomendation->user->name }}
                            </div>
                        </div>
                        <hr>
                        <div class="card-text px-3">
                            <div class="row justify-content-between px-3 mb-2">
                                <div class="text-price">
                                    ${{ $recomendation->price }}
                                </div>
                                <div class="text-publish d-flex align-items-center">
                                    {{ $recomendation->order->count() }} sales
                                </div>
                            </div>
                            <div class="row justify-content-end px-2 mb-2">
                                <div class="mr-1">
                                    <button class="btn btn-primary btn-sm"><i
                                            class="fa-solid fa-cart-plus"></i></button>
                                </div>
                                <button class="btn btn-danger btn-sm">Buy</button>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="container-fluid mt-5 container-body">
    <div class="container-fluid mt-3">
        <div class="row justify-content-between px-3">
            <h5><strong>Top Author</strong></h5>
            <h5 class="text-success"><strong>see all <i class="fa-solid fa-arrow-right"></i></strong></h5>
        </div>
        <div class="authors">
            @foreach ($authors as $author)
            <div class="mt-3 px-1">
                <div class="card card-hover">
                    @if ($author->userdetail->thumbnail == null)
                    <img style="height: 180px;" src="{{ asset('images/no-data.jpg') }}" class="img-fluid" alt="">
                    @else
                    <img style="height: 180px;" src="{{ $author->takeImage }}" class="img-fluid " alt="">
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
<div style="padding-Left:30px;padding-right:30px;" class="container-fluid mt-5 container-body">
    <div class="row justify-content-between px-3">
        <h5><strong>All Book</strong></h5>
        <h5 class="text-success"><strong>see all <i class="fa-solid fa-arrow-right"></i></strong></h5>
    </div>
    <div class="row mt-1">
        @foreach ($books as $book)
        <div class="col-md-3 mt-4">
            <a style="color: #ffffff00" href="{{ route('landingdetail', $book->slug) }}" class="text-decoration-none">
                <div style=" border: 1px solid;
                        box-shadow: 2px 2px 5px 2px #ebebeb;" class="card card-hover">
                    <div class="card-title">
                        <img style="height: 240px;" src="{{ $book->takeImage }}" class="img-fluid" alt="">
                    </div>
                    <div style="margin-top: -20px; height:150px;" class="card-body">
                        <div class="text-category-tag">
                            {{ $book->category->category_name }} |
                            {{ $book->tag->tag_name }}
                        </div>
                        <div class="text-title">
                            {{ Str::limit($book->title, 75) }}
                        </div>
                        <div class="text-title text-dark ml-1 mt-1">
                            <div class="row">
                                <i class="fa-solid fa-star text-warning mr-1"></i>
                                <h6>4.6 (reviews)</h6>
                            </div>
                        </div>
                        <div style="font-size: 16px; color:rgb(100, 100, 100); margin-left:-10px;">
                            Author : {{ $recomendation->user->name }}
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
                        <div class="row justify-content-end px-2 mb-2">
                            <div class="mr-1">
                                <button class="btn btn-primary btn-sm"><i class="fa-solid fa-cart-plus"></i></button>
                            </div>
                            <button class="btn btn-danger btn-sm">Buy</button>
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
<script>
    $('.category').slick({
    infinite: false,
    speed: 300,
    slidesToShow: 8,
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
