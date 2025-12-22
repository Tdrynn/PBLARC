@extends('layouts.app')

@section('content')

    @php $currentStep = 2; @endphp

    @include('layouts.navbar.navbar_back')
    <div class="row">
        <div class="Payment">

            @include('layouts.progressBar')
            <div class="container text-center mt-5">
                <h1 class="text-warning">⏳ Payment Pending</h1>

                <p>
                    Order ID : <strong>{{ $booking->order_id }}</strong>
                </p>

                <p>
                    Please Complete Your Payment.
                </p>

                <a href="{{ route('home') }}" class="btn btn-primary mt-3">
                    Back to Home
                </a>
            </div>
@endsection