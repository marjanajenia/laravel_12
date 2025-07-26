@extends('backend.app')

@section('admin-title', 'role list')

@section('backend-content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">User</h4>
                        <div class="page-title-right">
                            <ol class="m-0 breadcrumb">
                                <li class="breadcrumb-item active">Role</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="mt-2 bg-white card-header">
                            <h3>All Roles
                                <a href="{{ route('roles.create') }}"
                                    class="btn btn-sm btn-success waves-effect btn-label waves-light" style="float: right;"><i
                                        class="bx bx-plus-medical label-icon"></i> Create</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive wrap w-100">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <th>Name</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $roles as $role )
                                        <tr>
                                            <td width="5%" class="text-center">{{ $loop->iteration }}</td>
                                            <td width="50%">{{ $role->name }}</td>
                                            <td width="10%" class="text-center">
                                                <a title="Edit"
                                                    href="{{ route('roles.edit', $role->id) }}"
                                                    class="btn btn-sm btn-primary"><i
                                                        class="bx bx-edit-alt label-icon"></i></a>
                                                <a href="{{ route('roles.destroy', $role->id) }}"
                                                    title="Delete" class="btn btn-sm btn-danger" id="delete">
                                                    <i class="bx bxs-trash-alt label-icon"></i>
                                                </a>
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
