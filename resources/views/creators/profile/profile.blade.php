@extends('layouts.creator.back')

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-4">
            @if (auth()->user()->userdetail->thumbnail == null)
            <img src="{{ asset('images/no-image.png') }}" alt="" class="img-fluid">
            @else
            <img src="{{ auth()->user()->takeImage }}" alt="" class="img-fluid">
            @endif
        </div>
        <div class="col-md-8">
            <h6>Name : {{ auth()->user()->name }}</h6>
            <h6>Email : {{ auth()->user()->email }}</h6>
            @if (!auth()->user()->userdetail)
            @else
            <h6>phone : {{ auth()->user()->userdetail->phone }}</h6>
            @endif
            @if (!auth()->user()->userdetail)
            @else
            <h6>Country : {{ auth()->user()->userdetail->country }}</h6>
            @endif
            <div style="padding-top: 20px;">
                <h6>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                </h6>
                aliquip ex ea commodo consequat.
            </div>
            <div class="d-flex justify-content-end">
                <!-- Button trigger modal -->
                @if (!auth()->user()->userdetail)
                @else
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalupdate">
                    update
                </button>
                @endif

                <!-- Modal -->
                <div class="modal fade" id="exampleModalupdate" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalupdateLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalupdateLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('profileupdate', auth()->user()->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method("PATCH")
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="thumbnail" class="form-label">thumbnail</label>
                                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="form-label">name</label>
                                        <input type="text" name="name" id="name" class="form-control" required
                                            value="{{ old('name', auth()->user()->name) ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="form-label">email</label>
                                        <input type="text" name="email" id="email" class="form-control" required
                                            value="{{ old('email', auth()->user()->email) ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" name="country" id="country" class="form-control" required
                                            value="{{ old('country', auth()->user()->userdetail->country ?? null) ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="form-label">phone</label>
                                        <input type="number" name="phone" id="phone" class="form-control" required
                                            value="{{ old('phone', auth()->user()->userdetail->phone ?? null) ?? '' }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-4">
    <div>
        <h5>the book you have bought</h5>
        <p>you have {{ $order->count() }} book buy</p>
    </div>
    <div class="row">
        @foreach (auth()->user()->cart as $cart)
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
</div>

<div style="height: 200px;">

</div>
@endsection
