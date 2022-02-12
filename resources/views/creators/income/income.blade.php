@extends('layouts.creator.back')
@section('header')
<link href="{{ asset('template') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ auth()->user()->takeImage }}" alt="" class="img-fluid shadow">
        </div>
        <div class="col-md-8">
            <div class="container">
                <h5>{{ auth()->user()->name }}</h5>
                <h6>Member since : {{ auth()->user()->created_at->format("d F, Y") }}</h6>
                <div class="row mt-4">
                    <div class="col-xl-4  col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Income</div>
                                        <div class="h5 mb-0 font-weight-bold text-success">${{
                                            auth()->user()->income->total_income ?? "0" }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4  col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Residual
                                            Income
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-success">${{
                                                    auth()->user()->income->residual_income ?? "0" }}</div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm mr-2">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4  col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            expenditure</div>
                                        <div class="h5 mb-0 font-weight-bold text-danger">${{
                                            auth()->user()->income->expenditure ?? "0" }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('widraw') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="" class="form_label">Nominal</label>
                            <input type="number" name="nominal" id="nominal"
                                value="{{ old('nominal', auth()->user()->income->residual_income ?? "0") }}"
                                class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="" class="form_label">Payment</label>
                            <input type="text" name="payment" id="payment" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="" class="form_label">your name in the bank</label>
                            <input type="text" name="payment_name" id="payment_name"
                                class="form-control form-control-sm">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Widraw</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">withdrawal</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>widraw key</th>
                                    <th>Nominal</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    <th>detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($widraws as $index => $widraw)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $widraw->widraw_key }}</td>
                                    <td class="text-success"><strong>${{ $widraw->nominal }}</strong></td>
                                    <td>{{ $widraw->payment }}</td>
                                    <td>
                                        @if ($widraw->status == "1")
                                        <div class="badge badge-success">
                                            success
                                        </div>
                                        @elseif ($widraw->status == "2")
                                        <div class="badge badge-warning">
                                            process
                                        </div>
                                        @elseif ($widraw->status == "3")
                                        <div class="badge badge-danger">
                                            faild
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        <button style="font-size: 10px;" class="btn btn-primary btn-sm">Detail</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 100px;">

    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('template') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('template') }}/js/demo/datatables-demo.js"></script>
@endsection
