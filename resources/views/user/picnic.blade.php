@extends('layouts.app')

@section('content')
    @include('layouts.navbar.navbar_package')

    <div class="row">
        <div id="picnic" class="text-light learnMore py-4">
            <div class="container-fluid px-0 my-1 mt-2 mb-4">
                <h1 class="text-center fw-bold">Picnic</h1>

                <div class="row gx-0 border border-dark">
                    <div class="col-lg-6 col-md-6 col-12 d-flex justify-content-center">
                        <img src="{{ Vite::asset('resources/images/PN1.png') }}" alt="picnic" class="img-fluid rounded-4">
                    </div>

                    <div class="col-lg-6 col-md-6 col-12 d-flex align-items-center flex-wrap gap-2">
                        <img src="{{ Vite::asset('resources/images/PN2.png') }}" alt="picnic"
                            class="rounded-4 object-fit-cover" width="300px" height="170px">
                        <img src="{{ Vite::asset('resources/images/PN3.png') }}" alt="picnic"
                            class="rounded-4 object-fit-cover" width="300px" height="170px">
                        <img src="{{ Vite::asset('resources/images/PN4.png') }}" alt="picnic"
                            class="rounded-4 object-fit-cover" width="300px" height="170px">
                        <img src="{{ Vite::asset('resources/images/PN5.png') }}" alt="picnic"
                            class="rounded-4 object-fit-cover" width="300px" height="170px">
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <div class=" mx-5 text-start mb-0">
                    <h4 class="fw-bold text-start text-dark ms-4 mt-2">Facility</h4>
                </div>
                <div class="d-flex flex-wrap gap-4 justify-content-center">
                    <div class="d-flex align-items-center gap-2">
                        <img src="{{ Vite::asset('resources/images/toilet.png') }}" alt="toilet" class="img-fluid" width="40px">
                        <p class="fs-5 text-dark fw-semibold">Toilet</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <img src="{{ Vite::asset('resources/images/parking.png') }}" alt="parking" class="img-fluid" width="40px"
                        >
                        <p class="fs-5 text-dark fw-semibold">Parking</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <img src="{{ Vite::asset('resources/images/electrical.png') }}" alt="electrical" class="img-fluid" width="40px"
                        >
                        <p class="fs-5 text-dark fw-semibold">Electrical Socket</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <img src="{{ Vite::asset('resources/images/sink.png') }}" alt="sink" class="img-fluid" width="40px">
                        <p class="fs-5 text-dark fw-semibold">Wash Basin</p>
                    </div>
                </div>

                <div class="d-flex align-item-center justify-content-center">
                    <hr class="border border-dark opacity-75 mt-1 mb-3" style="width: 90%;">
                </div>

                <div class="container bg-white  text-dark rounded-4 p-3 shadow-sm">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <h5 class="fw-bold">Price</h5>

                        </div>

                        <div class="col d-flex justify-content-end align-items-center gap-2 p-1 me-3">
                            <img src="{{ Vite::asset('resources/images/calendar.png') }}" width="25">
                            <p class="fw-bold fs-5 text-dark my-1">Show Availaibility</p>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col ms-3">
                            <p class="my-0">IDR 15k /person(adult)</p>
                            <p class="my-0">IDR 10k/child(above 5 years old)</p>
                        </div>

                        <div class="col d-flex justify-content-end align-items-end">
                            <button class="btn text-light fw-semibold rounded-4 me-3 mb-0"
                                style="background-color:#114A06; width:90px; height:40px;">Booking</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection