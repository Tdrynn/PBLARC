@extends('layouts.app')

@section('content')
    @include('layouts.navbar.navbar_learnMore')

    <div class="row">
        <div id="campervan" class="text-light LearnMore py-4 shadow-lg p-3">
            <div class="container-fluid px-0">
                <h1 class="text-center fw-bold text-dark mt-5">Campervan</h1>

                <div class="carousel-wrapper mx-auto">

                    <div id="mainCarousel" class="carousel slide mb-3" data-bs-ride="false">
                        <div class="carousel-inner rounded-4">

                            <div class="carousel-item active">
                                <img src="{{ Vite::asset('resources/images/CV1.jpg') }}" class="d-block w-100 main-img"
                                    alt="Picnic 1">
                            </div>

                            <div class="carousel-item">
                                <img src="{{ Vite::asset('resources/images/CV2.png') }}" class="d-block w-100 main-img"
                                    alt="Picnic 2">
                            </div>

                            <div class="carousel-item">
                                <img src="{{ Vite::asset('resources/images/CV3.png') }}" class="d-block w-100 main-img"
                                    alt="Picnic 3">
                            </div>

                            <div class="carousel-item">
                                <img src="{{ Vite::asset('resources/images/CV4.jpg') }}" class="d-block w-100 main-img"
                                    alt="Picnic 4">
                            </div>

                            <div class="carousel-item">
                                <img src="{{ Vite::asset('resources/images/CV5.jpg') }}" class="d-block w-100 main-img"
                                    alt="Picnic 5">
                            </div>

                        </div>

                        <!-- Controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>

                    <!-- Thumbnails -->
                    <div class="d-flex justify-content-center gap-2 thumbnail-wrapper mt-2">

                        <img src="{{ Vite::asset('resources/images/CV1.jpg') }}" class="thumbnail active-thumb"
                            data-bs-target="#mainCarousel" data-bs-slide-to="0">

                        <img src="{{ Vite::asset('resources/images/CV2.png') }}" class="thumbnail"
                            data-bs-target="#mainCarousel" data-bs-slide-to="1">

                        <img src="{{ Vite::asset('resources/images/CV3.png') }}" class="thumbnail"
                            data-bs-target="#mainCarousel" data-bs-slide-to="2">

                        <img src="{{ Vite::asset('resources/images/CV4.jpg') }}" class="thumbnail"
                            data-bs-target="#mainCarousel" data-bs-slide-to="3">

                        <img src="{{ Vite::asset('resources/images/CV5.jpg') }}" class="thumbnail"
                            data-bs-target="#mainCarousel" data-bs-slide-to="4">
                    </div>

                </div>
            </div>
        </div>

        <div style="background-color: #4f9e84;">
            <div class="my-3 bg-white rounded-4 shadow-sm p-2 mx-auto" style="width: 90%;">
                <div class="my-2">
                    <div class="row mx-auto" style="width: 95%;">
                        <div class="col-md-3 p-0 my-auto">
                            <h4 class="fw-bold text-dark">Facility & Price</h4>
                        </div>
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
                            <img src="{{ Vite::asset('resources/images/electrical.png') }}" alt="electrical"
                                class="img-fluid" width="40px">
                            <p class="fs-5 fw-semibold text-dark">Electrical Socket</p>
                        </div>
                        <div class="col-md-2 col-3 d-flex align-items-center gap-2">
                            <img src="{{ Vite::asset('resources/images/sink.png') }}" alt="sink" class="img-fluid"
                                width="40px">
                            <p class="fs-5 fw-semibold text-dark">Wash Basin</p>
                        </div>
                    </div>

                    <div class="d-flex align-item-center justify-content-center">
                        <hr class="border border-dark opacity-75" style="width: 95%;">
                    </div>

                    <div class="container" style="width: 95%;">
                        <div class="row">
                            <div class="col-md-6 col-12" style="width: 50%">
                                <h6 class="fw-semibold fs-5">1 Van (Max 4-person)
                                    <p class="my-0 fs-6 fw-normal">IDR 150k / Day</p>
                                </h6>
                            </div>

                            <div class="col-md-4 mx-auto col-12 align-item-center">
                                <div class="d-flex gap-2">
                                    <img class="my-auto" src="{{ Vite::asset('resources/images/calendar.png') }}" width="25"
                                        height="25">
                                    <h5 class="fw-bold text-dark my-auto">Show Availaibility</h5>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                        class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
                                        <title>Ready To Book</title>
                                        <path
                                            d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708" />
                                    </svg>
                                </div>
                                <form action="{{ Route('bookingCampervan') }}">
                                    <div class="d-flex gap-2 mt-1">
                                        <div class="col-6">
                                            <label for="checkin" class="form-label fw-semibold">Check in Date</label>
                                            <input type="date" class="form-control border-success" id="checkin" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="checkout" class="form-label fw-semibold">Check out Date</label>
                                            <input type="date" class="form-control border-success" id="checkout" required>
                                        </div>
                                    </div>
                            </div>

                            <div class="col justify-content-center align-item-center d-flex my-auto">
                                <button class="btn btn-lg text-light fw-semibold rounded-4 me-3 mb-0"
                                    style="background-color:#114A06;">Booking</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection