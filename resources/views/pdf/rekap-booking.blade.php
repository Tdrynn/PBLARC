<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Rekap Booking</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 11px;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
        }

        th {
            background: #eee;
            text-align: center;
        }

        td {
            vertical-align: middle;
        }

        .right {
            text-align: right;
        }

        .center {
            text-align: center;
        }
    </style>
</head>

<body>

    <h2>Rekap Booking</h2>

    <p>
        Total Booking: <strong>{{ $totalBooking }}</strong><br>
        Total Harga: <strong>IDR {{ number_format($totalHarga, 0, ',', '.') }}</strong>
    </p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Customer</th>
                <th>Package</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Participants</th>
                <th>Total Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $i => $booking)
                <tr>
                    <td class="center">{{ $i + 1 }}</td>
                    <td>{{ $booking->name }}</td>
                    <td>{{ $booking->package->name ?? '-' }}</td>
                    <td class="center">{{ \Carbon\Carbon::parse($booking->checkin)->format('d M Y') }}</td>
                    <td class="center">{{ \Carbon\Carbon::parse($booking->checkout)->format('d M Y') }}</td>
                    <td class="center">{{ $booking->participants }}</td>
                    <td class="right">
                        IDR {{ number_format($booking->total_price, 0, ',', '.') }}
                    </td>
                    <td class="center">{{ ucfirst($booking->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
