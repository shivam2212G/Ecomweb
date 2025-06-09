<!DOCTYPE html>
<html>
<head>
    <title>Bill Receipt - {{ $bill->bill_id }}</title>
    <style>
        :root {
            --primary-color: #d40000;
            --secondary-color: #333;
            --accent-color: #f8f8f8;
            --text-color: #333;
            --light-text: #777;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        .receipt-container {
            width: 85%;
            max-width: 800px;
            margin: 20px auto;
            padding: 30px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            border: 1px solid #eee;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--primary-color);
            position: relative;
        }

        .header h2 {
            color: var(--primary-color);
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .header p {
            margin: 5px 0;
            color: var(--light-text);
        }

        .header::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background-color: var(--primary-color);
        }

        .bill-info {
            margin-bottom: 25px;
            padding: 15px;
            background-color: var(--accent-color);
            border-radius: 8px;
        }

        .bill-info h3 {
            margin-top: 0;
            color: var(--primary-color);
            border-bottom: 1px dashed #ddd;
            padding-bottom: 8px;
        }

        .bill-info p {
            margin: 8px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        }

        th {
            background-color: var(--primary-color);
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }

        tr:nth-child(even) {
            background-color: var(--accent-color);
        }

        tr:hover {
            background-color: rgba(212, 0, 0, 0.05);
        }

        .total {
            font-weight: bold;
            font-size: 18px;
            text-align: right;
            margin-top: 20px;
            padding: 15px;
            background-color: var(--accent-color);
            border-radius: 8px;
            color: var(--primary-color);
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            color: var(--light-text);
            font-size: 14px;
        }

        .print-btn {
            background: linear-gradient(to right, var(--primary-color), #b30000);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 50px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(212, 0, 0, 0.3);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .print-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(212, 0, 0, 0.4);
        }

        @media print {
            .no-print {
                display: none;
            }

            body {
                font-size: 12pt;
                background: none;
            }

            .receipt-container {
                width: 100%;
                max-width: 100%;
                padding: 0;
                box-shadow: none;
                border: none;
                margin: 0;
            }

            .header {
                margin-bottom: 15px;
            }

            table {
                box-shadow: none;
            }

            tr {
                page-break-inside: avoid;
            }
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <div class="header">
            <h2>INVOICE RECEIPT</h2>
            <p>Order #{{ $bill->bill_id }}</p>
            <p>Date: {{ $bill->created_at->format('d/m/Y H:i') }}</p>
        </div>

        <div class="bill-info">
            <h3>Customer Information</h3>
            <p><strong>Name:</strong> {{ $bill->fname }} {{ $bill->lname }}</p>
            <p><strong>Email:</strong> {{ $bill->email }}</p>
            <p><strong>Phone:</strong> {{ $bill->phone ?? 'N/A' }}</p>
            <p><strong>Address:</strong> {{ $bill->address ?? 'N/A' }}</p>
        </div>

        <h3 style="color: var(--primary-color); margin-bottom: 15px;">Order Details</h3>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>₹{{ number_format($item->price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>₹{{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                    @php $total += $item->price * $item->quantity; @endphp
                @endforeach
            </tbody>
        </table>

        <div class="total">
            TOTAL: ₹{{ number_format($total, 2) }}
        </div>

        <div class="footer">
            <p>Thank you for your purchase!</p>
            <p>For any inquiries, please contact our customer support</p>
        </div>

        <div class="no-print" style="text-align: center; margin-top: 40px;">
            <button onclick="window.print()" class="print-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                    <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                </svg>
                Print Receipt
            </button>
        </div>
    </div>

    <script>
        // Auto-print when page loads (optional)
        window.onload = function() {
            // You can keep this or remove it based on preference
            window.print();
        };
    </script>
</body>
</html>
