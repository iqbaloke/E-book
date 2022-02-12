@extends('layouts.creator.back')

@section('content')
<div class="container-fluid">
    @if (session("success"))
    <div class="alert alert-info text-dark text-center">
        {{ session("success") }}
    </div>
    @endif
    <h5>You Have {{ auth()->user()->cart->count() }} book in cart</h5>
    <hr>
    @if ($carts->count() == "0")
    <div class="text-center">
        <img src="{{ asset('images/no-data.jpg') }}" alt="">
    </div>
    @else
    <div class="row">
        @foreach ($carts as $cart)
        <div class="col-md-3 mt-3">
            {{-- <a href="{{ route('landingdetail', $cart->book->slug) }}" class="text-decoration-none"> --}}
                <div style="height: 320px;" class="card card-shadow">
                    <div class="card-title">
                        <img style="max-height: 130px; width:300px;" src="{{ $cart->book->takeImage }}"
                            class="img-fluid" alt="">
                    </div>
                    <div style="margin-top: -20px" class="card-body">
                        <div style="color: red">
                            {{ $cart->book->category->category_name }} |
                            {{ $cart->book->tag->tag_name }}
                        </div>
                        <div style="color: black" class="text-title mt-2">
                            <h6><strong>{{ $cart->book->title }}</strong></h6>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <div style="color: blue" class="text-price">
                                <h5>
                                    <strong>${{ $cart->price }}</strong>
                                </h5>
                            </div>
                            <div style="color: black" class="text-publish">
                                123 sales
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-text px-3 mb-2">
                        <div class="d-flex justify-content-end">
                            <div>
                                <a href="{{ route('landingdetail', $cart->book->slug) }}"
                                    class="btn btn-primary btn-sm text-decoration-none">Detail</a>
                            </div>
                            <div class="ml-2">
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#exampleModal{{ $cart->book->id }}">
                                    delete
                                </button>
                                <div class="modal fade" id="exampleModal{{ $cart->book->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Do You Want delete
                                                    <strong>{{ $cart->book->title }}</strong>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
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
                            </div>
                        </div>
                    </div>
                </div>
                {{--
            </a> --}}
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection
