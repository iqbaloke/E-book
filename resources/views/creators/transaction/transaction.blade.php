@extends('layouts.creator.back')
@section('header')
<link href="{{ asset('template') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="container">
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
                            <th>Order Key</th>
                            <th>Author book</th>
                            <th>User Order</th>
                            <th>Book Name</th>
                            <th>payment</th>
                            <th>price</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $index => $transaction)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $transaction->order_key }}</td>
                            <td>{{ $transaction->author->name }}</td>
                            <td>{{ $transaction->userOrder->name }}</td>
                            <td>{{ $transaction->book->title }}</td>
                            <td>{{ $transaction->payment }}</td>
                            <td>{{ $transaction->book->price }}</td>
                            <td>
                                @if ($transaction->status == "1")
                                <div class="badge badge-success">
                                    success
                                </div>
                                @elseif ($transaction->status == "2")
                                <div class="badge badge-warning">
                                    process
                                </div>
                                @elseif ($transaction->status == "3")
                                <div class="badge badge-danger">
                                    faild
                                </div>
                                @endif
                            </td>
                            <td>
                                <button style="font-size: 10px;" class="btn btn-primary btn-sm">Detail</button>
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
@endsection
@section('script')
<script src="{{ asset('template') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('template') }}/js/demo/datatables-demo.js"></script>
@endsection
