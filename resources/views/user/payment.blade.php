@extends('layouts.app')

@section('content')
    @include('layouts.navbar.navbar_back')
    <div class="row">
        <div class="Payment">
            {{-- Progress Bar --}}
            <div class="container d-flex justify-content-center mt-5">
                <div class="p-4 rounded-4 d-flex align-items-center justify-content-center gap-1 mb-4"
                    style="background-color: #FFFFFF; width: 280px; height: 65px;">

                    {{-- STEP 1 --}}
                    <div class="text-center">
                        <div class="step-circle fw-bold fs-4">1</div>
                        <div class="fw-medium">Booking</div>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" width="400" height="100" class="bi bi-arrow-right mb-4"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg>

                    {{-- STEP 2 --}}
                    <div class="text-center">
                        <div class="step-circle fw-bold fs-4">2</div>
                        <div class="fw-medium">Payment</div>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" width="400" height="100" class="bi bi-arrow-right mb-4"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.146-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg>

                    {{-- STEP 3 --}}
                    <div class="text-center">
                        <div class="step-circle fw-bold fs-4">3</div>
                        <div class="fw-medium">Invoice</div>
                    </div>
                </div>
            </div>

            <div class="container d-flex justify-content-center mt-4">
                <div class="row d-flex justify-content-center align-items-start gap-5"
                    style="width: 100%; max-width: 1200px;">

                    <!-- CARD KIRI -->
                    <div class="col justify-content-center align-items-center d-flex">
                        <div class="" style="background-color: white; width: 350px; height: 270px; border-radius: 20px;">
                            <p class="fs-3 text-success fw-semibold text-center mt-3">Select Payment Method</p>

                            <a href="#"
                                class="fs-3 fw-semibold text-success border-bottom border-2 border-success-subtle text-decoration-none mb-3 mx-4" style="border-width: 700px;">Cash</a><br>

                            <a href="#"
                                class="fs-3 fw-semibold text-success border-bottom border-2 border-success-subtle text-decoration-none mb-3 mx-4">Virtual
                                Account
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                    class="bi bi-chevron-up ms-5" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z" />
                                </svg>
                            </a><br>

                            <a href="#"
                                class="fs-3 fw-semibold text-success border-bottom border-2 border-success-subtle text-decoration-none mb-3 mx-4">QRIS</a>
                        </div>
                    </div>

                    <!-- CARD KANAN -->
                    <div class="col mb-4">
                        <div class="p-4" style="background-color:white; width:650px; border-radius:20px;">
                            <!-- Order ID -->
                            <div class="row border-bottom pb-2 mb-3 border-3" style="border-color:#AFAFAF;">
                                <div class="col">
                                    <p class="text-secondary m-0">Order ID</p>
                                </div>
                                <div class="col text-end">
                                    <p class="fw-semibold m-0">1234567890</p>
                                </div>
                            </div>

                            <!-- Title -->
                            <p class="text-center fs-5 mb-4">Angklung River Camp, Klungkung Bali</p>

                            <!-- Check In / Out / Duration -->
                            <div class="row text-center mb-3">
                                <div class="col">
                                    <small class="text-secondary">Check In</small>
                                    <p class="m-0 fw-semibold">29 October 2025</p>
                                    <small class="text-secondary">14.00 WITA</small>
                                </div>

                                <div class="col border-start border-end border-3" style="border-color:#BFBFBF;">
                                    <small class="text-secondary">Check Out</small>
                                    <p class="m-0 fw-semibold">30 October 2025</p>
                                    <small class="text-secondary">14.00 WITA</small>
                                </div>

                                <div class="col">
                                    <small class="text-secondary">Duration</small>
                                    <p class="m-0 fw-semibold">1 Night</p>
                                </div>
                            </div>

                            <!-- Package Type -->
                            <div class="row border-top pt-3 mb-3 border-3" style="border-color:#AFAFAF;">
                                <div class="col">
                                    <p class="fw-semibold m-0">Packages Type</p>
                                </div>
                                <div class="col text-end">
                                    <p class="fw-semibold m-0">Camping</p>
                                </div>
                            </div>

                            <!-- Add ons -->
                            <div class="row mb-2">
                                <div class="col d-flex align-items-center gap-2">
                                    <p class="fw-semibold m-0">Add-ons</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                        class="bi bi-plus" viewBox="0 0 16 16">
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                    </svg>
                                </div>
                            </div>

                            <div class="mb-3">
                                <p class="m-0">Sleeping Bag</p>
                                <p class="m-0">Hammock</p>
                            </div>

                            <!-- Price section -->
                            <div class="row border-bottom pb-3 mb-3 border-3" style="border-color:#AFAFAF;">
                                <div class="col">
                                    <p class="m-0">Price per Night</p>
                                    <p class="m-0">Tax & Service</p>
                                </div>
                                <div class="col text-end">
                                    <p class="m-0">IDR 55.000,00</p>
                                    <p class="m-0">IDR 5.500,00</p>
                                </div>
                            </div>

                            <!-- Total Payment -->
                            <div class="row mb-3">
                                <div class="col">
                                    <p class="fw-bold fs-5 m-0">Total Payment</p>
                                </div>
                                <div class="col text-end">
                                    <p class="fw-bold fs-5 m-0">IDR 65.500,00</p>
                                </div>
                            </div>

                            <!-- Payment deadline -->
                            <div class="row mb-3">
                                <div class="col">
                                    <p class="m-0">Complete payment before</p>
                                    <p class="m-0">Time left</p>
                                </div>
                                <div class="col text-end">
                                    <p class="m-0">28 Oct 2025, 03:00 PM</p>
                                    <p class="m-0">29:59</p>
                                </div>
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
        </div>


@endsection