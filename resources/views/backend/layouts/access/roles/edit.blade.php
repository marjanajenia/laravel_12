@extends('backend.app')

@section('admin-title', 'Roles edit')

@section('backend-content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- end page title -->
            <div class="row">
                <div class="p-0 m-auto col-md-8">
                    <div class="card">
                        <div class="mt-2 bg-white card-header">
                            <h3>Role
                                <a href="{{ route('roles.index') }}"
                                    class="btn btn-sm btn-primary waves-effect btn-label waves-light" style="float: right;"><i
                                        class="bx bx-arrow-back label-icon"></i> Back</a>
                            </h3>
                        </div>
                        <div class="card-body bg-light">
                            <div class="row">
                                <div class="p-0 m-auto col-md-6">
                                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="mb-4 row">
                                            <label for="" class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input name="name" type="text"
                                                    class="form-control"
                                                    placeholder="Role Name" value="{{ $role->name }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label">Permission</label>
                                            <div class="col-sm-9 mt-2">
                                                @foreach ($permissions as $permission)
                                                    <div class="form-check mb-2">
                                                        <input
                                                            class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="{{ $permission->id }}"
                                                            @if($role->hasPermissionTo($permission->name)) checked @endif />
                                                        <label class="form-check-label" for="{{ $permission->id }}">
                                                            {{ $permission->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-sm-9">
                                                <div>
                                                    <button type="submit"
                                                        class="btn btn-success waves-effect waves-light w-md">
                                                        <i class="align-middle bx bx-save font-size-16 me-2"></i>
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
