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
                        <th>widraw</th>
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
                                Request
                            </div>
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm" style="font-size: 10px;"
                                data-toggle="modal" data-target="#exampleModal{{ $widraw->id }}">
                                Widraw
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $widraw->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Widraw to user {{
                                                $widraw->user->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('widrawupdate', $widraw->id) }}" method="POST">
                                            @csrf
                                            @method("PATCH")
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Widraw</button>
                                            </div>
                                        </form>
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
</div>
@endsection
@section('script')
<script src="{{ asset('template') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('template') }}/js/demo/datatables-demo.js"></script>
@endsection
