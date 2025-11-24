@extends('layouts.app')

@section('content')
    @include('layouts.navbar.navbar_package')

    <div class="row">
        <div id="GroupEvent" class="text-light learnMore py-4">
            <div class="container-fluid px-0 my-1 mt-2 mb-4">
                <h1 class="text-center fw-bold">Group Event</h1>

                <div class="row gx-0 justify-content-center align-items-start">
                    <div class="col-md-6 d-flex justify-content-end pe-1">
                        <img src="{{ Vite::asset('resources/images/GE1.png') }}" alt="GroupEvent"
                            class="rounded-4 object-fit-cover" width="525px" height="364px">
                    </div>

                    <div class="col-md-6 ps-1">
                        <div class="d-flex flex-wrap gap-1">
                            <img src="{{ Vite::asset('resources/images/GE2.png') }}" alt="GroupEvent"
                                class="rounded-4 object-fit-cover" width="300px" height="180px">
                            <img src="{{ Vite::asset('resources/images/GE3.png') }}" alt="GroupEvent"
                                class="rounded-4 object-fit-cover" width="300px" height="180px">
                            <img src="{{ Vite::asset('resources/images/GE4.png') }}" alt="GroupEvent"
                                class="rounded-4 object-fit-cover" width="300px" height="180px">
                            <img src="{{ Vite::asset('resources/images/GE5.png') }}" alt="GroupEvent"
                                class="rounded-4 object-fit-cover" width="300px" height="180px">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <div class=" mx-5 text-start mb-0">
                    <h4 class="fw-bold text-start text-dark ms-4 mt-2">Facility</h4>
                </div>
                <div class="d-flex flex-row gap-5 align-items-center justify-content-center my-0">
                    <div class="form-check d-flex align-items-center gap-2 p-2">
                        <img src="{{ Vite::asset('resources/images/toilet.png') }}" alt="toilet" width="40px" height="40px">
                        <p class="fs-5 text-dark fw-semibold">Toilet</p>
                    </div>
                    <div class="form-check d-flex align-items-center gap-2 p-2">
                        <img src="{{ Vite::asset('resources/images/parking.png') }}" alt="parking" width="40px"
                            height="40px">
                        <p class="fs-5 text-dark fw-semibold">Parking</p>
                    </div>
                    <div class="form-check d-flex align-items-center gap-2 p-2">
                        <img src="{{ Vite::asset('resources/images/electrical.png') }}" alt="electrical" width="40px"
                            height="40px">
                        <p class="fs-5 text-dark fw-semibold">Electrical Socket</p>
                    </div>
                    <div class="form-check d-flex align-items-center gap-2 p-2">
                        <img src="{{ Vite::asset('resources/images/sink.png') }}" alt="sink" width="40px" height="40px">
                        <p class="fs-5 text-dark fw-semibold">Wash Basin</p>
                    </div>
                </div>

                <div class="d-flex align-item-center justify-content-center">
                    <hr class="border border-dark opacity-75 mt-1 mb-3" style="width: 90%;">
                </div>

                <div class="container text-dark rounded-4" style="background-color:#fff; width:90%; padding:8px 0;">
                    <div class="row p-0 m-0">
                        <div class="col p-1 ms-3">
                            <p class="fw-bold fs-5 text-dark my-1 ms-0">price</p>
                        </div>

                        <div class="col d-flex justify-content-end align-items-center gap-2 p-1 me-3">
                            <img src="{{ Vite::asset('resources/images/calendar.png') }}" width="25">
                            <p class="fw-bold fs-5 text-dark my-1">Show Availaibility</p>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col ms-3">
                            <p class="my-0">IDR 15k /Event</p>
                        </div>

                        <div class="col d-flex justify-content-end align-items-end">
                            <button class="btn text-light fw-semibold rounded-4 me-3 mb-0" style="background-color:#114A06; width:90px; height:40px;">Booking</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection