@extends('layouts.landing.back')
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
    <div class="container mt-5">
        <h4><strong>check out {{ $book->title }}</strong></h4>
    </div>
    <div style="height: 100px">

    </div>
</div>
@endsection
