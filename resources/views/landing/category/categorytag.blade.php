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
    <div class="mt-3 text-center">
        <h4>{{ $category }}</h4>
        <h6>{{ $tag }}</h6>
    </div>
    <div class="row mt-4">
        @foreach ($tagbook as $book)
        <div class="col-md-4">
            <a style="color: #ffffff00" href="{{ route('landingdetail', $book->slug) }}" class="text-decoration-none">
                <div class="card card-shadow card-hover">
                    <div class="card-title">
                        <img style="max-height:200px; width:350px" src="{{ $book->takeImage }}"
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
                        {{-- <div class="text-publish">
                            {{ $book->created_at->format("d F, Y") }}
                        </div>
                        <div class="text-publish">
                            {{ $book->tag->tag_name }}
                        </div> --}}
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
<div style="height: 1000px">

</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
@endsection
