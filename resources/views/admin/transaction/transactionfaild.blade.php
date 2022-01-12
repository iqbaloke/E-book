@extends('layouts.admin.back')
@section('header')
<link href="{{ asset('template') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Users</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Book Name</th>
                        <th>User id</th>
                        <th>Price</th>
                        <th>Expired</th>
                        <th>payment</th>
                        <th>created_at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $index => $transaction)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $transaction->book->title }}</td>
                        <td>{{ $transaction->user->name }}</td>
                        <td>
                            {{ $transaction->price}}
                        </td>
                        <td>
                            {{ $transaction->expired }}
                        </td>
                        <td>
                            {{ $transaction->payment }}
                        </td>
                        <td>
                            {{ $transaction->created_at->format('d F, Y') }}
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
@endsection
