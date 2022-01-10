@extends('layouts.creator.back')
@section('content')
<style>
    .detail-book .title-product h5 {
        color: black;
    }

    .detail-book .starts {
        color: black;
        font-size: 11px;
    }

    .detail-book .publish {
        margin-top: -5px;
    }

    .detail-book .show-book .text-button {
        margin-top: -15px;
        font-size: 12px;
    }

    .detail-book p {
        font-size: 14px;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #ffffff;
        background-color: #021B79;
        border-color: #dddfeb #dddfeb #fff;
    }

    .text-title {
        font-size: 18px;
        font-weight: 600;
        margin-left: -10px;
        color: #000000;
    }

    .text-publish {
        font-size: 12px;
        font-weight: 300;
        margin-left: -10px;
        color: #000000;
    }

    .text-book-count {
        padding-left: 20px;
        font-size: 10px;
        font-weight: 300;
        margin-left: -10px;
        color: #000000;
    }

    .text-author {
        padding-left: 20px;
        font-size: 14px;
        font-weight: 700;
        margin-left: -10px;
        color: #000000;
    }

    .text-description {
        font-size: 14px;
        font-weight: 300;
        margin-left: -10px;
        color: #000000;
    }

    .img-border-radius {
        border-radius: 50%;
    }
</style>
<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <div>
            <strong>Detail {{ $title }}</strong>
        </div>
        <div>
            <strong>10 sales</strong>
        </div>
    </div>
    <hr>
    <div class="row detail-book">
        <div class="col-md-4">
            <img src="{{ $books->takeImage }}" class="img-fluid" alt="">
        </div>
        <div class="col-md-8">
            <div class="d-flex">
                <div class="title-product">
                    <h5><strong>Detail {{ $title }}</strong></h5>
                </div>
                <div class="px-3 starts">
                    <p>(starts)</p>
                </div>
            </div>
            <div class="publish">
                <p>Publish : {{ $books->created_at->format('d F, Y') }}</p>
            </div>
            <div class="show-book">
                <button class="btn btn-success btn-sm text-button">Show Book</button>
            </div>
            <div>
                <p>{{ $books->description }}</p>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <ul class="nav nav-tabs mb-3 border border-secondary" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex1-tabcomment-1" data-mdb-toggle="tab" href="#ex1-tabcomments-1" role="tab"
                    aria-controls="ex1-tabcomments-1" aria-selected="true">Comment</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex1-tabbuy-2" data-mdb-toggle="tab" href="#ex1-tabbuys-2" role="tab"
                    aria-controls="ex1-tabbuys-2" aria-selected="false">Buy</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="ex1-tabupdate-3" data-mdb-toggle="tab" href="#ex1-tabupdates-3"
                    role="tab" aria-controls="ex1-tabupdates-3" aria-selected="false">Update</a>
            </li>
        </ul>
        <div class="tab-content" id="ex1-content">
            <div class="tab-pane fade" id="ex1-tabcomments-1" role="tabpanel" aria-labelledby="ex1-tabcomment-1">
                <div class="card">
                    <div class="card-body">
                        <div>
                            @foreach ($books->comment as $item)
                            <div class="mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <div class="d-flex">
                                                <img style="height: 40px; width:40px" src="{{ $books->takeImage }}"
                                                    class="img-fluid img-border-radius" alt="">
                                                <div class="mt-1">
                                                    <div class="d-flex">
                                                        <div class="text-author">
                                                            @if ($item->user_id == "$books->user_id" )
                                                            {{ $item->user->name }} <i style="font-size: 12px;"
                                                                class="fas fa-user-check"></i>
                                                            @else
                                                            {{ $item->user->name }}
                                                            @endif
                                                        </div>
                                                        <div class="text-book-count d-flex align-items-center">
                                                            @if ($item->user_id == "$books->user_id")
                                                            @else
                                                            <i style="font-size: 10px;"
                                                                class="fas fa-star text-warning"><strong
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
                                                    <img style="height: 40px; width:40px" src="{{ $books->takeImage }}"
                                                        class="img-fluid img-border-radius" alt="">
                                                    <div class="mt-1">
                                                        <div class="d-flex">
                                                            <div class="text-author">
                                                                {{ $books->user->name }}
                                                            </div>
                                                        </div>
                                                        <div class="text-book-count">
                                                            12 day ago
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="padding-left: 60px; padding-top:10px;"
                                                    class="text-book-count">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod
                                                    tempor
                                                    incididunt ut
                                                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                    exercitation
                                                    ullamco
                                                    laboris nisi ut aliquip ex ea commodo consequat.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="ex1-tabbuys-2" role="tabpanel" aria-labelledby="ex1-tabbuy-2">
                buy
            </div>
            <div class="tab-pane fade show active" id="ex1-tabupdates-3" role="tabpanel"
                aria-labelledby="ex1-tabupdate-3">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('updatebookcreator', $books->slug) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method("PATCH")
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="thumbnail" class="form-label">Images</label>
                                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="book_file" class="form-label">Book File</label>
                                        <input type="file" name="book_file" id="book_file" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category" class="form-label">Category</label>
                                        <select name="category_id" id="category_id" class="form-control form-control-sm"
                                            required>
                                            <option disabled selected>Select Category !!!</option>
                                            @foreach ($categorys as $category)
                                            <option {{ $books->category_id == $category->id ? 'selected' : '' }}
                                                value="{{ $category->id }}">
                                                {{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tag" class="form-label">tag</label>
                                        <select name="tag_id" id="tag_id" class="form-control form-control-sm" required>
                                            <option disabled selected>Select Tag !!!</option>
                                            @foreach ($tags as $tag)
                                            <option {{ $books->tag_id == $tag->id ? 'selected' : '' }}
                                                value="{{ $tag->id }}">{{ $tag->tag_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="file" class="form-label">file</label>
                                        <select name="file_id" id="file_id" class="form-control form-control-sm"
                                            required>
                                            <option disabled selected>Select file !!!</option>
                                            @foreach ($files as $file)
                                            <option {{ $books->file_id == $file->id ? 'selected' : '' }}
                                                value="{{ $file->id }}">{{ $file->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" id="title" class="form-control form-control-sm"
                                            required value="{{ old('title', $books->title) ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" name="price" id="price"
                                            class="form-control form-control-sm" required
                                            value="{{ old('price', $books->price) ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="year" class="form-label">Year</label>
                                        <input type="text" name="year" id="year" class="form-control form-control-sm"
                                            required value="{{ old('year', $books->year) ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="page" class="form-label">page</label>
                                        <input type="number" name="page" id="page" class="form-control form-control-sm"
                                            required value="{{ old('page', $books->page) ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="rorm-group">
                                <label for="publish">
                                    <input type="checkbox" {{ $books->publish ? 'checked' : '' }} name="publish"
                                    id="publish">
                                    <span class="select-none">Publish</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="description" class="form-label">description</label>
                                <textarea type="text" name="description" id="description"
                                    class="form-control form-control-sm"
                                    required>{{ old('description', $books->description) ?? '' }} </textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Update book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
