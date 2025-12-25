<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Rekap Dashboard</title>
    <style>
        body {
            font-family: Helvetica, Arial, sans-serif;
            font-size: 12px;
            color: #111827;
            margin: 0;
            padding: 0;
        }

        h1 {
            margin: 0;
            font-size: 20px;
        }

        h2 {
            font-size: 14px;
            margin: 30px 0 10px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }

        .header {
            text-align: center;
            padding: 15px 0;
            border-bottom: 2px solid #444;
        }

        .meta {
            margin-top: 10px;
            font-size: 11px;
            color: #555;
            text-align: right;
        }

        /* Grid 2 kolom */
        .grid {
            width: 100%;
            margin-top: 15px;
        }

        .card {
            width: 48%;
            display: inline-block;
            vertical-align: top;
            margin-bottom: 15px;
            padding: 15px;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            background-color: #f9fafb;
        }

        .card.left {
            margin-right: 3%;
        }

        .label {
            font-size: 11px;
            color: #6b7280;
            margin-bottom: 6px;
        }

        .value {
            font-size: 22px;
            font-weight: bold;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 10px;
            color: #888;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <div class="header">
        <h1>Dashboard Summary</h1>
    </div>

    <div class="meta">
        Periode: <strong>{{ $periode }}</strong><br>
        Dicetak pada: {{ $tanggal }}
    </div>

    <!-- BOOKING -->
    <h2>Booking</h2>
    <div class="grid">
        <div class="card left">
            <div class="label">Total Booking (Periode Ini)</div>
            <div class="value">{{ $totalBooking }}</div>
        </div>

        <div class="card">
            <div class="label">Booking Hari Ini</div>
            <div class="value">{{ $todayBooking }}</div>
        </div>
    </div>

    <!-- REVIEW -->
    <h2>Review</h2>
    <div class="grid">
        <div class="card left">
            <div class="label">Total Reviews</div>
            <div class="value">{{ $totalReview }}</div>
        </div>

        <div class="card">
            <div class="label">Average Rating</div>
            <div class="value">{{ $avgRating }} / 5.0</div>
        </div>
    </div>

    <!-- USER -->
    <h2>User</h2>
    <div class="grid">
        <div class="card left">
            <div class="label">Total User Baru</div>
            <div class="value">{{ $totalUser }}</div>
        </div>

        <div class="card">
            <div class="label">User Baru Hari Ini</div>
            <div class="value">{{ $newUserToday }}</div>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        Dokumen ini dibuat secara otomatis oleh sistem.
    </div>

</body>

</html>
