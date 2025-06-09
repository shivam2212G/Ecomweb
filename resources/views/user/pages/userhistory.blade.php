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
{{-- Bill Info --}}
@foreach ($userdata as $data)
<div style="font-family: 'Inter', sans-serif; max-width: 850px; margin: 30px auto; padding: 0; border-radius: 8px; overflow: hidden; box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1); background: white; border: 1px solid #e0e0e0;">

    {{-- Header --}}
    <div style="background: #000000; padding: 25px 40px; color: white; display: flex; justify-content: space-between; align-items: center; border-bottom: 4px solid #FFD700;">
        <div>
            <h1 style="margin: 0; font-size: 26px; font-weight: 700; letter-spacing: -0.5px;">INVOICE #{{ $data->bill_id }}</h1>
            <p style="margin: 5px 0 0; font-size: 14px; color: #CCCCCC;">Issued: {{ date('F j, Y') }}</p>
        </div>
        <div style="background: #FFD700; padding: 12px 20px; border-radius: 6px;">
            <p style="margin: 0; font-size: 20px; font-weight: 800; color: #000000;">₹{{ number_format($data->total, 2) }}</p>
            <p style="margin: 3px 0 0; font-size: 12px; color: #000000; opacity: 0.8;">TOTAL DUE</p>
        </div>
    </div>

    {{-- Main Content --}}
    <div style="display: flex; flex-wrap: wrap; padding: 0;">

        {{-- Left Column --}}
        <div style="flex: 1; min-width: 300px; padding: 30px; border-right: 1px solid #f0f0f0;">

            {{-- Customer Info --}}
            <div style="margin-bottom: 30px;">
                <div style="display: flex; align-items: center; margin-bottom: 15px; padding-bottom: 10px; border-bottom: 2px solid #FFD700;">
                    <span style="background: #000000; width: 28px; height: 28px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-right: 12px; color: #FFD700; font-size: 14px;">👤</span>
                    <h3 style="margin: 0; color: #333; font-size: 18px; font-weight: 700;">CUSTOMER</h3>
                </div>
                <div style="display: grid; grid-template-columns: 100px 1fr; gap: 10px;">
                    <p style="margin: 8px 0; color: #666; font-weight: 500;">Name:</p>
                    <p style="margin: 8px 0; color: #333; font-weight: 600;">{{ $data->fname }} {{ $data->lname }}</p>

                    <p style="margin: 8px 0; color: #666; font-weight: 500;">Email:</p>
                    <p style="margin: 8px 0; color: #333;">{{ $data->email }}</p>

                    <p style="margin: 8px 0; color: #666; font-weight: 500;">Phone:</p>
                    <p style="margin: 8px 0; color: #333;">{{ $data->mono }}</p>

                </div>
            </div>

            {{-- Address --}}
            <div>
                <div style="display: flex; align-items: center; margin-bottom: 15px; padding-bottom: 10px; border-bottom: 2px solid #FFD700;">
                    <span style="background: #000000; width: 28px; height: 28px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-right: 12px; color: #FFD700; font-size: 14px;">🏠</span>
                    <h3 style="margin: 0; color: #333; font-size: 18px; font-weight: 700;">DELIVERY ADDRESS</h3>
                </div>
                <div style="background: #f9f9f9; padding: 15px; border-radius: 6px; border-left: 3px solid #FFD700;">
                    <p style="margin: 8px 0; color: #555;">{{ $data->addl1 }}</p>
                    <p style="margin: 8px 0; color: #555;">{{ $data->addl2 }}</p>
                    <p style="margin: 8px 0; color: #555;">{{ $data->city }}, {{ $data->state }}</p>
                    <p style="margin: 8px 0; color: #555;">{{ $data->country }} - {{ $data->zipcode }}</p>
                </div>
            </div>
        </div>

        {{-- Right Column --}}
        <div style="flex: 1; min-width: 300px; padding: 30px;">

            {{-- Payment Summary --}}
            <div>
                <div style="display: flex; align-items: center; margin-bottom: 15px; padding-bottom: 10px; border-bottom: 2px solid #FFD700;">
                    <span style="background: #000000; width: 28px; height: 28px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-right: 12px; color: #FFD700; font-size: 14px;">💰</span>
                    <h3 style="margin: 0; color: #333; font-size: 18px; font-weight: 700;">PAYMENT SUMMARY</h3>
                </div>

                <div style="background: white; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden;">
                    <div style="display: flex; justify-content: space-between; padding: 12px 20px; background: #000000; color: white; font-weight: 600;">
                        <span>DESCRIPTION</span>
                        <span>AMOUNT</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 15px 20px; border-bottom: 1px solid #f0f0f0;">
                        <span style="color: #666;">Products Total</span>
                        <span style="color: #333; font-weight: 500;">₹{{ number_format($data->total, 2) }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 15px 20px; border-bottom: 1px solid #f0f0f0;">
                        <span style="color: #666;">Tax</span>
                        <span style="color: #333; font-weight: 500;">₹0.00</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 15px 20px; background: #FFF9E6;">
                        <span style="color: #000; font-weight: 700;">TOTAL DUE</span>
                        <span style="color: #000; font-weight: 800;">₹{{ number_format($data->total, 2) }}</span>
                    </div>
                </div>
            </div>

            {{-- Payment Method --}}
            <div style="margin-top: 30px;">
                <div style="display: flex; align-items: center; margin-bottom: 15px; padding-bottom: 10px; border-bottom: 2px solid #FFD700;">
                    <span style="background: #000000; width: 28px; height: 28px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-right: 12px; color: #FFD700; font-size: 14px;">💳</span>
                    <h3 style="margin: 0; color: #333; font-size: 18px; font-weight: 700;">PAYMENT METHOD</h3>
                </div>
                <div style="background: #f9f9f9; padding: 15px; border-radius: 8px; display: flex; align-items: center; border-left: 3px solid #FFD700;">
                    <div style="width: 40px; height: 40px; background: #000000; color: #FFD700; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px; font-weight: bold;">
                        ₹
                    </div>
                    <div>
                        <p style="margin: 0; font-weight: 700; color: #000;">Online Payment</p>
                        <p style="margin: 3px 0 0; font-size: 13px; color: #666;">Completed on {{ date('F j, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <div style="background: #000000; padding: 20px; text-align: center; color: #FFD700; font-size: 14px; border-top: 1px solid #333;">
        <p style="margin: 5px 0; font-weight: 600;">THANK YOU FOR YOUR BUSINESS</p>
        <p style="margin: 5px 0 0; font-size: 12px; color: #CCCCCC;">Questions? support@example.com • +91 1234567890</p>
    </div>

</div>
@endforeach
{{-- Bill Info End --}}

@endsection
