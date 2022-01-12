@extends('layouts.creator.back')
@section('content')
@role('writer')
<div class="container">
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
<div class="container">
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                               All Book</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ auth()->user()->order->count()
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
                            <div class="h5 mb-0 font-weight-bold text-success">${{ auth()->user()->income->total_income ?? "0" }}</div>
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
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-success">${{ auth()->user()->income->residual_income ?? "0" }}</div>
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
                            <div class="h5 mb-0 font-weight-bold text-danger">${{ auth()->user()->income->expenditure ?? "0" }}</div>
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
@endrole
@endsection
