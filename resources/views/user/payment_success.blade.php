@extends('layouts.app')

@section('content')

    @php $currentStep = 3; @endphp

    @include('layouts.navbar.navbar_back')
    <div class="row">
        <div class="Payment">

            @include('layouts.progressBar')
            <div class="container mt-4">
                <div class="row d-flex justify-content-center align-items-center gap-4 my-4">
                    <div class="col-lg-6 bg-light rounded-4 mx-2">
                        <div class="p-4">
                            <!-- Order ID -->
                            <div class="row border-bottom pb-2 mb-3 border-3" style="border-color:#AFAFAF;">
                                <div class="col">
                                    <p class="text-secondary m-0">Order ID</p>
                                </div>
                                <div class="col text-end">
                                    <p class="fw-semibold m-0">
                                        {{ $booking->order_id}}
                                    </p>
                                </div>
                            </div>

                            <!-- Title -->
                            <p class="text-center fs-5 mb-4">Angklung River Camp, Klungkung Bali</p>

                            <!-- Check In / Out / Duration -->
                            <div class="row text-center mb-3">
                                <div class="col">
                                    <small class="text-secondary">Check In</small>
                                    <p class="m-0 fw-semibold">
                                        {{ \Carbon\Carbon::parse($booking->checkin)->format('d F Y') }}
                                    </p>
                                </div>

                                <div class="col border-start border-end border-3" style="border-color:#BFBFBF;">
                                    <small class="text-secondary">Check Out</small>
                                    <p class="m-0 fw-semibold">
                                        {{ \Carbon\Carbon::parse($booking->checkout)->format('d F Y') }}
                                    </p>
                                </div>

                                <div class="col">
                                    <small class="text-secondary">Duration</small>
                                    <p class="m-0 fw-semibold">
                                        {{ $duration }} Night
                                    </p>
                                </div>
                            </div>

                            {{-- Package --}}
                            <div class="row border-top pt-3 mb-3 border-3">
                                <div class="col">
                                    <p class="fw-semibold m-0">Packages Type</p>
                                </div>
                                <div class="col text-end">
                                    <p class="fw-semibold m-0">
                                        {{ ucfirst($package->name) }}
                                    </p>
                                </div>
                            </div>

                            <!-- Booking Details -->
                            <div class="mb-3">
                                @forelse($details as $item)
                                    <div class="d-flex justify-content-between">
                                        <p class="m-0">
                                            {{ $item->item_name }}
                                            <small class="text-secondary">
                                                (x{{ $item->quantity }})
                                            </small>
                                        </p>
                                        <p class="m-0">
                                            IDR {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                        </p>
                                    </div>
                                @empty
                                    <p class="text-muted">No booking details</p>
                                @endforelse
                            </div>

                            <!-- Total Payment -->
                            <div class="row border-top pt-3 mb-3 border-3" style="border-color:#AFAFAF;">
                                <div class="col">
                                    <p class="fw-bold fs-5 m-0">Total Payment</p>
                                </div>
                                <div class="col text-end">
                                    <p class="fw-bold fs-5 m-0">
                                        IDR {{ number_format($booking->total_price, 0, ',', '.') }}
                                    </p>

                                </div>
                            </div>

                            <div class="row mb-1">
                                <p class="text-center text-success">The Invoice Has Sent To You're Email!</p>
                            </div>

                            {{-- ACTION --}}
                            <div class="d-grid gap-2">
                                <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                                    Back to Home
                                </a>
                            </div>

                            <!-- Description -->
                            <p class="text-center px-2 mt-3 mb-2"><small>
                                    Enjoy the experience of camping by the river with fresh air and Balinese green
                                    views.
                                    Angklung River Camp is the perfect place to unwind and become one with
                                    nature.</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
@endsection