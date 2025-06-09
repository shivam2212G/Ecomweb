@extends('user.layout.master')
@section('title','Checkout')
@section('content')


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

<!-- Checkout Start -->
        <div class="container-fluid">
            <form action="{{ route('savebill') }}" method="POST">
            @csrf
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                    <div class="bg-light p-30 mb-5">

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" placeholder="John" name="fname">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" placeholder="Doe" name="lname">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" placeholder="example@email.com" name="email">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" placeholder="+123 456 789" name="mono">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 1</label>
                                <input class="form-control" type="text" placeholder="123 Street" name="addl1">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 2</label>
                                <input class="form-control" type="text" placeholder="123 Street" name="addl2">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Country</label>
                                <select class="custom-select" name="country">
                                    <option selected>India</option>
                                    <option>Autralia</option>
                                    <option>Algeria</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input class="form-control" type="text" placeholder="New York" name="city">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>State</label>
                                <input class="form-control" type="text" placeholder="New York" name="state">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" type="text" placeholder="123" name="zipcode">
                            </div>
                            <input type="hidden" name="total" value="{{$cartTotal}}">
                            <input type="hidden" name="sub_total" value="{{$cartSubtotal}}">
                            <input type="hidden" name="cart_data" value="{{ json_encode($cartData) }}">
                            <input type="hidden" name="u_id" value="{{Auth::user()->id}}">

                        </div>
                    </div>
                </div>

                    <div class="col-lg-4">
                            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                    <div class="bg-white p-4 p-md-5 mb-5 shadow-sm rounded border">
                        <div class="border-bottom pb-3 mb-3">
                            <h5 class="text-uppercase mb-4">🛒 Your Products</h5>
                            @foreach ($cartData as $cart)
                            <div class="d-flex justify-content-between align-items-center mb-3 py-2 border-bottom">
                                <div class="flex-grow-1">
                                    <p class="mb-1 font-weight-bold">{{ $cart['name'] }}</p>
                                    <small class="text-muted">Quantity: {{ $cart['quantity'] }}</small>
                                </div>
                                <div class="text-right">
                                    <p class="mb-0 font-weight-bold text-primary">
                                        ${{ number_format($cart['price'] * $cart['quantity'], 2) }}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="border-bottom pb-3 mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <h6 class="text-muted">Subtotal</h6>
                                <h6 class="text-dark">${{ number_format($cartSubtotal, 2) }}</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="text-muted">Shipping</h6>
                                <h6 class="text-dark">$10.00</h6>
                            </div>
                        </div>

                        <div class="pt-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="text-uppercase">Total</h5>
                                <h4 class="text-primary">${{ number_format($cartTotal, 2) }}</h4>
                            </div>
                        </div>
                    </div>

                                    {{-- <div class="mb-5">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                        <div class="bg-light p-30">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                    <label class="custom-control-label" for="directcheck">Direct Check</label>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                    <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                </div>
                            </div>
                            <button class="btn btn-block btn-primary font-weight-bold py-3">Place Order</button>
                        </div>
                                    </div> --}}
            </div>
        </div>
        <button class="btn btn-block btn-primary font-weight-bold py-3" type="submit">Place Order</button>
        </form>
        </div>
        <!-- Checkout End -->


@endsection
