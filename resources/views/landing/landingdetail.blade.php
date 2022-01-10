@extends('layouts.landing.back')

@section('content')

<div style="padding-top: 100px" class="container">
    <div class="d-flex justify-content-between">
        <div>
            <div class="text-title">
                {{ $title }}
            </div>
            <div class="text-publish">
                123 sales | <strong style="color: blue">indnonesia, palembang</strong>
            </div>
        </div>
        <div class="row d-flex">
            <div class="px-2">
                <button style="font-size: 10px;" class="btn btn-primary btn-sm">buy</button>
            </div>
            <form action="{{ route('addtocart',$book->slug) }}" method="POST">
                @csrf
                <button type="submit" style="font-size: 10px;" class="btn btn-success btn-sm">add to cart</button>
            </form>
        </div>
    </div>
    <hr>
    @if (session("error"))
    <div class="alert alert-danger text-dark text-center">
        {{ session("error") }}
    </div>
    @endif
    @if (session("success"))
    <div class="alert alert-info text-dark text-center">
        {{ session("success") }}
    </div>
    @endif
    <div style="margin-left: -25px; padding-top:30px;" class="row">
        <div class="col-md-6">
            <img style="max-height: 300px; width:600px; border: 2px solid grey; border-radius: 10px;"
                src="{{ $book->takeImage }}" class="img-fluid" alt="">
        </div>
        <div class="col-md-6">
            <div style="color: blue" class="text-publish">
                <i class="far fa-clock pr-2"></i> {{ $book->created_at->format("d F, Y") }}
            </div>
            <div class="text-description mt-1">
                {{ $book->description }}
            </div>
            <div style="padding-top:10px; color:grey; font-weight: 700;" class="text-publish">
                <div>
                    <strong>Page Book :</strong> {{ $book->page }} pages
                </div>
                <div>
                    <strong>Price Book :</strong> {{ $book->price }}
                </div>
                <div>
                    <strong>file Book :</strong> {{ $book->file->name }}
                </div>
            </div>
            <div class="mt-3">
                <div class="row d-flex text-publish border px-2 py-1">
                    <div>
                        <i class="fas fa-shopping-cart"></i> 120 sales
                    </div>
                    <div class="pl-3">
                        <i class="fas fa-eye"></i> {{ $book->comment->count() }} Reviews
                    </div>
                    <div class="pl-3">
                        <i style="color: yellow" class="fas fa-star"></i> 4.5 starts
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <div style="margin-left:-10px; background-color:#021B79; border: 2px solid none; border-radius: 10px;"
                    class="px-2 py-2">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <img style="height: 50px; width:50px" src="{{ $book->takeImage }}"
                                class="img-fluid img-border-radius" alt="">
                            <div class="mt-1">
                                <div style="color: white" class="text-author">
                                    {{ $book->user->name }}
                                </div>
                                <div style="color: white" class="text-book-count">
                                    Book Publish : {{ $book->user->book->count() }}
                                </div>
                            </div>
                        </div>
                        <div>
                            <button style="font-size: 10px;" class="btn btn-primary btn-sm">Check Profile</button>
                            <button style="font-size: 10px;" class="btn btn-success btn-sm">Follow</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

            <h5><strong>Reviews {{ $title }}</strong></h5>
            <div class="pl-3 text-publish">
                <i class="fas fa-eye"></i> {{ $book->comment->count() }} Reviews
            </div>
            <div class="mt-3">
                <div style="border: 1px solid rgb(180, 180, 180); border-radius: 8px;" class="px-2 py-2">
                    @foreach ($book->comment as $item)
                    <div class="d-flex">
                        <img style="height: 40px; width:40px" src="{{ $book->takeImage }}"
                            class="img-fluid img-border-radius" alt="">
                        <div class="mt-1">
                            <div class="d-flex">
                                @if ($item->user_id == "$book->user_id" )
                                <div class="text-author">
                                    <strong
                                        style="border: 1px solid rgba(0, 0, 0, 0); border-radius: 8px; font-size:12px;"
                                        class="bg-secondary px-2 text-light">{{ $item->user->name }}</strong>
                                    <i style="font-size: 12px;" class="fas fa-user-check"></i>
                                </div>
                                @else
                                <div class="text-author">
                                    {{ $item->user->name }}
                                </div>
                                @endif
                                <div class="text-book-count d-flex align-items-center">
                                    @if ($item->user_id == "$book->user_id")
                                    @else
                                    <i style="font-size: 10px;" class="fas fa-star text-warning"><strong
                                            style="color: black; margin-left:2px;">4</strong></i>
                                    @endif
                                </div>
                            </div>
                            <div class="text-book-count mt-1">
                                {{ $item->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                    <div style="padding-left: 60px; padding-top:10px;" class="text-book-count">
                        {{ $item->description }}
                    </div>
                    <hr>
                    {{-- <div style="padding-left: 60px; ">
                        <div class="d-flex">
                            <img style="height: 40px; width:40px" src="{{ $book->takeImage }}"
                                class="img-fluid img-border-radius" alt="">
                            <div class="mt-1">
                                <div class="d-flex">
                                    <div class="text-author">
                                        {{ $book->user->name }}
                                    </div>
                                </div>
                                <div class="text-book-count">
                                    12 day ago
                                </div>
                            </div>
                        </div>
                        <div style="padding-left: 60px; padding-top:10px;" class="text-book-count">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                        </div>
                    </div> --}}
                    @endforeach
                </div>
            </div>
            <form action="{{ route('comment', $book->slug) }}" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <textarea name="description" id="description" class="form-control"
                        placeholder="Comment...."></textarea>
                    {{-- <textarea name="" id="" cols="30" rows="10"></textarea> --}}
                </div>
                <div class="row justify-content-end px-3 pb-2">
                    <button type="submit" class="btn btn-primary btn-sm">comment</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container mt-5">
    {{-- <div class="d-flex"> --}}
        {{-- <h5><strong>Reviews {{ $title }}</strong></h5>
        <div class="pl-3 text-publish">
            <i class="fas fa-eye"></i> 1543 Reviews
        </div> --}}
        {{-- <p style="font-size: 14px; margin-left:10px">100</p>
        <p style="padding-top: 2px;">/ 4.5</p> --}}
        {{--
    </div> --}}
    {{-- <div class="d-flex">
        <h6>Filter By :</h6>
        <div class="px-1">
            <button style="font-size: 10px;" class="btn btn-success btn-sm">all reviews</button>
        </div>
        <div class="px-1">
            <button style="font-size: 10px;" class="btn btn-success btn-sm">5 stars</button>
        </div>
        <div class="px-1">
            <button style="font-size: 10px;" class="btn btn-success btn-sm">4 stars</button>
        </div>
        <div class="px-1">
            <button style="font-size: 10px;" class="btn btn-success btn-sm">3 stars</button>
        </div>
        <div class="px-1">
            <button style="font-size: 10px;" class="btn btn-success btn-sm">2 stars</button>
        </div>
        <div class="px-1">
            <button style="font-size: 10px;" class="btn btn-success btn-sm">1 stars</button>
        </div>
    </div> --}}
    {{--
    <hr> --}}
    {{-- <div>
        <div class="d-flex">
            <img style="height: 40px; width:40px" src="{{ $book->takeImage }}" class="img-fluid img-border-radius"
                alt="">
            <div class="text-author d-flex align-items-center">
                {{ auth()->user()->name }}
            </div>
        </div>
        <form action="{{ route('comment', $book->slug) }}" method="POST">
            @csrf
            <div class="form-group mt-3">
                <textarea name="description" id="description" class="form-control" placeholder="Comment...."></textarea>
            </div>
            <div class="row justify-content-end px-3 pb-2">
                <button type="submit" class="btn btn-primary btn-sm">comment</button>
            </div>
        </form>
    </div> --}}
    {{-- <div>
        @foreach ($book->comment as $item)
        <div class="card">
            <div class="card-body">
                <div>
                    <div class="d-flex">
                        <img style="height: 40px; width:40px" src="{{ $book->takeImage }}"
                            class="img-fluid img-border-radius" alt="">
                        <div class="mt-1">
                            <div class="d-flex">
                                <div class="text-author">
                                    @if ($item->user_id == "$book->user_id" )
                                    {{ $item->user->name }} <i style="font-size: 12px;" class="fas fa-user-check"></i>
                                    @else
                                    {{ $item->user->name }}
                                    @endif
                                </div>
                                <div class="text-book-count d-flex align-items-center">
                                    @if ($item->user_id == "$book->user_id")
                                    @else
                                    <i style="font-size: 10px;" class="fas fa-star text-warning"><strong
                                            style="color: black; margin-left:2px;">4</strong></i>
                                    @endif
                                </div>
                            </div>
                            <div class="text-book-count">
                                {{ $item->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                    <div style="padding-left: 60px; padding-top:10px;" class="text-book-count">
                        {{ $item->description }}
                        <hr>
                    </div>
                    <div style="padding-left: 60px; ">
                        <div class="d-flex">
                            <img style="height: 40px; width:40px" src="{{ $book->takeImage }}"
                                class="img-fluid img-border-radius" alt="">
                            <div class="mt-1">
                                <div class="d-flex">
                                    <div class="text-author">
                                        {{ $book->user->name }}
                                    </div>
                                </div>
                                <div class="text-book-count">
                                    12 day ago
                                </div>
                            </div>
                        </div>
                        <div style="padding-left: 60px; padding-top:10px;" class="text-book-count">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div> --}}
</div>
<div style="height: 1000px">


</div>
@endsection
