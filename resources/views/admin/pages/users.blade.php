@extends('admin.layout.master')
@section('title','Users')
@section('content')

<style>
    .btn-danger {
        background-color: #d40000;
        border: none;
        color: white;
        font-weight: bold;
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .btn-danger:hover {
        transform: scale(1.05);
        background-color: #ff1a1a;
    }

    .table-dark th,
    .table-dark td {
        vertical-align: middle;
    }

    .custom-table thead th {
        background-color: #b30000 !important;
        color: #fff !important;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 14px;
        letter-spacing: 0.5px;
        border-bottom: 2px solid #ff3333;
    }

    .bg-dark {
        background-color: #121212 !important;
    }

    .shadow {
        box-shadow: 0 0 15px rgba(255, 0, 0, 0.2);
    }

    h4 {
        color: #ff3333;
        font-weight: 600;
    }

    .container-fluid {
        background-color: #0a0a0a;
        min-height: 100vh;
    }
</style>

<div class="container-fluid pt-4 px-4">
    <div class="bg-dark text-white rounded shadow p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>User Details</h4>
        </div>

        <div class="table-responsive">
            <table class="table table-dark table-hover table-bordered align-middle mb-0 custom-table">
                <thead class="text-center">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Registered On</th>
                        <th>Bill By User</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="text-center">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('billbyuser',['id'=>$user->id]) }}">
                                <button>Bills</button>
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
