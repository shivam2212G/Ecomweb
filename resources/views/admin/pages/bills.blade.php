@extends('admin.layout.master')
@section('title','Bills')
@section('content')

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #121212;
        color: #f0f0f0;
        margin: 0;
    }

    .bills-container {
        width: 90%;
        margin: 40px auto;
        background-color: #1c1c1c;
        border: 2px solid #d40000;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(255, 0, 0, 0.3);
        padding: 20px;
    }

    .title {
        text-align: center;
        color: #ff3333;
        font-size: 30px;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .bills-table {
        width: 100%;
        border-collapse: collapse;
        color: #fff;
    }

    .bills-table thead {
        background-color: #000;
    }

    .bills-table th {
        border: 1px solid #d40000;
        padding: 12px;
        text-align: center;
        font-size: 16px;
        text-transform: uppercase;
        color: #ff4444;
    }

    .bills-table td {
        border: 1px solid #333;
        padding: 12px;
        text-align: center;
        background-color: #222;
    }

    .bills-table tbody tr:nth-child(odd) {
        background-color: #1a1a1a;
    }

    .bills-table tbody tr:hover {
        background-color: #330000;
    }

    .bills-table button {
        background-color: #d40000;
        border: none;
        color: #fff;
        padding: 8px 14px;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        font-size: 14px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .bills-table button:hover {
        background-color: #ff1a1a;
        transform: scale(1.05);
    }

    a {
        text-decoration: none;
    }
</style>

<div class="bills-container">
    <h2 class="title">Bills Overview</h2>
    <table class="bills-table">
        <thead>
            <tr>
                <th>Bill ID</th>
                <th>User ID</th>
                <th>User Name</th>
                <th>Total</th>
                <th>Bill Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bills as $bill)
            <tr>
                <td>{{ $bill->bill_id }}</td>
                <td>{{ $bill->u_id }}</td>
                <td>{{ $bill->fname }} {{ $bill->lname }}</td>
                <td>${{ number_format($bill->total, 2) }}</td>
                <td>
                    <a href="{{ route('admin.billdetails', ['bill_id' => $bill->bill_id]) }}">
                        <button>View</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
