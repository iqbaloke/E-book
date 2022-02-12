@extends('layouts.creator.back')

@section('content')
<div class="container-fluid">
    @if (session("success"))
    <div class="alert alert-info text-dark text-center">
        {{ session("success") }}
    </div>
    @endif
    <h5>You Have {{ auth()->user()->purchased->count() }} book purchased</h5>
    <hr>
    @if ($purchaseds->count() == "0")
    <div class="text-center">
        <img src="{{ asset('images/no-data.jpg') }}" alt="">
    </div>
    @else
    <div class="row">
        @foreach ($purchaseds as $purchased)
        <div class="col-md-3 mt-3">
            <div style="height: 320px;" class="card card-shadow">
                <div class="card-title">
                    <img style="max-height: 130px; width:300px;" src="{{ $purchased->book->takeImage }}"
                        class="img-fluid" alt="">
                </div>
                <div style="margin-top: -20px" class="card-body">
                    <div style="color: red">
                        {{ $purchased->book->category->category_name }} |
                        {{ $purchased->book->tag->tag_name }}
                    </div>
                    <div style="color: black" class="text-title mt-2">
                        <h6><strong>{{ $purchased->book->title }}</strong></h6>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <div style="color: blue" class="text-price">
                            <h5>
                                <strong>${{ $purchased->book->price }}</strong>
                            </h5>
                        </div>
                        <div style="color: black" class="text-publish">
                            123 sales
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-text px-2 mb-2">
                    <div class="d-flex justify-content-end">
                        <div>
                            <a style="font-size: 10px;" href="{{ route('landingdetail', $purchased->book->slug) }}"
                                class="btn btn-primary btn-sm text-decoration-none">Download</a>
                        </div>
                        <div class="ml-2">
                            <button style="font-size: 10px;" type="button" class="btn btn-success btn-sm"
                                data-toggle="modal" data-target="#exampleModal">
                                Show
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection
