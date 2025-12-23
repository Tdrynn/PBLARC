@extends('layouts.app')

@section('content')

    @php $currentStep = 2; @endphp

    @include('layouts.navbar.navbar_back')

    <div class="container text-center mt-5">
        <h1 class="text-danger">❌ Payment Failed</h1>

        <p class="mt-3">
            Unfortunately, your payment could not be completed.
        </p>

        <div class="card mx-auto mt-4" style="max-width: 450px;">
            <div class="card-body">
                <p class="mb-1">Order ID</p>
                <h6>{{ $booking->order_id }}</h6>

                <hr>

                <p class="mb-1">Total Payment</p>
                <h5 class="text-success">
                    IDR {{ number_format($booking->total_price, 0, ',', '.') }}
                </h5>

                <p class="text-muted mt-2">
                    Please try again or use another payment method.
                </p>
            </div>
        </div>

        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="{{ route('payment.page', $booking->id) }}" class="btn btn-success">
                Pay Again
            </a>

            <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                Back to Home
            </a>
        </div>
    </div>

@endsection