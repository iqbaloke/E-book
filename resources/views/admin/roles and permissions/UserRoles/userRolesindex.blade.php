@extends('layouts.admin.back')
@section('header')
    <link href="{{ asset('template') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header">
                    Create New permissions
                </div>
                <div class="card-body">
                    <form action="{{ route('userrolecreate') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="form-label">Insert Email User</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="please insert email user" required>
                        </div>
                        <div class="form-group">
                            <label for="role" class="form-label">Role Name</label>
                            <select class="form-control select2" name="role[]" id="role" multiple>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">User Roles</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
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
                                    <th>user</th>
                                    <th>Roles</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $index => $user)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if (implode(',', $user->getRoleNames()->toArray()))
                                                {{ implode(',', $user->getRoleNames()->toArray()) }}
                                            @else
                                                <div class="text-center">
                                                    -
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal"
                                                data-target="#exampleModal{{ $user->id }}">
                                                Sync
                                            </button>

                                            <!-- Modal update -->
                                            <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1"
                                                permission="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" permission="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Do You Want
                                                                Update the permission {{ $user->name }}
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('userroleupdate', $user) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method("PUT")
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="email">User Email</label>
                                                                    <input type="email" name="email" id="email"
                                                                        value="{{ old('email', $user->email) ?? '' }}"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="role" class="form-label">Role
                                                                        Name</label>
                                                                    <select class="form-control select2" name="role[]"
                                                                        id="role" multiple>
                                                                        @foreach ($roles as $role)
                                                                            <option
                                                                                {{ $user->roles()->find($role->id) ? 'selected' : '' }}
                                                                                value="{{ $role->id }}">
                                                                                {{ $role->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">cancle</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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
