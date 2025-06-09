@extends('admin.layout.master')
@section('title','Add Product')
@section('content')


<div class="container-fluid pt-4 px-4">
    <div class="row g-4 justify-content-center">
        <div class="col-sm-12 col-xl-6">
            <div style="background-color: #121212; color: #ffffff; border-left: 5px solid #e50914; border-radius: 10px; box-shadow: 0 0 10px rgba(229, 9, 20, 0.15); padding: 20px;">
                <h5 class="mb-3" style="color: #e50914;">Add Product</h5>

                <form enctype="multipart/form-data" action="{{ route('admin.addproduct') }}" method="POST">
                    @csrf

                    <!-- Product Name -->
                    <div class="mb-2">
                        <label for="proName" class="form-label" style="font-size: 14px;">Product Name</label>
                        <input type="text" class="form-control" id="proName" name="pro_name"
                            placeholder="Name"
                            style="background-color: #1e1e1e; color: #fff; border: 1px solid #e50914; padding: 6px 10px; font-size: 14px; border-radius: 5px;">
                        <span style="color: #ff4d4d; font-size: 12px;">
                            @error('pro_name') {{ $message }} @enderror
                        </span>
                    </div>

                    <!-- Product Image -->
                    <div class="mb-2">
                        <label for="proImage" class="form-label" style="font-size: 14px;">Image</label>
                        <input class="form-control" id="proImage" type="file" name="pro_image"
                            style="background-color: #1e1e1e; color: #fff; border: 1px solid #e50914; font-size: 13px; padding: 6px; border-radius: 5px;">
                        <span style="color: #ff4d4d; font-size: 12px;">
                            @error('pro_image') {{ $message }} @enderror
                        </span>
                    </div>

                    <!-- Product Price -->
                    <div class="mb-2">
                        <label for="proPrice" class="form-label" style="font-size: 14px;">Price ($)</label>
                        <input type="text" class="form-control" id="proPrice" name="pro_price"
                            placeholder="0.00"
                            style="background-color: #1e1e1e; color: #fff; border: 1px solid #e50914; padding: 6px 10px; font-size: 14px; border-radius: 5px;">
                        <span style="color: #ff4d4d; font-size: 12px;">
                            @error('pro_price') {{ $message }} @enderror
                        </span>
                    </div>

                    <!-- Product Category -->
                    <div class="mb-2">
                        <label for="proCategory" class="form-label" style="font-size: 14px;">Category</label>
                        <select class="form-select" name="pro_category"
                            style="background-color: #1e1e1e; color: #fff; border: 1px solid #e50914; font-size: 13px; padding: 6px; border-radius: 5px;">
                            @foreach ($category as $cat)
                                <option value="{{ $cat->cat_id }}">{{ $cat->cat_name }}</option>
                            @endforeach
                        </select>
                        <span style="color: #ff4d4d; font-size: 12px;">
                            @error('pro_category') {{ $message }} @enderror
                        </span>
                    </div>

                    <!-- Product Description -->
                    <div class="mb-3">
                        <label for="proDescription" class="form-label" style="font-size: 14px;">Description</label>
                        <textarea class="form-control" name="pro_description" id="proDescription" rows="2"
                            placeholder="Short description..."
                            style="background-color: #1e1e1e; color: #fff; border: 1px solid #e50914; font-size: 14px; padding: 6px 10px; border-radius: 5px;"></textarea>
                        <span style="color: #ff4d4d; font-size: 12px;">
                            @error('pro_description') {{ $message }} @enderror
                        </span>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn"
                        style="background-color: #e50914; color: white; font-weight: bold; padding: 8px 20px; border-radius: 5px; font-size: 14px;">
                        Add Product
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
