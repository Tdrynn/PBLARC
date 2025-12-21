@extends('layouts.app')

@section('content')
    @include('layouts.navbar.navbar_learnMore')

    <div class="row">
        <div id="camping" class="text-light LearnMore py-4 shadow-lg p-3">
            <div class="container-fluid px-0">
                <h1 class="text-center fw-bold text-dark mt-5">Camping</h1>

                <div class="carousel-wrapper mx-auto">

                    <div id="mainCarousel" class="carousel slide mb-3" data-bs-ride="false">
                        <div class="carousel-inner rounded-4">

                            @foreach ($images as $index => $image)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $image->image) }}" class="d-block w-100 main-img"
                                        alt="{{ $image->title ?? 'Camping Image' }}">
                                </div>
                            @endforeach

                        </div>

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
                        @foreach ($images as $index => $image)
                            <img src="{{ asset('storage/' . $image->image) }}"
                                class="thumbnail {{ $index === 0 ? 'active-thumb' : '' }}" data-bs-target="#mainCarousel"
                                data-bs-slide-to="{{ $index }}">
                        @endforeach
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
                            <div class="col-md-6 col-12 d-flex justify-content-start gap-3">
                                <div>
                                    <h6 class="fw-semibold fs-6">Own Tent
                                        <p class="fw-normal my-0 fs-6">(weekdays) <br> IDR 25K / day</p>
                                        <p class="fw-normal my-0 fs-6">(weekend) <br> IDR 35K / day</p>
                                    </h6>
                                </div>
                                <div>
                                    <h6 class="fw-semibold fs-6">Rent Tent 2
                                        <p class="fw-normal my-0 fs-6 ">(weekdays / Weekend) <br> IDR 150k / Day</p>
                                    </h6>
                                </div>
                                <div>
                                    <h6 class="fw-semibold">Rent Tent 4
                                        <p class="fw-normal my-0 fs-6 "> (weekdays / Weekend) <br> IDR 250k / Day</p>
                                    </h6>
                                </div>
                            </div>

                        <div class="col-md-4 col-12 align-items-center">
                            <div class="d-flex gap-2">
                                <img class="my-auto" src="{{ Vite::asset('resources/images/calendar.png') }}" width="30"
                                    height="30">
                                <h5 class="fw-bold text-dark my-auto">Show Availaibility</h5>
                                <div>
                                    <span id="availabilityIcon" class="d-none"></span>
                                </div>
                            </div>
                            <form action="{{ route('bookingCamping') }}" method="GET">
                                <input type="hidden" name="checkin" id="hiddenCheckin">
                                <input type="hidden" name="checkout" id="hiddenCheckout">
                                <input type="hidden" id="package_id" value="{{ $package->id }}">
                                <div class="d-flex gap-2 mt-1">
                                    <div>
                                        <label for="checkin" class="form-label fw-semibold">Check in Date</label>
                                        <input type="date" class="form-control border-success" id="checkin" name="checkin"
                                            required>
                                    </div>
                                    <div>
                                        <label for="checkout" class="form-label fw-semibold">Check out Date</label>
                                        <input type="date" class="form-control border-success" id="checkout" name="checkout"
                                            required>
                                    </div>
                                </div>
                                <form action="{{ Route('bookingCamping') }}">
                                    <div class="d-flex gap-2 mt-1">
                                        <div class="col-6">
                                            <label for="checkin" class="form-label fw-semibold">Check in Date</label>
                                            <input type="date" class="form-control border-success" id="checkin"
                                                required>
                                        </div>
                                        <div class="col-6">
                                            <label for="checkout" class="form-label fw-semibold">Check out Date</label>
                                            <input type="date" class="form-control border-success" id="checkout"
                                                required>
                                        </div>
                                    </div>
                            </div>

                        <div class="col justify-content-center align-item-center d-flex my-auto">
                            <button id="bookingBtn" type="submit" class="btn btn-lg text-light fw-semibold rounded-4 mt-3"
                                style="background-color:#114A06;" disabled>
                                Booking
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {

                const checkinInput = document.getElementById('checkin');
                const checkoutInput = document.getElementById('checkout');
                const bookingBtn = document.getElementById('bookingBtn');
                const iconWrapper = document.getElementById('availabilityIcon');

                if (!checkinInput || !checkoutInput || !bookingBtn || !iconWrapper) {
                    console.error('Element tidak ditemukan');
                    return;
                }

                async function checkAvailability() {
                    const checkin = checkinInput.value;
                    const checkout = checkoutInput.value;

                    if (!checkin || !checkout) {
                        iconWrapper.classList.add('d-none');
                        bookingBtn.disabled = true;
                        return;
                    }

                    const response = await fetch("{{ route('check.availability') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            package_id: {{ $package->id }},
                            checkin: checkin,
                            checkout: checkout
                        })
                    });

                    const data = await response.json();

                    iconWrapper.classList.remove('d-none');

                    if (data.available) {
                        iconWrapper.innerHTML = greenCheckSvg();
                        bookingBtn.disabled = false;

                        document.getElementById('hiddenCheckin').value = checkin;
                        document.getElementById('hiddenCheckout').value = checkout;

                    } else {
                        iconWrapper.innerHTML = redCrossSvg();
                        bookingBtn.disabled = true;
                    }

                }

                checkinInput.addEventListener('change', checkAvailability);
                checkoutInput.addEventListener('change', checkAvailability);

                function greenCheckSvg() {
                    return `
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
                                <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708" />
                            </svg>`;
                }

                function redCrossSvg() {
                    return `
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-x-circle-fill text-danger" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                            </svg>`;
                }

            });
        </script>
@endsection
