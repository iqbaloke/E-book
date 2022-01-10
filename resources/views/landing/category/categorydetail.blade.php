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
<section class="home-dashboard">
    <div class="container">
        <div class="row ">
            <div class="col-md-6 d-flex align-items-center">
                <div>
                    <p style="font-size: 24px;  font-weight: 700;
                    color: #ffffff;
                    margin: 0 0 ">Category {{ $title }}</p>
                    <p style="font-size: 16px;  font-weight: 500;
                    color: #ffffff;
                    margin: 0 0 ">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="mt-4">
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <img style=" border: 2px solid rgba(128, 128, 128, 0); border-radius: 20px;" src="{{ $category->takeImage }}" alt="">
            </div>
        </div>
    </div>
</section>
<div style="padding-top: 40px" class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <div class="row d-flex justify-content-between px-3">
                        <div>
                            {{ $title }}
                        </div>
                        <div>
                            {{ $books->count() }}
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($categorytags as $tag)
                    <li class="list-group-item">
                        <div class="row d-flex justify-content-between px-3">
                            <a href="{{ route('categorytagdetail', [$title,$tag->tag_name]) }}">
                                <div>
                                    {{ $tag->tag_name }}
                                </div>
                            </a>
                            <div>
                                {{ $tag->book->count() }}
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            {{-- <div class="py-4 text-center">
                <h4>all book in category</h4>
                <hr>
            </div> --}}
            <div class="row">
                @foreach ($books as $book)
                <div class="col-md-4">
                    <a style="color: rgba(255, 255, 255, 0)" href="{{ route('landingdetail', $book->slug) }}">
                        <div class="card card-shadow card-hover">
                            <div class="card-title">
                                <img style="max-height:120px; width:350px" src="{{ $book->takeImage }}"
                                    class="img-fluid" alt="">
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
        </div>
    </div>
</div>
<div style="height: 1000px">

</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
@endsection
