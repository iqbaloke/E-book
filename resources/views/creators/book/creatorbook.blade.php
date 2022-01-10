@extends('layouts.creator.back')
@section('header')
<link href="{{ asset('template') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-flex justify-content-between">
            <div>
                <h6 class="m-0 font-weight-bold text-primary">DataTables Book</h6>
            </div>
            <div>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                    Launch demo modal
                </button>

                <!-- Modal create-->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create New Book</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('createbookcreator') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="thumbnail" class="form-group">Images</label>
                                                <input type="file" name="thumbnail" id="thumbnail" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="book_file" class="form-group">Book File</label>
                                                <input type="file" name="book_file" id="book_file" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="category" class="form-label">Category</label>
                                                <select name="category_id" id="category_id"
                                                    class="form-control form-control-sm getcategory" required>
                                                    <option selected>Select Category !!!</option>
                                                    @foreach ($categorys as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tag" class="form-label">tag</label>
                                                <select name="tag_id" id="tag_id"
                                                    class="form-control form-control-sm tagname" required>
                                                    <option value="0" disabled="true" selected="true">Product Name
                                                    </option>
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
                                                    <option selected>Select file !!!</option>
                                                    @foreach ($files as $file)
                                                    <option value="{{ $file->id }}">{{ $file->name }}
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
                                                <input type="text" name="title" id="title"
                                                    class="form-control form-control-sm" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="price" class="form-label">Price</label>
                                                <input type="number" name="price" id="price"
                                                    class="form-control form-control-sm" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="year" class="form-label">Year</label>
                                                <input type="text" name="year" id="year"
                                                    class="form-control form-control-sm" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="page" class="form-label">page</label>
                                                <input type="number" name="page" id="page"
                                                    class="form-control form-control-sm" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rorm-group">
                                        <label for="publish">
                                            <input type="checkbox" name="publish" id="publish">
                                            <span class="select-none">Publish</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="form-label">description</label>
                                        <textarea type="text" name="description" id="description"
                                            class="form-control form-control-sm" required> </textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-sm">create new book</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Images</th>
                        <th>title</th>
                        <th>Book File</th>
                        <th>Publish</th>
                        <th>price</th>
                        <th>page</th>
                        <th>approved</th>
                        <th>buy</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $index => $book)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <img style="height: 50px; widht:50px;" src="{{ $book->takeImage }}" alt="E book">
                        </td>
                        <td>{{ $book->title }}</td>
                        <td>
                            {{ $book->file->name }}
                        </td>
                        <td>
                            @if ($book->publish == '1')
                            publish
                            @else
                            not publish
                            @endif
                        </td>
                        <td>${{ $book->price }}</td>
                        <td>{{ $book->page }} page</td>
                        <td>
                            @if ($book->approved == '0')
                            checking
                            @else
                            publish
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm mr-2" data-toggle="modal"
                                data-placement="top" title="delete" data-target="#exampleModaldelete{{ $book->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <!-- Modal delete-->
                            <div class="modal fade" id="exampleModaldelete{{ $book->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModaldeleteLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModaldeleteLabel">Do you want
                                                delete {{ $book->title }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('deletebookcreator', $book->slug) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method("DELETE")
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('detailbookcreator', $book->slug) }}" class="btn btn-primary btn-sm"
                                data-toggle="tooltip" data-placement="top" title="detail book"><i
                                    class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('template') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('template') }}/js/demo/datatables-demo.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('change','.getcategory', function(e){
            var category_id=$(this).val();
            console.log(category_id);
            $.ajax({
                type: 'get',
                    url: '{!! URL::to('ajaxtag') !!}',
                data:{'id': category_id},
                success:function(data){
                console.log(data);
                    $('#tag_id').empty();
                $.each(data, function(index, subObj){
                    $('#tag_id').append('<option value="'+subObj.id+'">'+subObj.tag_name+'</option>');
                });
                }
            })
        });
    });
</script>
@endsection
