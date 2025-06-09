@extends('user.layout.master')
@section('title','Shop')
@section('content')



    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


 <!-- Search Form Start -->
<div class="col-lg-12 col-12 d-flex justify-content-center" style="padding-left: 62px; padding-right: 62px;margin-bottom: 10px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <form action="{{ route('productsearch') }}" style="display: flex; width: 100%; box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 6px; overflow: hidden;">
        <input
            type="search"
            class="w-100"
            placeholder="🔍 Search for products"
            name="search"
            value="{{ old('search', $search) }}"
            style="flex-grow: 1; padding: 12px 16px; border: none; font-size: 15px; outline: none;">
        <button
            type="submit"
            style="padding: 12px 20px; background-color: #007bff; color: white; font-size: 15px; border: none; cursor: pointer; transition: background-color 0.3s;">
            Search
        </button>
    </form>
</div>
<!-- Search Form End -->
    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by price</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-1">
                            <label class="custom-control-label" for="price-1">$0 - $100</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-2">
                            <label class="custom-control-label" for="price-2">$100 - $200</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-3">
                            <label class="custom-control-label" for="price-3">$200 - $300</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-4">
                            <label class="custom-control-label" for="price-4">$300 - $400</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="price-5">
                            <label class="custom-control-label" for="price-5">$400 - $500</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Price End -->

                {{-- <!-- Color Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by color</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="color-all">
                            <label class="custom-control-label" for="price-all">All Color</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-1">
                            <label class="custom-control-label" for="color-1">Black</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-2">
                            <label class="custom-control-label" for="color-2">White</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-3">
                            <label class="custom-control-label" for="color-3">Red</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-4">
                            <label class="custom-control-label" for="color-4">Blue</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="color-5">
                            <label class="custom-control-label" for="color-5">Green</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Color End -->

                <!-- Size Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by size</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="size-all">
                            <label class="custom-control-label" for="size-all">All Size</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-1">
                            <label class="custom-control-label" for="size-1">XS</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-2">
                            <label class="custom-control-label" for="size-2">S</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-3">
                            <label class="custom-control-label" for="size-3">M</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-4">
                            <label class="custom-control-label" for="size-4">L</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="size-5">
                            <label class="custom-control-label" for="size-5">XL</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Size End --> --}}
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
        @foreach ($products as $pro)
        <div class="col-lg-4 col-md-6 col-sm-6 pb-1" style="padding: 10px;">
            <div class="product-item mb-4" style="
                background: white;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 5px 15px rgba(0,0,0,0.05);
                position: relative;
                height: 100%;
            ">
                <div class="product-img position-relative overflow-hidden" style="height: 200px;">
                    <span style="
                        position: absolute;
                        top: 10px;
                        left: 10px;
                        background: rgba(108, 99, 255, 0.9);
                        color: white;
                        padding: 3px 10px;
                        border-radius: 20px;
                        font-size: 0.8rem;
                        z-index: 2;
                    ">{{ $pro->cat_name }}</span>
                    <img class="img-fluid w-100" src="{{ url('myimages/' . $pro->product_image) }}" alt="" style="
                        height: 100%;
                        width: 100%;
                        object-fit: cover;
                        display: block;
                    ">
                    <div class="product-action" style="
                        position: absolute;
                        bottom: 0;
                        left: 0;
                        right: 0;
                        display: flex;
                        justify-content: center;
                        padding: 10px 0;
                    ">
                        <a class="btn btn-square mx-1" href="{{ route('addtocart',['product_id'=>$pro->product_id,'user_id'=> Auth::user()->id]) }}" style="
                            background: #6c63ff;
                            color: white;
                            border-radius: 8px;
                            width: 40px;
                            height: 40px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        "><i class="fa fa-shopping-cart"></i></a>
                        <a class="btn btn-square mx-1" href="{{ route('addtowishlist',['product_id'=>$pro->product_id,'user_id'=> Auth::user()->id]) }}" style="
                            background: #ff6b6b;
                            color: white;
                            border-radius: 8px;
                            width: 40px;
                            height: 40px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        "><i class="far fa-heart"></i></a>
                        <a class="btn btn-square mx-1" href="{{ route('productview',['id'=>$pro->product_id]) }}" style="
                            background: #343a40;
                            color: white;
                            border-radius: 8px;
                            width: 40px;
                            height: 40px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        "><i class="fa fa-search"></i></a>
                    </div>
                </div>
                <div class="text-center py-4" style="padding: 0 15px 15px;">
                    <a class="h6 text-decoration-none" href="" style="
                        display: block;
                        color: #343a40;
                        font-weight: 600;
                        margin-bottom: 10px;
                        white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        padding: 0 10px;
                    ">{{ $pro->product_name }}</a>
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h5 style="
                            color: #6c63ff;
                            font-weight: 700;
                            margin: 0;
                        ">${{ $pro->product_price }}</h5>
                        <h6 class="text-muted ml-2" style="
                            text-decoration: line-through;
                            font-size: 0.9rem;
                            margin: 0;
                        ">
                            <del>${{ $pro->product_price }}</del>
                        </h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mb-1" style="margin-top: 10px;">
                        <div style="color: #ffc107; margin-right: 5px;">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <small style="color: #6c757d;">(99)</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


@endsection
