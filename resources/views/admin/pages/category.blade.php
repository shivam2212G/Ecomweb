@extends('admin.layout.master')
@section('title','A Category')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-white">Manage Categories</h4>
        <a href="{{ route('admin.addcategorypage') }}">
            <button class="btn btn-danger fw-bold" style="padding: 8px 16px; border-radius: 5px;">
                + Add Category
            </button>
        </a>
    </div>

    <div class="bg-dark text-white rounded shadow p-4">
        <table class="table table-dark table-striped table-hover table-bordered align-middle mb-0">
            <thead class="table-danger text-center">
                <tr>
                    <th scope="col">Category Name</th>
                    <th scope="col">Category Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $cat)
                <tr class="text-center">
                    <td>{{ $cat->cat_name }}</td>
                    <td>
                        <img src="{{ url('myimages/' . $cat->cat_image) }}"
                            alt="Category Image"
                            width="100"
                            height="70"
                            class="img-thumbnail"
                            style="object-fit: cover; border-radius: 10px; transition: transform 0.3s;"
                            onmouseover="this.style.transform='scale(1.1)'"
                            onmouseout="this.style.transform='scale(1)'" />
                    </td>
                    <td>{{ $cat->cat_description }}</td>
                    <td>
                        <a href="{{ route('admin.editcategory',['id'=>$cat->cat_id]) }}">
                            <button class="btn btn-warning btn-sm me-1">Edit</button>
                        </a>
                        <a href="{{ route('admin.deletecategory',['id'=>$cat->cat_id]) }}"
                           onclick="return confirm('Are you sure you want to delete this category?')">
                            <button class="btn btn-outline-danger btn-sm">Delete</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
