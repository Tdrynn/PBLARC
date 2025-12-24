@extends('layouts.app')

@section('content')
    @include('layouts.navbar.navbar_learnMore')

    <div class="row">
        <div id="picnic" class="text-light LearnMore py-4 shadow-lg p-3">
            <div class="container-fluid px-0">
                <h1 class="text-center fw-bold text-dark mt-5">Picnic</h1>
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
                <div class="row ms-2">
                    <div class="col-md-3" style="width: auto;">
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
                    <hr class="border border-dark opacity-75" style="width: 95%;">
                </div>

                <div class="container" style="width: 95%;">
                    <div class="row">
                        <div class="col-md-6 col-12" style="width: 50%">
                            <h6 class="fw-semibold fs-5">Adult
                                <p class="my-0 fs-6 fw-normal">IDR 15K /Person</p>
                            </h6>
                            <h6 class="fw-semibold fs-5">Child (Above 5 Years Old)
                                <p class="my-0 fs-6 fw-normal">IDR 10K /Child</p>
                            </h6>
                        </div>

                        <div class="col-md-4 mx-auto col-12 align-item-center">
                            <div class="d-flex gap-2">
                                <img class="my-auto" src="{{ Vite::asset('resources/images/calendar.png') }}" width="30"
                                    height="30">
                                <h5 class="fw-bold text-dark my-auto">Show Availaibility</h5>
                                <div id="availabilityIcon"></div>
                            </div>
                            <form action="{{ route('bookingPicnic') }}" method="GET" id="availabilityForm">
                                <input type="hidden" id="isAvailable" value="0">
                                <div class="d-flex gap-3 mt-1">
                                    <div>
                                        <label for="checkin" class="form-label fw-semibold">Check in Date</label>
                                        <input type="date" class="form-control border-success" id="checkin" name="checkin"
                                            required>
                                    </div>
                                </div>
                        </div>

                        <div class="col justify-content-end align-item-end d-flex my-auto">
                            <button id="bookingBtn" type="submit"
                                class="btn btn-lg text-light fw-semibold rounded-4 me-3 mb-0"
                                style="background-color:#114A06;" disabled>
                                Booking
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const checkinInput = document.getElementById('checkin');
        const bookingBtn = document.getElementById('bookingBtn');
        const icon = document.getElementById('availabilityIcon');

        const greenCheck = `
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                                                class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
                                                                <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708" />
                                                            </svg>`;

        const redCross = `
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                                            class="bi bi-x-circle-fill text-danger" viewBox="0 0 16 16">
                                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                                                        </svg>`;

        async function checkAvailability() {
            if (!checkinInput.value) {
                icon.innerHTML = '';
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
                    package_id: {{ $package->id ?? 1 }},
                    checkin: checkinInput.value,
                    checkout: checkinInput.value // picnic = 1 hari
                })
            });

            const result = await response.json();

            if (result.available) {
                icon.innerHTML = greenCheck;
                bookingBtn.disabled = false;
            } else {
                icon.innerHTML = redCross;
                bookingBtn.disabled = true;
            }
        }

        checkinInput.addEventListener('change', checkAvailability);
    </script>

@endsection