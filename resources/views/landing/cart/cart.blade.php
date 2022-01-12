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
        <h4><strong>Yor Cart</strong></h4>
        <h6>you have {{ auth()->user()->cart->count() }} book in cart</h6>
        <hr>
        @foreach ($carts as $cart)
        <div class="card mt-4">
            <div class="card-body shadow">
                <div class="d-flex">
                    <img style="height: 50px; width:50px" src="{{ $cart->book->user->takeImage }}"
                        class="img-fluid img-border-radius" alt="">
                    <div class="mt-1">
                        <div style="color: rgb(0, 0, 0)" class="text-author">
                            {{ $cart->book->user->name }}
                        </div>
                        <div style="color: rgb(0, 0, 0)" class="text-book-count">
                            Book Publish : {{ $cart->book->user->book->count() }}
                            book sales : {{ $cart->book->order->count() }}
                        </div>
                        <div style="margin-left: 10px; padding-top:10px;">
                            <button class="btn btn-primary btn-sm">show profile</button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ route('landingdetail', $cart->book->slug) }}">
                            <img src="{{ $cart->book->takeImage }}" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <h5><strong>{{ $cart->book->title }}</strong></h5>
                        {{ Str::limit($cart->book->description, 150)}}
                        <div style="padding-top:10px; margin-left:1px; color:rgb(0, 0, 0); font-weight: 300;"
                            class="text-publish">
                            <div>
                                <strong>Page Book :</strong> {{ $cart->book->page }} pages
                            </div>
                            <div>
                                <strong>Price Book :</strong> {{ $cart->book->price }}
                            </div>
                            <div>
                                <strong>file Book :</strong> {{ $cart->book->file->name }}
                            </div>
                        </div>
                        <div class="d-flex mt-3">
                            <button type="button" class="btn btn-danger btn-sm mr-1" data-toggle="modal"
                                data-target="#exampleModal{{ $cart->book->id }}">
                                delete
                            </button>
                            <div class="modal fade" id="exampleModal{{ $cart->book->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Do You Want delete cart
                                                <strong>{{ $cart->book->title }}</strong>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('favoritedelete',$cart->id) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('checkoutcreate', [$cart->book->slug, $cart->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Check Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div style="height: 100px">

    </div>
</div>
</div>

<div style="height: 100px">

</div>
@endsection
