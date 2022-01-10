@extends('layouts.admin.back')
@section('header')
    <link href="{{ asset('template') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create New Users</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('userstore') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label"><strong>Name</strong> </label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required>
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-label"><strong>Email</strong> </label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                        email="email" value="{{ old('email') }}" required>
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="form-label"><strong>Password</strong> </label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="form-label"><strong>Confirm Password</strong></label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
                    @error('password-confirm')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role" class="form-label"><strong>Select Role User</strong></label>
                    <select class="form-control select2" name="role[]" id="role" multiple>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create New Users</button>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('template') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('template') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('template') }}/js/demo/datatables-demo.js"></script>
@endsection
