@extends('layouts.admin.back')
@section('header')
<link href="{{ asset('template') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Widraw Request</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Widraw Key</th>
                        <th>User</th>
                        <th>Nominal</th>
                        <th>payment</th>
                        <th>payment name</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($widraws as $index => $widraw)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $widraw->widraw_key }}</td>
                        <td>{{ $widraw->user->name }}</td>
                        <td class="text-success">${{ $widraw->nominal }}</td>
                        <td>{{ $widraw->payment }}</td>
                        <td>{{ $widraw->payment_name }}</td>
                        <td>
                            <div class="badge badge-warning">
                                success
                            </div>
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
