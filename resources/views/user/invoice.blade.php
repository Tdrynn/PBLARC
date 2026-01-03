<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice Booking</title>

    <style>
        @page {
            margin: 30px;
        }

        html, body {
            background: #ffffff !important;
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
            font-size: 20px;
        }

        .header p {
            margin: 4px 0 0;
            font-size: 12px;
        }

        .box {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 15px;
            background: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 6px;
            vertical-align: top;
        }

        th {
            background: #f5f5f5;
            font-weight: bold;
        }

        .text-right {
            text-align: right;
        }

        .total {
            font-size: 14px;
            font-weight: bold;
        }

        .footer {
            margin-top: 25px;
            text-align: center;
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
            <td width="30%"><strong>Order ID</strong></td>
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
                <th width="5%">#</th>
                <th>Item</th>
                <th width="15%">Type</th>
                <th width="10%">Qty</th>
                <th width="15%" class="text-right">Price</th>
                <th width="15%" class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($booking->details as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
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
            Total Payment :
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
