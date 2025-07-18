@extends('backend.app')

@section('user_title', 'setting')

@section('backend-content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Setting</h4>
                        <div class="page-title-right">
                            <ol class="m-0 breadcrumb">
                                <li class="breadcrumb-item active">Admin</li>
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
                            <h3>setting </h3>
                        </div>
                        <div class="row mb-4">
                                <div class="col-md-3 d-flex align-items-center">
                                    <label for="debug" class="col-form-label fw-bold mb-0">Debug</label>
                                </div>
                                <div class="col-md-9 d-flex align-items-center">
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input @error('debug') is-invalid @enderror"
                                            type="checkbox"
                                            value=""
                                            id="debug"
                                            name="debug"
                                            />
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
