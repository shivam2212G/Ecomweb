@extends('user.layout.master')
@section('title','Home')
@section('content')


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


    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="{{ url('user/img/carousel-1.jpg') }}" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Men Fashion</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="{{ url('user/img/carousel-2.jpg') }}" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Women Fashion</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="{{ url('user/img/carousel-3.jpg') }}" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Kids Fashion</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="{{ url('user/img/offer-1.jpg') }}" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="{{ url('user/img/offer-2.jpg') }}" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="containe    r-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5" style="background-color: #f8f9fa;">
    <div class="container">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4" style="font-family: 'Montserrat', sans-serif; color: #343a40;">
            <span class="pr-3" style="background: linear-gradient(90deg, #6c63ff, #ff6b6b); -webkit-background-clip: text; -webkit-text-fill-color: transparent; position: relative;">
                Shop By Categories
                <span style="position: absolute; bottom: -8px; left: 0; width: 50px; height: 3px; background: linear-gradient(90deg, #6c63ff, #ff6b6b);"></span>
            </span>
        </h2>
        <div class="row px-xl-5 pb-3">
            @foreach ($category as $cat)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1" style="padding: 10px;">
                <a class="text-decoration-none" href="{{ route('productbycat',['id'=>$cat->cat_id]) }}">
                    <div class="cat-item d-flex align-items-center mb-4" style="
                        background: white;
                        border-radius: 10px;
                        padding: 15px;
                        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
                        transition: all 0.3s ease;
                        border-left: 4px solid #6c63ff;
                    ">
                        <div class="overflow-hidden" style="
                            width: 80px;
                            height: 80px;
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
                            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                        ">
                            <img class="img-fluid" src="{{ url('myimages/' . $cat->cat_image)}}" alt="" style="
                                max-width: 60px;
                                max-height: 60px;
                                object-fit: contain;
                            ">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6 style="
                                font-weight: 600;
                                color: #343a40;
                                margin-bottom: 5px;
                                font-size: 1.1rem;
                            ">{{ $cat->cat_name }}</h6>
                            <small class="text-body" style="
                                color: #6c757d !important;
                                font-size: 0.8rem;
                                display: inline-block;
                                padding: 3px 8px;
                                background: #f1f1f1;
                                border-radius: 20px;
                            ">{{ $catcount }} Products</small>
                        </div>
                        <div style="
                            margin-left: auto;
                            color: #6c63ff;
                            opacity: 0;
                            transition: all 0.3s ease;
                        ">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    </div>
    <!-- Categories End -->

    {{-- <!-- Offer Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="img/offer-1.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="img/offer-2.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End --> --}}


    <!-- Products Start -->
<div class="container-fluid pt-5 pb-3" style="background-color: #f8f9fa;">
    <div class="container">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4" style="font-family: 'Montserrat', sans-serif; color: #343a40;">
            <span class="pr-3" style="background: linear-gradient(90deg, #6c63ff, #ff6b6b); -webkit-background-clip: text; -webkit-text-fill-color: transparent; position: relative;">
                Recent Products
                <span style="position: absolute; bottom: -8px; left: 0; width: 50px; height: 3px; background: linear-gradient(90deg, #6c63ff, #ff6b6b);"></span>
            </span>
        </h2>
        <div class="row px-xl-5">
            @foreach ($products as $pro)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1" style="padding: 10px;">
                <div class="product-item mb-4" style="
                    background: white;
                    border-radius: 12px;
                    overflow: hidden;
                    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
                    position: relative;
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
</div>
<!-- Products End -->

    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img src="{{ url('user/img/vendor-1.jpg') }}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{ url('user/img/vendor-2.jpg') }}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{ url('user/img/vendor-3.jpg') }}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{ url('user/img/vendor-4.jpg') }}" alt="">
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->


@endsection
