@extends('layouts.app')

@section('content')
    @include('layouts.navbar.navbar_learnMore')

    <div class="row">
        <div id="picnic" class="text-light LearnMore py-4 shadow-lg p-3">
            <div class="container-fluid px-0">
                <h1 class="text-center fw-bold text-dark mt-5">Camping</h1>

                <div class="row gap-2 d-flex justify-content-center">
                    <div class="col-md-5">
                        <img src="{{ Vite::asset('resources/images/CP1.png') }}" alt="Camping"
                            class="rounded-4 object-fit-cover img1-package p-1">
                    </div>

                    <div class="col-md-3 g-0">
                        <div class="d-flex flex-row flex-lg-column">
                            <img src="{{ Vite::asset('resources/images/CP2.png') }}" alt="Camping"
                                class="rounded-4 object-fit-cover img2-package img2-package p-1">
                            <img src="{{ Vite::asset('resources/images/CP3.png') }}" alt="Camping"
                                class="rounded-4 object-fit-cover img2-package img2-package p-1">
                        </div>
                    </div>

                    <div class="col-md-3 g-0">
                        <div class="d-flex flex-row flex-lg-column">
                            <img src="{{ Vite::asset('resources/images/CP4.png') }}" alt="Camping"
                                class="rounded-4 object-fit-cover img2-package img2-package p-1">
                            <img src="{{ Vite::asset('resources/images/CP5.png') }}" alt="Camping"
                                class="rounded-4 object-fit-cover img2-package img2-package p-1">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="background-color: #4f9e84;">
            <div class="my-3">
                <div class="row mx-5 text-start">
                    <h4 class="fw-bold text-start ms-4 mt-2 text-dark">Facility</h4>
                </div>

                <div class="d-flex flex-wrap justify-content-center container facility gap-2">
                    <div class="col-md-2 col-4 d-flex align-items-center gap-2">
                        <img src="{{ Vite::asset('resources/images/toilet.png') }}" alt="toilet" class="img-fluid"
                            width="40px">
                        <p class="fs-5 fw-semibold text-dark">Toilet</p>
                    </div>
                    <div class="col-md-2 col-4 d-flex align-items-center gap-2">
                        <img src="{{ Vite::asset('resources/images/parking.png') }}" alt="parking" class="img-fluid"
                            width="40px">
                        <p class="fs-5 fw-semibold text-dark">Parking</p>
                    </div>
                    <div class="col-md-3 col-7 d-flex align-items-center gap-2">
                        <img src="{{ Vite::asset('resources/images/electrical.png') }}" alt="electrical" class="img-fluid"
                            width="40px">
                        <p class="fs-5 fw-semibold text-dark">Electrical Socket</p>
                    </div>
                    <div class="col-md-2 col-3 d-flex align-items-center gap-2">
                        <img src="{{ Vite::asset('resources/images/sink.png') }}" alt="sink" class="img-fluid" width="40px">
                        <p class="fs-5 fw-semibold text-dark">Wash Basin</p>
                    </div>
                </div>

                <div class="d-flex align-item-center justify-content-center">
                    <hr class="border border-dark opacity-75 mt-1 mb-3" style="width: 90%;">
                </div>

                <div class="container bg-white text-dark rounded-4 p-3 shadow-sm">
                    <div class="row gap-2">
                        <div class="col-md-6 col-12 my-auto d-flex gap-3">
                            <div>
                                <h5 class="fw-bold">Price</h5>
                                <p class="my-0">tent 1-person IDR 25k (weekdays)</p>
                                <p class="my-0">tent 1-person IDR 35k (weekend)</p>
                                <p class="my-0">1 day</p>
                            </div>
                            <div>
                                <h5 class="fw-bold text-white">Price</h5>
                                <p class="my-0">tent 2-person IDR 150k</p>
                                <p class="my-0">tent 4-person IDR 250k</p>
                                <p class="my-0">1 day</p>
                            </div>
                        </div>

                        <div class="col-md-4 col-12 align-items-center">
                            <div class="d-flex gap-2">
                                <img class="my-auto" src="{{ Vite::asset('resources/images/calendar.png') }}" width="30"
                                    height="30">
                                <h5 class="fw-bold text-dark my-auto">Show Availaibility</h5>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                    class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
                                    <title>Ready To Book</title>
                                    <path
                                        d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708" />
                                </svg>
                            </div>
                            <form action="{{ Route('bookingCamping') }}">
                                <div class="d-flex gap-2 mt-1">
                                    <div>
                                        <label for="checkin" class="form-label fw-semibold">Check in Date</label>
                                        <input type="date" class="form-control border-success" id="checkin" required>
                                    </div>
                                    <div>
                                        <label for="checkout" class="form-label fw-semibold">Check out Date</label>
                                        <input type="date" class="form-control border-success" id="checkout" required>
                                    </div>
                                </div>
                        </div>

                        <div class="col justify-content-center align-item-center d-flex my-auto">
                            <button type="submit" class="btn btn-lg text-light fw-semibold rounded-4 mb-0"
                                style="background-color:#114A06;">Booking</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection