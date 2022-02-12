@extends('layouts.creator.back')
@section('content')
@role('writer')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 d-flex align-items-center">
            <div style=" border: 2px solid rgb(89, 0, 255); border-radius: 10px;" class="px-3 py-3">
                <p style="font-size: 24px;  font-weight: 700;
                    color: #000000;
                    margin: 0 0 ">increase your income, by becoming a creator !!!</p>
                <p style="font-size: 16px;  font-weight: 500;
                    color: #000000;
                    margin: 0 0 ">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua</p>
                <a href="{{ route('becomeacreator') }}" class="btn btn-primary btn-sm mt-4">Becomeming a creator</a>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-center">
            <img style=" border: 2px solid rgba(128, 128, 128, 0); border-radius: 20px; height:230px;"
                src="{{ asset('images/person.jpg') }}" alt="">
        </div>
    </div>
</div>
@endrole
@role('creator|admin|super admin')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                All Book</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ auth()->user()->book->count()
                                }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Income</div>
                            <div class="h5 mb-0 font-weight-bold text-success">${{ auth()->user()->income->total_income
                                ?? "0" }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Residual Income
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-success">${{
                                        auth()->user()->income->residual_income ?? "0" }}</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
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
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                expenditure</div>
                            <div class="h5 mb-0 font-weight-bold text-danger">${{ auth()->user()->income->expenditure ??
                                "0" }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">New Book Orders</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>image</th>
                                    <th>title</th>
                                    <th>order user</th>
                                    <th>date</th>
                                    <th>status</th>
                                    <th>price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $index => $order)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <img style="height: 50px; widht:50px;" src="{{ $order->book->takeImage }}"
                                            alt="E book">
                                    </td>
                                    <td>{{ $order->book->title }}</td>
                                    <td>{{ $order->userOrder->name }}</td>
                                    <td>{{ $order->created_at->format("d F, Y") }}</td>
                                    <td>
                                        @if ($order->status == 1)
                                        <div class="badge badge-primary">
                                            success
                                        </div>
                                        @else
                                        <div class="badge badge-warning">
                                            process
                                        </div>
                                        @endif
                                    </td>
                                    <td class="text-success">${{ $order->price }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">New Book Orders</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>image</th>
                                    <th>title</th>
                                    <th>publish</th>
                                    <th>approved</th>
                                    <th>price</th>
                                    <th>page</th>
                                    <th>date</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $index => $book)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <img style="height: 50px; widht:50px;" src="{{ $book->takeImage }}"
                                            alt="E book">
                                    </td>
                                    <td>{{ $book->title }}</td>
                                    <td>
                                        @if ($book->publish == '1')
                                        <div class="badge badge-primary">
                                            publish
                                        </div>
                                        @else
                                        <div class="badge badge-warning">
                                            hidden
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($book->approved == '0')
                                        <div class="badge badge-primary">
                                            checking
                                        </div>
                                        @else
                                        <div class="badge badge-warning">
                                            publish
                                        </div>
                                        @endif
                                    </td>
                                    <td class="text-success">${{ $book->price }}</td>
                                    <td>{{ $book->page }} page</td>
                                    <td>{{ $book->created_at->format("d F, Y") }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    New Comment
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    Cart
                </div>
            </div>
        </div>
    </div>
    <div style="padding-top: 100px;">

    </div>
</div>
@endrole
@endsection
