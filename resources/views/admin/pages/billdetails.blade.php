@extends('admin.layout.master')
@section('title','Bill Details')
@section('content')

<style>
    body {
        background-color: #121212;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #f0f0f0;
    }

    .details-container {
        width: 90%;
        margin: 40px auto;
        background-color: #1a1a1a;
        padding: 30px;
        border: 2px solid #d40000;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(255, 0, 0, 0.3);
    }

    h3 {
        color: #ff3333;
        border-bottom: 2px solid #d40000;
        padding-bottom: 5px;
        margin-bottom: 15px;
        font-size: 24px;
        text-transform: uppercase;
    }

    p {
        font-size: 16px;
        margin: 8px 0;
    }

    strong {
        color: #ff4444;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #1c1c1c;
        color: #f0f0f0;
    }

    th, td {
        border: 1px solid #444;
        padding: 12px;
        text-align: center;
    }

    th {
        background-color: #000;
        color: #ff4444;
        text-transform: uppercase;
        font-size: 14px;
    }

    tr:nth-child(even) {
        background-color: #222;
    }

    tr:hover {
        background-color: #330000;
    }
</style>

<div class="details-container">
    @foreach ($detail as $bill)
        <h3>User Information</h3>
        <p><strong>Full Name:</strong> {{ $bill->fname }} {{ $bill->lname }}</p>
        <p><strong>Email:</strong> {{ $bill->email }}</p>
        <!-- Add more fields as needed -->

        <h3>Cart Items</h3>
        @php
            $cartItems = json_decode($bill->cart_data);
        @endphp

        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>₹{{ number_format($item->price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>₹{{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <div style="text-align: right; margin-top: 20px;">
                        <a href="{{ route('admin.print.bill', $bill->bill_id) }}"
                        target="_blank"
                        class="btn btn-danger"
                        style="padding: 10px 20px; text-decoration: none; color: white; background-color: #d40000; border-radius: 5px;">
                            🖨️ Print
                        </a>
                    </div>
                </tr>
            </tbody>

        </table>
    @endforeach
</div>

@endsection
