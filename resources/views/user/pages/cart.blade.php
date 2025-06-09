
@extends('user.layout.master')
@section('title','Cart')
@section('content')

<!-- Breadcrumb Start -->
<div class="container-fluid mt-3">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-white mb-4 py-3 px-4 shadow-sm rounded" style="font-size: 14px;">
                <a class="breadcrumb-item text-decoration-none text-primary" href="{{ url('index') }}">🏠 Home</a>
                <a class="breadcrumb-item text-decoration-none text-primary" href="{{ url('shop') }}">🛍 Shop</a>
                <span class="breadcrumb-item active text-muted">📋 Shopping Cart</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($carts as $c)
                    <tr data-id="{{ $c->cart_id }}">
                        <td class="align-content-between">
                            <img src="{{ url('myimages/'.$c->product_image) }}" alt="" style="width: 50px;">
                            {{ $c->product_name }}
                        </td>
                        <td class="align-middle unit-price" data-price="{{ $c->product_price }}">${{ $c->product_price }}</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus"><i class="fa fa-minus"></i></button>
                                </div>
                                <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center quantity-input" value="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle item-total">${{ $c->product_price }}</td>
                        <td class="align-middle">
                            <a href="{{ route('deletecart',['id'=>$c->cart_id]) }}">
                                <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-lg-4">
            <a href="{{ route('checkouthistory',['u_id'=>Auth::user()->id]) }}">
            <button>View History</button>
            </a>
            <form class="mb-30" action="">
                <div class="input-group">
                    <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6 class="cart-subtotal">$0.00</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$10.00</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5 class="cart-total">$0.00</h5>
                    </div>
                <form id="checkout-form" method="POST" action="{{ route('usercheckout') }}">
                 @csrf
                <input type="hidden" name="cart_total" id="cart_total">
                <input type="hidden" name="cart_subtotal" id="cart_subtotal">
                <input type="hidden" name="cart_data" id="cart_data">
               <button type="submit" class="btn btn-block btn-primary font-weight-bold my-3 py-3">
                Proceed To Checkout
               </button>
                </form>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Prevent duplicate event bindings
    const plusButtons = document.querySelectorAll('.btn-plus');
    const minusButtons = document.querySelectorAll('.btn-minus');

    plusButtons.forEach((btn) => {
        const newBtn = btn.cloneNode(true);
        btn.parentNode.replaceChild(newBtn, btn);
    });

    minusButtons.forEach((btn) => {
        const newBtn = btn.cloneNode(true);
        btn.parentNode.replaceChild(newBtn, btn);
    });

    // Update individual item total and cart summary
    function updateTotal(row) {
        const price = parseFloat(row.querySelector('.unit-price').dataset.price);
        const quantity = parseInt(row.querySelector('.quantity-input').value);
        const total = (price * quantity).toFixed(2);
        row.querySelector('.item-total').innerText = '$' + total;
        updateCartSummary();
    }

    // Update subtotal and grand total
    function updateCartSummary() {
        let subtotal = 0;
        document.querySelectorAll('tr[data-id]').forEach(row => {
            const price = parseFloat(row.querySelector('.unit-price').dataset.price);
            const quantity = parseInt(row.querySelector('.quantity-input').value);
            subtotal += price * quantity;
        });

        const shipping = 10.00;
        const total = subtotal + shipping;

        document.querySelector('.cart-subtotal').innerText = '$' + subtotal.toFixed(2);
        document.querySelector('.cart-total').innerText = '$' + total.toFixed(2);
    }

    // Bind plus button events
    document.querySelectorAll('.btn-plus').forEach(btn => {
        btn.addEventListener('click', function () {
            const row = this.closest('tr');
            const input = row.querySelector('.quantity-input');
            let quantity = parseInt(input.value);
            if (!isNaN(quantity)) {
                input.value = quantity + 1;
                updateTotal(row);
            }
        });
    });

    // Bind minus button events
    document.querySelectorAll('.btn-minus').forEach(btn => {
        btn.addEventListener('click', function () {
            const row = this.closest('tr');
            const input = row.querySelector('.quantity-input');
            let quantity = parseInt(input.value);
            if (!isNaN(quantity) && quantity > 1) {
                input.value = quantity - 1;
                updateTotal(row);
            }
        });
    });

    // Initial calculation on page load
    document.querySelectorAll('tr[data-id]').forEach(updateTotal);

    // Handle checkout form submission
    const checkoutForm = document.getElementById('checkout-form');
    if (checkoutForm) {
        checkoutForm.addEventListener('submit', function () {
            let subtotal = 0;
            let cartItems = [];

            document.querySelectorAll('tr[data-id]').forEach(row => {
                const id = row.getAttribute('data-id');
                const name = row.querySelector('td:nth-child(1)').innerText.trim();
                const price = parseFloat(row.querySelector('.unit-price').dataset.price);
                const quantity = parseInt(row.querySelector('.quantity-input').value);
                subtotal += price * quantity;

                cartItems.push({
                    id: id,
                    name: name,
                    price: price,
                    quantity: quantity
                });
            });

            const shipping = 10.00;
            const total = subtotal + shipping;

            // Update hidden inputs
            document.getElementById('cart_total').value = total.toFixed(2);
            document.getElementById('cart_subtotal').value = subtotal.toFixed(2);
            document.getElementById('cart_data').value = JSON.stringify(cartItems);
        });
    }
});
</script>


@endsection
