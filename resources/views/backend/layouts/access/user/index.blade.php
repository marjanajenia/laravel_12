@extends('backend.app')

@section('user-title', 'User List')

@section('backend-content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Admin</h4>
                        <div class="page-title-right">
                            <ol class="m-0 breadcrumb">
                                <li class="breadcrumb-item active">User</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="mt-2 bg-white card-header">
                            <h3>All Users
                                <a href="{{ route('users.create') }}"
                                    class="btn btn-sm btn-success waves-effect btn-label waves-light" style="float: right;"><i
                                        class="bx bx-plus-medical label-icon"></i> Create</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive wrap w-100">
                                <thead>
                                    <tr>
                                        <td>SL</td>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Guard</th>
                                        <th>Created</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $users as $user )
                                        <tr>
                                            <td width="5%" class="text-center">{{ $loop->iteration }}</td>
                                            <td width="20%">{{ $user->name }}</td>
                                            <td width="30%">{{ $user->email }}</td>
                                            <td>
                                                @forelse ($user->roles as $role)
                                                <span class="badge rounded-pill bg-primary">{{ $role->name }}</span>
                                                @empty
                                                <span class="badge rounded-pill bg-primary">N/A</span>
                                                @endforelse
                                            </td>
                                            <td>
                                                @forelse ($user->roles as $role)
                                                <span class="badge rounded-pill bg-primary">{{ $role->guard_name }}</span>
                                                @empty
                                                <span class="badge rounded-pill bg-primary">N/A</span>
                                                @endforelse
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</td>
                                            <td width="10%" class="text-center">
                                                <a title="Edit"
                                                    href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-sm btn-primary"><i
                                                        class="bx bx-edit-alt label-icon"></i></a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="post" onsubmit="return confirm('Are you sure?')" style="margin: 0; padding: 0;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" style="border-radius: 0; border-top-right-radius: 5px; border-bottom-right-radius: 5px;"> <i class="bx bxs-trash-alt label-icon"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach ()
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
