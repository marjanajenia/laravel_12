@extends('backend.app')

@section('user-title', 'Mail Setting')

@section('backend-content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- end page title -->
            <div class="row">
                <div class="p-0 m-auto col-md-8">
                    <div class="card">
                        <div class="mt-2 bg-white card-header">
                            <h3>Mail Setting</h3>
                        </div>
                        <div class="card-body bg-light">
                            <div class="row">
                                <div class="p-0 m-auto col-md-6">
                                    <form action="{{ route('setting.mail.send') }}" method="POST">
                                        @csrf
                                        <div class="mb-4 row">
                                            <label for="" class="col-sm-3 col-form-label">Receiver</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="receiver" id="receiver" value="{{ old('receiver') ?? '' }}" placeholder="Enter Receiver Mail Address">
                                                @error('receiver')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="" class="col-sm-3 col-form-label">Subject</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="subject" id="subject" value="{{ old('subject') ?? '' }}" placeholder="Enter Your Email Subject">
                                                @error('subject')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="" class="col-sm-3 col-form-label">Content</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control" name="mail_body" id="mail_body" placeholder="Enter Your Content">{{ old('content') ?? '' }}</textarea>
                                                 @error('mail_body')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-sm-9">
                                                <div>
                                                    <button type="submit"
                                                        class="btn btn-success waves-effect waves-light w-md">
                                                        <i class="align-middle bx bx-save font-size-16 me-2"></i>
                                                        Send Mail
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
