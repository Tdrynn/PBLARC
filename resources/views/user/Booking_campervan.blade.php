@extends('layouts.app')

@section('content')
    @php $currentStep = 1; @endphp

    @include('layouts.navbar.navbar_camperVan')
    <div class="row">
        <div class="Booking">

            @include('layouts.progressBar')

            {{-- Form Booking --}}
            <div class="d-flex flex-column mx-auto mt-3 mb-5 rounded-5 booking-form">
                <div class="justify-content-center align-items-center mx-auto mt-0" style="width: 85%">
                    <p class="text-success mb-0 text-center mt-4">Fill in the details below to make a reservation.</p>
                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="package_id" value="{{ $package->id }}">
                        <div class="mb-2">
                            <label for="name" class="form-label fw-semibold">Reservation Name</label>
                            <input type="text" class="form-control border-success" id="name" name="name"
                                value="{{ auth()->user()->name }}" required>
                        </div>

                        <div class="mb-2">
                            <label for="telephone" class="form-label  fw-semibold">WhatsApp Number</label>
                            <input type="tel" class="form-control border-success" id="telephone" name="telephone"
                                value="{{ auth()->user()->phone }}" required>
                        </div>

                        <div class="mb-2">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control border-success" id="email" name="email"
                                value="{{ auth()->user()->email }}" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-2 container p-0">
                            <div class="row">
                                <div class="col col-6">
                                    <label for="checkin" class="form-label fw-semibold">Check in Date</label>
                                    <input type="date" class="form-control border-success w-50" id="checkin" name="checkin"
                                        value="{{ session('booking.checkin') }}" readonly>
                                </div>

                                <div class="col col-6">
                                    <label for="checkout" class="form-label fw-semibold">Check out Date</label>
                                    <input type="date" class="form-control border-success w-50" id="checkout"
                                        name="checkout" value="{{ session('booking.checkout') }}" readonly>
                                </div>

                                <input type="hidden" name="checkin" value="{{ session('booking.checkin') }}">
                                <input type="hidden" name="checkout" value="{{ session('booking.checkout') }}">

                                <div class="col">
                                </div>
                            </div>
                        </div>

                        <div class="mb-2 container p-0">
                            <div class="row">
                                <div class="col">
                                    <label for="van" class="form-label fw-semibold">Number of Van</label>
                                    <input type="number" class="form-control border-success" id="van_qty" name="van_qty"
                                        min="1" required>
                                </div>
                                <div class="col">
                                    <label for="participants" class="form-label fw-semibold">Number of participants</label>
                                    <input type="number" class="form-control border-success" id="participants"
                                        name="participants" min="1" required>
                                </div>
                            </div>
                        </div>

                        <p class="text-success text-center my-2">Make sure all the data you enter is correct before
                            continuing.</p>

                        @include('layouts.addOns')

                        <div class="d-flex align-item-center justify-content-center">
                            <hr class="border border-dark opacity-50 mt-1 mb-3" style="width: 100%;">
                        </div>

                        <div>
                            <p class="fs-5 fw-semibold">Price Summary</p>
                            <p class="fw-bold fs-5">
                                Total: <span id="priceTotal">IDR 0</span>
                            </p>
                        </div>

                        <div class="d-flex gap-3 my-4 align-items-end justify-content-end">
                            <button type="button" class="btn btn-danger btn-lg" data-bs-toggle="modal"
                                data-bs-target="#cancelModal">Cancel</button>
                            <button type="submit" class="btn btn-success btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- Form Booking --}}
        </div>
    </div>

    <!-- Modal Cancel -->
    <div class="modal fade" id="cancelModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-header border-0">
                    <h5 class="modal-title w-100 fw-bold">Are you sure?</h5>
                </div>
                <div class="modal-footer d-flex justify-content-center border-0">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                        No
                    </button>

                    <a href="{{ route('camperVan') }}" class="btn btn-danger px-4">
                        Yes
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const vanQty = document.getElementById('van_qty');
            const participants = document.getElementById('participants');
            const priceTotalEl = document.getElementById('priceTotal');
            const addonInputs = document.querySelectorAll('.addon-input');

            const checkinInput = document.querySelector('input[name="checkin"]');
            const checkoutInput = document.querySelector('input[name="checkout"]');

            // ===============================
            // DATA DARI BACKEND (BLADE)
            // ===============================
            const VAN_PRICE = {{ $vanPrice }};
            const EXTRA_PERSON_PRICE = {{ $extraPersonPrice }};
            const VAN_CAPACITY = 4;

            // ===============================
            // FORMAT RUPIAH
            // ===============================
            function formatIDR(num) {
                return 'IDR ' + num.toLocaleString('id-ID');
            }

            // ===============================
            // HITUNG JUMLAH HARI (SAMA BACKEND)
            // ===============================
            function getTotalDays() {
                const checkin = new Date(checkinInput.value);
                const checkout = new Date(checkoutInput.value);

                if (isNaN(checkin) || isNaN(checkout)) return 0;

                const diffTime = checkout - checkin;
                const diffDays = diffTime / (1000 * 60 * 60 * 24);

                return diffDays > 0 ? diffDays : 0;
            }

            // ===============================
            // HITUNG TOTAL HARGA
            // ===============================
            function updatePriceSummary() {
                let dailyTotal = 0;

                const van = Number(vanQty.value);
                const people = Number(participants.value);
                const days = getTotalDays();

                if (van < 1 || people < 1 || days < 1) {
                    priceTotalEl.innerText = formatIDR(0);
                    return;
                }

                // === Harga van per hari ===
                dailyTotal += van * VAN_PRICE;

                // === Extra person per hari ===
                const maxCapacity = van * VAN_CAPACITY;
                if (people > maxCapacity) {
                    dailyTotal += (people - maxCapacity) * EXTRA_PERSON_PRICE;
                }

                // === Addons per hari ===
                addonInputs.forEach(input => {
                    const qty = Number(input.value) || 0;
                    const price = Number(input.dataset.price) || 0;
                    dailyTotal += qty * price;
                });

                // === TOTAL AKHIR (SAMA DENGAN BACKEND & MIDTRANS) ===
                const total = dailyTotal * days;

                priceTotalEl.innerText = formatIDR(total);
            }

            // ===============================
            // EVENT LISTENERS
            // ===============================
            vanQty.addEventListener('input', updatePriceSummary);
            participants.addEventListener('input', updatePriceSummary);

            addonInputs.forEach(input => {
                input.addEventListener('input', updatePriceSummary);
            });

            // kalau suatu saat readonly dihilangkan
            if (checkinInput && checkoutInput) {
                checkinInput.addEventListener('change', updatePriceSummary);
                checkoutInput.addEventListener('change', updatePriceSummary);
            }

            // ===============================
            // INIT
            // ===============================
            updatePriceSummary();

        });
    </script>


@endsection