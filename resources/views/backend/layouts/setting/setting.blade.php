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
            <div class="row justify-content-left">
                <div class="col-md-8"> {{-- Adjust width as needed --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center mb-3">
                                <div class="col-md-3">
                                    <label for="debug" class="col-form-label fw-bold fs-5">Debug</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input @error('debug') is-invalid @enderror"
                                            type="checkbox"
                                            value="{{ env('APP_DEBUG') }}"
                                            id="debug"
                                            name="debug"
                                            {{ env('APP_DEBUG') == true ? 'checked' : '' }}
                                            data-url="{{ route('setting.debug') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> {{-- card-body --}}
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>
    <!-- End Page-content -->
@endsection

@push('custom-script')
<script>
    $(document).ready(function(){
        $("#debug").on("change", function(){
            $.ajax({
                url: $(this).data('url'),
                type: "GET",
                success: function(response){
                    if (response.status === "success"){
                        toastr.success(response.message);
                        window.location.reload();
                    }else {
                        toastr.error(response.message);
                    }
                }
            });
        });
    });
</script>
@endpush

