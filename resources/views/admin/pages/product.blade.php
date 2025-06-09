@extends('admin.layout.master')
@section('title','Products')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-white">Manage Products</h4>
        <a href="{{ route('admin.productform') }}">
            <button class="btn btn-danger fw-bold" style="padding: 8px 16px; border-radius: 5px;">
                + Add Product
            </button>
        </a>
    </div>

    <div class="bg-dark text-white rounded shadow p-4">
        <div class="table-responsive">
            <table class="table table-dark table-bordered table-striped table-hover align-middle mb-0">
                <thead class="table-danger text-center">
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $pro)
                    <tr class="text-center">
                        <td>{{ $pro->product_name }}</td>
                        <td>
                            <img src="{{ url('myimages/' . $pro->product_image) }}"
                                 alt="Product Image"
                                 width="130"
                                 height="70"
                                 class="img-thumbnail"
                                 style="object-fit: cover; border-radius: 10px; transition: transform 0.3s;"
                                 onmouseover="this.style.transform='scale(1.1)'"
                                 onmouseout="this.style.transform='scale(1)'"/>
                        </td>
                        <td>${{ number_format($pro->product_price, 2) }}</td>
                        <td>{{ $pro->cat_name }}</td>
                        <td>{{ $pro->product_description }}</td>
                        <td>
                            <a href="{{ route('admin.editproduct', ['id' => $pro->product_id]) }}">
                                <button class="btn btn-warning btn-sm me-1">Edit</button>
                            </a>
                            <a href="{{ route('admin.deleteproduct', ['id' => $pro->product_id]) }}"
                               onclick="return confirm('Are you sure you want to delete this product?')">
                                <button class="btn btn-outline-danger btn-sm">Delete</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
