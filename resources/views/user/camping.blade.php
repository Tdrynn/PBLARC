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
                    <div class="col-md-2 d-flex align-items-center gap-2">
                        <img src="{{ Vite::asset('resources/images/toilet.png') }}" alt="toilet" class="img-fluid"
                            width="40px">
                        <p class="fs-5 fw-semibold text-dark">Toilet</p>
                    </div>
                    <div class="col-md-2 d-flex align-items-center gap-2">
                        <img src="{{ Vite::asset('resources/images/parking.png') }}" alt="parking" class="img-fluid"
                            width="40px">
                        <p class="fs-5 fw-semibold text-dark">Parking</p>
                    </div>
                    <div class="col-md-2 d-flex align-items-center gap-2">
                        <img src="{{ Vite::asset('resources/images/electrical.png') }}" alt="electrical" class="img-fluid"
                            width="40px">
                        <p class="fs-5 fw-semibold text-dark">Electrical Socket</p>
                    </div>
                    <div class="col-md-2 d-flex align-items-center gap-2">
                        <img src="{{ Vite::asset('resources/images/sink.png') }}" alt="sink" class="img-fluid" width="40px">
                        <p class="fs-5 fw-semibold text-dark">Wash Basin</p>
                    </div>
                </div>

                <div class="d-flex align-item-center justify-content-center">
                    <hr class="border border-dark opacity-75 mt-1 mb-3" style="width: 90%;">
                </div>

                <div class="container bg-white text-dark rounded-4 p-3 shadow-sm">
                    <div class="row gap-2">
                        <div class="col-md-6 col-12 ms-3 my-auto d-flex gap-3">
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

                        <div class="col align-item-center">
                            <div class="d-flex gap-2">
                                <img class="my-auto" src="{{ Vite::asset('resources/images/calendar.png') }}" width="25"
                                    height="25">
                                <p class="fw-bold fs-5 text-dark me-5 my-auto">Show Availaibility</p>
                                <div id="availabilityStatus" class="ms-5 d-none">
                                    <svg id="availableIcon" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        fill="currentColor" class="text-success d-none" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0z
                             M6.97 10.03a.75.75 0 0 0 1.08.02
                             l3.992-4.99a.75.75 0 1 0-1.16-.96
                             L7.477 8.417 5.383 6.323a.75.75 0 0 0-1.06 1.06
                             l2.647 2.647z" />
                                    </svg>

                                    <svg id="fullIcon" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        fill="currentColor" class="text-danger d-none" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0z
                             M5.354 4.646a.5.5 0 1 0-.708.708
                             L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708
                             L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708
                             L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708
                             L8 7.293 5.354 4.646z" />
                                    </svg>
                                </div>

                            </div>
                            <div class="d-flex gap-3">
                                <div>
                                    <label for="checkin" class="form-label fw-semibold">Check in Date</label>
                                    <input type="date" class="form-control border-success" id="checkin"
                                        onchange="checkAvailability()">
                                </div>
                                <div>
                                    <label for="checkout" class="form-label fw-semibold">Check out Date</label>
                                    <input type="date" class="form-control border-success" id="checkout"
                                        onchange="checkAvailability()">
                                </div>
                            </div>
                        </div>

                        <div class="col justify-content-center align-item-center d-flex my-auto">
                            <button class="btn btn-lg text-light fw-semibold rounded-4 me-3 mb-0" id="bookingButton"
                                disabled style="background-color:#114A06;" onclick="goToBooking()">
                                Booking
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const packageId = 2; // SESUAIKAN
            const checkinInput = document.getElementById('checkin');
            const checkoutInput = document.getElementById('checkout');
            const bookingButton = document.getElementById('bookingButton');

            const availabilityStatus = document.getElementById('availabilityStatus');
            const availableIcon = document.getElementById('availableIcon');
            const fullIcon = document.getElementById('fullIcon');

            function resetStatus() {
                availabilityStatus.classList.add('d-none');
                availableIcon.classList.add('d-none');
                fullIcon.classList.add('d-none');
                bookingButton.disabled = true;
            }

            function checkAvailability() {

                if (!checkinInput.value || !checkoutInput.value) {
                    resetStatus();
                    return;
                }

                fetch(`{{ route('check.availability') }}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    body: JSON.stringify({
                        package_id: packageId,
                        checkin: checkinInput.value,
                        checkout: checkoutInput.value,
                        tent: 1
                    })
                })
                    .then(res => res.json())
                    .then(data => {

                        availabilityStatus.classList.remove('d-none');

                        if (data.available) {
                            availableIcon.classList.remove('d-none');
                            fullIcon.classList.add('d-none');
                            bookingButton.disabled = false;
                        } else {
                            fullIcon.classList.remove('d-none');
                            availableIcon.classList.add('d-none');
                            bookingButton.disabled = true;
                        }
                    })
                    .catch(() => {
                        resetStatus();
                    });
            }

            function goToBooking() {
                const checkin = document.getElementById('checkin').value;
                const checkout = document.getElementById('checkout').value;

                if (!checkin || !checkout) {
                    alert('Pilih tanggal terlebih dahulu');
                    return;
                }

                // SESUAI ROUTE KAMU
                window.location.href =
                    `/booking/camping/${packageId}?checkin=${checkin}&checkout=${checkout}`;
            }
        </script>

@endsection