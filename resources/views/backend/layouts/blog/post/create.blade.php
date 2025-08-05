@extends('backend.app')

@section('user-title', 'Blog Post Create')

@section('backend-content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- end page title -->
            <div class="row">
                <div class="p-0 m-auto col-md-11">
                    <div class="card">
                        <div class="mt-2 bg-white card-header">
                            <h3>Blog Post Create
                                <a href="{{ route('bg_post.index') }}"
                                    class="btn btn-sm btn-primary waves-effect btn-label waves-light" style="float: right;">
                                    <i class="bx bx-arrow-back label-icon"></i> Back</a>
                            </h3>
                        </div>
                        <div class="card-body bg-light">
                            <div class="row">
                                <div class="p-0 m-auto col-md-11">
                                    <form action="{{ route('bg_post.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-4 row">
                                            <label for="" class="col-sm-3 col-form-label">Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Enter Blog Category Name">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="" class="col-sm-3 col-form-label">Content</label>
                                            <div class="col-sm-10">
                                                <textarea class="summernote form-control" id="summernote" name="post_content" rows="3" placeholder="Enter Blog Content">{{ old('post_content', $blog->post_content ?? '') }}</textarea>
                                                @error('post_content')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="" class="col-sm-3 col-form-label">Category</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="bg_category_id" id="bg_category_id">
                                                    <option>Select the Category</option>
                                                    @if (!empty($categories) && $categories->count() > 0)
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" {{ old('bg_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                @error('bg_category_id')
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
