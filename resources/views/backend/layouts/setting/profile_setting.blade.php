@extends('backend.app')

@section('user-title', 'Profile Setting')
<style>
    .custom-tabs .tab-link{
        color:#6c757d;;
    }
    .custom-tabs .tab-link.active {
    color: #28a745;
    border-bottom: 2px solid #28a745;
}
</style>

@section('backend-content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- end page title -->
            <div class="row">
                <div class="p-0 m-auto col-md-11">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="profile-img-main rounded" style="width: 125px; height: 125px; overflow: hidden;">
                                    <img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('default/profile.jpg') }}" alt="profile_img"
                                    style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                                </div>
                                <div class="ms-4">
                                    <h4>{{ Auth::user()->name ?? 'N/A' }}</h4>
                                    <h4>{{ Auth::user()->email ?? 'N/A' }}</h4>
                                    <a href="#" class="btn btn-success btn-sm" id="uploadImageBtn">
                                        <i class="fa fa-rss"></i> Update Profile
                                    </a>
                                    <input type="file" name="profile_picture"
                                     id="profile_picture_input" style="display: none;">
                                </div>
                            </div>
                        </div>
                        <div class="border-top px-4 pt-3" style="font-size: medium">
                            <ul class="nav custom-tabs"  role="tablist">
                                <li class="me-3">
                                    <a href="#profile" class="tab-link active" data-bs-toggle="tab" role="tab">Edit Profile</a>
                                </li>
                                <li>
                                    <a href="#password" class="tab-link" data-bs-toggle="tab" role="tab">Update Password</a>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="tab-content">
                    <!-- Profile Setting Tab -->
                        <div class="tab-pane fade show active" id="profile">
                            <div class="card mb-4">
                                {{--  <div class="card-header bg-white mt-2">
                                    <h3>Profile Setting</h3>
                                </div>  --}}
                                <div class="card-body">
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

@push('custom-script')
<script>
    $(document).ready(function (){

        $('#uploadImageBtn').click( function(e){
            e.preventDefault();
            $('#profile_picture_input').click();
        });
        $('#profile_picture_input').change(function(){
            var formData = new FormData();
            formData.append('profile_picture', $(this)[0].files[0]);
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: "{{ route('setting.profile.updatePicture') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response.success){
                         // Update the profile picture src in the profile settings page
                        $('.profile-img-main img').attr('src', response.image_url);

                        // Also update the profile picture in the header view page
                        $('.profile-img-change').attr('src', response.image_url);

                        toastr.success('Profile picture updated successfully.');
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // See exact Laravel error
                    toastr.error('An error occurred while updating the profile picture.');
                }
            });
        });
        // Preview image before upload
        $('#profile_picture_input').change(function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.profile-img-main img').attr('src', e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        });

    });
</script>
@endpush

