@extends('admin.layout.master')
@section('title','Edit Category')
@section('content')



<div class="container-fluid pt-4 px-4">
    <div class="row g-4 justify-content-center">
        <div class="col-sm-12 col-xl-6">
            <div style="background-color: #121212; color: #ffffff; border-left: 6px solid #e50914; border-radius: 10px; box-shadow: 0 0 15px rgba(229, 9, 20, 0.2); padding: 20px;">
                <h4 class="mb-3" style="color: #e50914;">Update Category</h4>
                <form enctype="multipart/form-data" action="{{ route('admin.updatecat', ['id' => $category->cat_id]) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <!-- Category Name -->
                    <div class="mb-3">
                        <label for="catName" class="form-label" style="font-weight: 600;">Category Name</label>
                        <input type="text" class="form-control" id="catName" name="cat_name"
                            placeholder="Category name"
                            value="{{ old('cat_name', $category->cat_name) }}"
                            style="background-color: #1e1e1e; color: #ffffff; border: 1px solid #e50914; padding: 8px 10px; border-radius: 5px; font-size: 14px;">
                        <span style="color: #ff4d4d; font-size: 13px;">
                            @error('cat_name')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <!-- Category Image -->
                    <div class="mb-3">
                        <label for="catImage" class="form-label" style="font-weight: 600;">Category Image</label>
                        <input class="form-control" id="catImage" type="file" name="cat_image"
                            style="background-color: #1e1e1e; color: #ffffff; border: 1px solid #e50914; padding: 6px; border-radius: 5px; font-size: 14px;">
                        <span style="color: #ff4d4d; font-size: 13px;">
                            @error('cat_image')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <!-- Category Description -->
                    <div class="mb-3">
                        <label for="catDescription" class="form-label" style="font-weight: 600;">Description</label>
                        <textarea class="form-control" name="cat_description" id="catDescription"
                            placeholder="Short description..." rows="3"
                            style="background-color: #1e1e1e; color: #ffffff; border: 1px solid #e50914; padding: 8px 10px; border-radius: 5px; font-size: 14px;">{{ old('cat_description', $category->cat_description) }}</textarea>
                        <span style="color: #ff4d4d; font-size: 13px;">
                            @error('cat_description')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn"
                        style="background-color: #e50914; color: white; font-weight: bold; padding: 8px 20px; border-radius: 5px; font-size: 14px;">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
