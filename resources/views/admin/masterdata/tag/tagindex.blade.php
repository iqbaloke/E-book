@extends('layouts.admin.back')
@section('header')
<link href="{{ asset('template') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="card shadow">
            <div class="card-header">
                Create New tag
            </div>
            <div class="card-body">
                <form action="{{ route('tagcreate') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="tag_name" class="form-label">tag Name</label>
                        <input type="text" name="tag_name" class="form-control" id="tag_name"
                            placeholder="please insert tag name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option selected>Select category !!!</option>
                            @foreach ($categorys as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Create tag</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tags as $index => $tag)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $tag->tag_name }}</td>
                                <td>{{ $tag->slug }}</td>
                                <td>{{ $tag->category->category_name ?? "nul"}}</td>
                                <td>
                                    <div class="row px-2">
                                        <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal"
                                            data-target="#exampleModal{{ $tag->id }}">
                                            update
                                        </button>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#exampleModaldelete{{ $tag->id }}">
                                            delete
                                        </button>
                                    </div>

                                    <!-- Modal update -->
                                    <div class="modal fade" id="exampleModal{{ $tag->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Do You Want
                                                        Update the tag {{ $tag->tag_name }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('tagupdate', $tag->slug) }}" method="POST">
                                                    @csrf
                                                    @method("PATCH")
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="tag_name" class="form-label">tag
                                                                Name</label>
                                                            <input type="text" name="tag_name" class="form-control"
                                                                id="tag_name"
                                                                value="{{ old('tag_name', $tag->tag_name) ?? '' }}"
                                                                placeholder="please insert tag name" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Categorys</label>
                                                            <select name="category" id="category" class="form-control">
                                                                <option disabled selected>Chosee One !!!</option>
                                                                @foreach ($categorys as $category)
                                                                <option {{ $tag->tag_id == $category->id ? 'selected' :
                                                                    '' }} value="{{ $category->id }}">{{
                                                                    $category->category_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">cancle</button>
                                                        <button type="submit" class="btn btn-primary">update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal delete-->
                                    <div class="modal fade" id="exampleModaldelete{{ $tag->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModaldeleteLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModaldeleteLabel">Do you
                                                        want delete tag {{ $tag->tag_name }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('tagdelete', $tag->slug) }}" method="POST">
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
                                </td>
                            </tr>
                            @empty
                            <div class="text-center">
                                <h1>Data Not Found</h1>
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('template') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('template') }}/js/demo/datatables-demo.js"></script>
@endsection
