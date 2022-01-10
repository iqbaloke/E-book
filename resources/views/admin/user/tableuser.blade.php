@extends('layouts.admin.back')
@section('header')
    <link href="{{ asset('template') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                            <th>name</th>
                            <th>email</th>
                            <th>Roles</th>
                            <th>product</th>
                            <th>member since</th>
                            <th>income</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $index => $user)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
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
                                    product
                                </td>
                                <td>
                                    {{ $user->created_at->format('d F, Y') }}
                                </td>
                                <td>
                                    income
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal"
                                        data-placement="top" title="update"
                                        data-target="#exampleModalupdate{{ $user->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <button type="button" class="btn btn-danger btn-sm mr-2" data-toggle="modal"
                                        data-placement="top" title="delete" data-target="#exampleModaldelete{{ $user->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>

                                    {{-- <button type="button" class="btn btn-success btn-sm mr-2" data-toggle="modal tooltip"
                                        data-placement="top" title="deltail user"
                                        data-target="#exampleModal{{ $user->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button> --}}

                                    <!-- Modal update -->
                                    <div class="modal fade" id="exampleModalupdate{{ $user->id }}" tabindex="-1"
                                        permission="dialog" aria-labelledby="exampleModalupdateLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" permission="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalupdateLabel">Do You Want
                                                        Update the permission {{ $user->name }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('userupdate', $user) }}" method="POST">
                                                    @csrf
                                                    @method("PATCH")
                                                    <div class="modal-body">
                                                        <h5><strong>User Person</strong></h5>
                                                        <div class="form-group">
                                                            <label for="name">User name</label>
                                                            <input type="text" name="name" id="name"
                                                                value="{{ old('name', $user->name) ?? '' }}"
                                                                class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">User Email</label>
                                                            <input type="email" name="email" id="email"
                                                                value="{{ old('email', $user->email) ?? '' }}"
                                                                class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password"
                                                                class="form-label">{{ __('New Password') }}</label>
                                                            <input id="password" type="password"
                                                                class="form-control"
                                                                name="password" autocomplete="new-password">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">cancle</button>
                                                        <button type="submit" class="btn btn-primary">update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                     <!-- Modal delete-->
                                     <div class="modal fade" id="exampleModaldelete{{ $user->id }}"
                                        tabindex="-1" role="dialog" aria-labelledby="exampleModaldeleteLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModaldeleteLabel">Do you
                                                        want delete User {{ $user->name }}
                                                    </h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('userdelete', $user->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit"
                                                            class="btn btn-primary">delete</button>
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
