@extends('layouts.app')

@section('content')

    @php $currentStep = 2; @endphp

    <div class="row">
        <div class="Payment">

            @include('layouts.progressBar')
            <div class="container text-center mt-5">
                <h1 class="text-success">🎉 Payment Successful</h1>
                <p>Thank you, {{ $booking->name }}</p>

                <p>
                    Order ID: <strong>{{ $booking->order_id }}</strong>
                </p>

                <p>
                    Total Paid:
                    <strong>IDR {{ number_format($booking->total_price, 0, ',', '.') }}</strong>
                </p>

                @if($booking->payment_status !== 'paid')
                    <p class="text-muted">
                        Waiting confirmation from payment gateway...
                    </p>
                @endif

                <a href="{{ route('home') }}" class="btn btn-primary mt-3">
                    Back to Home
                </a>
            </div>
@endsection