@extends('backend.app')

@section('user-title', 'Profile Setting')

@section('backend-content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- end page title -->
            <div class="row">
                <div class="p-0 m-auto col-md-11">

                    <ul class="nav">
                        <li><a href="#profile" class="active show" data-bs-toggle="tab">Edit Profile</a></li>
                         <li><a href="#password" data-bs-toggle="tab">Update Password</a></li>
                    </ul>

                    <div class="tab-content">
                    <!-- Profile Setting Tab -->
                        <div class="tab-pane fade show active" id="profile">
                            <div class="card mb-4">
                                {{--  <div class="card-header bg-white mt-2">
                                    <h3>Profile Setting</h3>
                                </div>  --}}
                                <div class="card-body bg-light">
                                    <form action="{{ route('setting.profile.update') }}" method="POST">
                                        @csrf
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" class="form-control" value="{{ $user->name ?? '' }}"
                                                    placeholder="Enter Your Name">
                                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email" class="form-control" value="{{ $user->email ?? '' }}"
                                                    placeholder="Enter Your Email Address">
                                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-success w-md">
                                                    <i class="bx bx-save me-2"></i> Update
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Password Setting Tab -->
                        <div class="tab-pane fade" id="password">
                            <div class="card">
                                <div class="card-body bg-light">
                                    <form action="{{ route('setting.profile.updatePassword') }}" method="POST">
                                        @csrf
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label">Current Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" name="old_password" class="form-control" placeholder="Current Password">
                                                @error('old_password') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label">New Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" name="password" class="form-control" placeholder="New Password">
                                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label">Confirm Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                                                @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-success w-md">
                                                    <i class="bx bx-save me-2"></i> Update
                                                </button>
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
