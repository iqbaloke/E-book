@extends('layouts.admin.back')
@section('header')
<link href="{{ asset('template') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="card shadow">
            <div class="card-header">
                Create New Category
            </div>
            <div class="card-body">
                <form action="{{ route('categorycreate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">images</label>
                        <input type="file" name="thumbnail" id="thumbnail">
                    </div>
                    <div class="form-group">
                        <label for="category_name" class="form-label">Category Name</label>
                        <input type="text" name="category_name" class="form-control" id="category_name"
                            placeholder="please insert category name" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Create Category</button>
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
                                <th>Images</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categorys as $index => $category)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="text-center">
                                    <img style="height: 30px;" src="{{ $category->takeImage }}" class="img-fluid"
                                        alt="">
                                </td>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    <div class="row px-2">
                                        <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal"
                                            data-target="#exampleModal{{ $category->id }}">
                                            update
                                        </button>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#exampleModaldelete{{ $category->id }}">
                                            delete
                                        </button>
                                    </div>

                                    <!-- Modal update -->
                                    <div class="modal fade" id="exampleModal{{ $category->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Do You Want
                                                        Update the Category {{ $category->category_name }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('categoryupdate', $category->slug) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method("PATCH")
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <input type="file" name="thumbnail" id="thumbnail"
                                                                class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="category_name" class="form-label">Category
                                                                Name</label>
                                                            <input type="text" name="category_name" class="form-control"
                                                                id="category_name"
                                                                value="{{ old('category_name', $category->category_name) ?? '' }}"
                                                                placeholder="please insert category name" required>
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
                                    <div class="modal fade" id="exampleModaldelete{{ $category->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModaldeleteLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModaldeleteLabel">Do you
                                                        want delete category {{ $category->category_name }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('categorydelete', $category->slug) }}"
                                                    method="POST">
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
