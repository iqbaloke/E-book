@extends('layouts.admin.back')
@section('header')
<link href="{{ asset('template') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')

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
                @foreach ($requestbook as $index => $book)
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
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#exampleModalpublish{{ $book->id }}" data-placement="top" title="publish">
                            <i class="fas fa-upload"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalpublish{{ $book->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalpublishLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalpublishLabel">Do You want to publish
                                            book {{ $book->title }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('publishbookrequest', $book->slug) }}" method="POST">
                                            @csrf
                                            @method("PATCH")
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-secondary btn-sm"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary btn-sm">Publish
                                                    book</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('template') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('template') }}/js/demo/datatables-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select Permission !!!"
            });
        });
</script>
@endsection
