@extends('backend.app')

@section('user-title', 'Mail Setting')

@section('backend-content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- end page title -->
            <div class="row">
                <div class="p-0 m-auto col-md-11">
                    <div class="card">
                        <div class="mt-2 bg-white card-header">
                            <h3>Mail Setting</h3>
                        </div>
                        <div class="card-body bg-light">
                            <div class="row">
                                <div class="p-0 m-auto col-md-10">
                                    <form action="{{ route('setting.mail.update') }}" method="POST">
                                        @csrf
                                        <div class="mb-4 row">
                                            <label for="" class="col-sm-3 col-form-label">Mail Mailer</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="mail_mailer" id="mail_mailer"
                                                 value="{{ env('MAIL_MAILER') ?? '' }}" placeholder="Enter Receiver Mail Address">
                                                @error('mail_mailer')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="" class="col-sm-3 col-form-label">Mail Host</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="mail_host" id="mail_host"
                                                 value="{{ env('MAIL_HOST') ?? '' }}" placeholder="Enter Your Mail Host">
                                                @error('mail_host')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="" class="col-sm-3 col-form-label">Mail Port</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="mail_port" id="mail_port"
                                                 value="{{ env('MAIL_PORT') ?? '' }}" placeholder="Enter Your Mail Port">
                                                @error('mail_port')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="" class="col-sm-3 col-form-label">Mail UserName</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="mail_username" id="mail_username"
                                                 value="{{ env('MAIL_USERNAME') ?? '' }}" placeholder="Enter Your Mail UserName">
                                                @error('mail_username')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="" class="col-sm-3 col-form-label">Mail Password</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="mail_password" id="mail_password"
                                                 value="{{ env('MAIL_PASSWORD') ?? '' }}" placeholder="Enter Your Mail Password">
                                                @error('mail_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="" class="col-sm-3 col-form-label">Mail Encryption</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="mail_encryption" id="mail_encryption"
                                                 value="{{ env('MAIL_ENCRYPTION') ?? '' }}" placeholder="Enter Your Mail Encryption">
                                                @error('mail_encryption')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="" class="col-sm-3 col-form-label">Mail From Address</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="mail_from_address" id="mail_from_address"
                                                value="{{ env('MAIL_FROM_ADDRESS') ?? '' }}" placeholder="Enter Your Mail From Address">
                                                @error('mail_from_address')
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
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{--  send mail  --}}
                            <div class="mt-2 bg-white card-header">
                                <h3>Mail Send</h3>
                            </div>
                            <div class="row mt-3">
                                <div class="p-0 m-auto col-md-10">
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
