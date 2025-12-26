<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice Booking</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
        }

        .box {
            border: 1px solid #ddd;
            padding: 12px;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 6px;
        }

        th {
            background: #f5f5f5;
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .total {
            font-weight: bold;
            font-size: 14px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 11px;
            color: #777;
        }
    </style>
</head>

<body>

    {{-- HEADER --}}
    <div class="header">
        <h2>INVOICE</h2>
        <p>Angklung River Camp – Klungkung Bali</p>
    </div>

    {{-- BOOKING INFO --}}
    <div class="box">
        <table>
            <tr>
                <td><strong>Order ID</strong></td>
                <td>{{ $booking->order_id }}</td>
            </tr>
            <tr>
                <td><strong>Name</strong></td>
                <td>{{ $booking->name }}</td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td>{{ $booking->email ?? '-' }}</td>
            </tr>
            <tr>
                <td><strong>Phone</strong></td>
                <td>{{ $booking->telephone }}</td>
            </tr>
            <tr>
                <td><strong>Check In</strong></td>
                <td>{{ \Carbon\Carbon::parse($booking->checkin)->format('d F Y') }}</td>
            </tr>
            <tr>
                <td><strong>Check Out</strong></td>
                <td>{{ \Carbon\Carbon::parse($booking->checkout)->format('d F Y') }}</td>
            </tr>
        </table>
    </div>

    {{-- ITEM DETAILS --}}
    <div class="box">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Item</th>
                    <th>Type</th>
                    <th>Qty</th>
                    <th class="text-right">Price</th>
                    <th class="text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($booking->details as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ ucfirst($item->item_type) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td class="text-right">
                            IDR {{ number_format($item->price, 0, ',', '.') }}
                        </td>
                        <td class="text-right">
                            IDR {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- TOTAL --}}
    <table width="100%">
        <tr>
            <td class="text-right total">
                Total Payment:
                IDR {{ number_format($booking->total_price, 0, ',', '.') }}
            </td>
        </tr>
    </table>

    {{-- FOOTER --}}
    <div class="footer">
        <p>
            Thank you for your booking.<br>
            This invoice is generated automatically.
        </p>
    </div>

</body>

</html>