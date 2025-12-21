@extends('layouts.app')

@section('content')

    @php $currentStep = 2; @endphp

    @include('layouts.navbar.navbar_back')
    <div class="row">
        <div class="Payment">

            @include('layouts.progressBar')

            <div class="container mt-4">
                <div class="row d-flex justify-content-center align-items-center gap-4 my-4">
                    <div class="col bg-light rounded-4 mx-2">
                        <div class="p-4">
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

        <script>

            // Payment Virtual Account
            document.querySelector('[data-bs-target="#VirtualAccount]').addEventListener('click', function () {
                const icon = document.getElementById('virtualAccount');
            });
        </script>
@endsection