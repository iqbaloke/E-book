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
                    <form action="{{ route('givepermissioncreate') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">Role Name</label>
                            <select class="form-control" name="role" id="role">
                                <option selected>Select One !!!</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Permissions Name</label>
                            <select class="form-control select2" name="permission[]" id="permission" multiple>
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Create permission</button>
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
                                    <th>Role</th>
                                    <th>Guard Name</th>
                                    <th>Permissions</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($roles as $index => $role)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td class="text-center">{{ $role->name }}</td>
                                        <td class="text-center">{{ $role->guard_name }}</td>
                                        <td>
                                            @if (implode(',', $role->getPermissionNames()->toArray()))
                                                {{ implode(',', $role->getPermissionNames()->toArray()) }}
                                            @else
                                                <div class="text-center">
                                                    -
                                                </div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal"
                                                data-target="#exampleModal{{ $role->id }}">
                                                Sync
                                            </button>

                                            <!-- Modal update -->
                                            <div class="modal fade" id="exampleModal{{ $role->id }}" tabindex="-1"
                                                permission="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" permission="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Do You Want
                                                                Update the permission {{ $role->name }}
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('givepermissionupdate', $role) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method("PUT")
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="name" class="form-label">Role
                                                                        Name</label>
                                                                    <select class="form-control" name="role" id="role">
                                                                        <option disabled selected>Select One !!!</option>
                                                                        @foreach ($roles as $item)
                                                                            <option
                                                                                {{ $role->id == $item->id ? 'selected' : '' }}
                                                                                value="{{ $item->id }}">
                                                                                {{ $item->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name" class="form-label">Permissions
                                                                        Name</label>
                                                                    <select class="form-control select2" name="permission[]"
                                                                        id="permission" multiple>
                                                                        @foreach ($role->permissions as $permission)
                                                                            <option
                                                                                {{ $role->permissions()->find($permission->id) ? 'selected' : '' }}
                                                                                value="{{ $permission->id }}">
                                                                                {{ $permission->name }}</option>
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
