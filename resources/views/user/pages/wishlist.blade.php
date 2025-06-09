@extends('user.layout.master')
@section('title','WishList')
@section('content')

<!-- Breadcrumb Start -->
<div class="container-fluid mt-3">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-white mb-4 py-3 px-4 shadow-sm rounded" style="font-size: 14px;">
                <a class="breadcrumb-item text-decoration-none text-primary" href="{{ url('index') }}">🏠 Home</a>
                <a class="breadcrumb-item text-decoration-none text-primary" href="{{ url('shop') }}">🛍 Shop</a>
                <span class="breadcrumb-item active text-muted">📋 Wishes</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Wish Product Start -->
<div class="col-lg-9 col-md-8">
    <div class="row pb-4">
        <div class="col-12 pb-3">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <button class="btn btn-sm" style="
                        background: linear-gradient(135deg, #6c63ff 0%, #ff6b6b 100%);
                        color: white;
                        border-radius: 8px;
                        padding: 5px 15px;
                        border: none;
                        box-shadow: 0 4px 8px rgba(108, 99, 255, 0.2);
                    "><i class="fa fa-th-large"></i></button>
                    <button class="btn btn-sm ml-2" style="
                        background: white;
                        color: #6c63ff;
                        border-radius: 8px;
                        padding: 5px 15px;
                        border: 1px solid #6c63ff;
                        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
                    "><i class="fa fa-bars"></i></button>
                </div>
            </div>
        </div>

        @foreach ($wishlists as $wish)
        <div class="col-lg-4 col-md-6 col-sm-6 pb-4" style="padding: 10px;">
            <div class="card product-item" style="
                border: none;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 10px 20px rgba(0,0,0,0.08);
                transition: all 0.3s ease;
                height: 100%;
                background: white;
            ">
                <div class="product-img position-relative" style="overflow: hidden;">
                    <img class="card-img-top img-fluid" src="{{ url('myimages/'.$wish->product_image) }}" alt="Product Image" style="
                        height: 280px;
                        width: 100%;
                        object-fit: cover;
                        display: block;
                        transition: transform 0.5s ease;
                    ">
                    <div class="product-action text-center py-2" style="
                        position: absolute;
                        bottom: 15px;
                        left: 50%;
                        transform: translateX(-50%);
                        display: flex;
                        background: transparent;
                    ">
                        <a class="btn btn-sm mx-1" href="{{ route('addtocart',['product_id'=>$wish->product_id,'user_id'=> Auth::user()->id]) }}" style="
                            background: linear-gradient(135deg, #28a745 0%, #5cb85c 100%);
                            color: white;
                            border-radius: 50%;
                            width: 40px;
                            height: 40px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                            border: none;
                        "><i class="fa fa-shopping-cart"></i></a>
                        <a class="btn btn-sm mx-1" href="{{ route('deletewish',['id'=>$wish->wishlist_id]) }}" style="
                            background: linear-gradient(135deg, #dc3545 0%, #ff6b6b 100%);
                            color: white;
                            border-radius: 50%;
                            width: 40px;
                            height: 40px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                            border: none;
                        "><i class="far fa-heart"></i></a>
                    </div>
                </div>
                <div class="card-body text-center" style="padding: 1.5rem;">
                    <h6 class="card-title mb-2" style="
                        color: #343a40;
                        font-weight: 700;
                        white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        font-size: 1.1rem;
                    ">{{$wish->product_name}}</h6>
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <h5 class="mb-0" style="
                            color: #6c63ff;
                            font-weight: 800;
                            font-size: 1.3rem;
                            text-shadow: 0 2px 4px rgba(108, 99, 255, 0.1);
                        ">${{ $wish->product_price }}</h5>
                    </div>
                    <div class="d-flex justify-content-center mb-2">
                        <div style="color: #ffc107; margin-right: 5px; font-size: 1rem;">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <small style="color: #6c757d; font-weight: 500;">(99 reviews)</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Wish Product End -->


@endsection
