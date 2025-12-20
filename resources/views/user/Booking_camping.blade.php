@extends('layouts.app')

@section('content')
    @php $currentStep = 1; @endphp

    @include('layouts.navbar.navbar_camping')
    <div class="row">
        <div class="Booking">

            @include('layouts.progressBar')

            {{-- Form Booking --}}
            <div class="d-flex flex-column mx-auto mt-3 mb-5 rounded-5 form-booking">

                <div class="justify-content-center align-items-center mx-auto mt-0" style="width: 85%">

                    <p class="mt-4 text-success mb-0 text-center">Fill in the details below to make a reservation.</p>

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
                            <input type="email" class="form-control border-success" id="email"
                                value="{{ auth()->user()->email }}" name="email" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-2 container p-0">
                            <div class="row">
                                <div class="col col-4">
                                    <label for="checkin" class="form-label fw-semibold">Check in Date</label>
                                    <input type="date" class="form-control border-success" id="checkin" name="checkin"
                                        value="{{ session('booking.checkin') }}" readonly>
                                </div>

                                <div class="col col-4">
                                    <label for="checkout" class="form-label fw-semibold">Check out Date</label>
                                    <input type="date" class="form-control border-success" id="checkout" name="checkout"
                                        value="{{ session('booking.checkout') }}" readonly>
                                </div>

                                <input type="hidden" name="checkin" value="{{ session('booking.checkin') }}">
                                <input type="hidden" name="checkout" value="{{ session('booking.checkout') }}">

                                <div class="col">
                                </div>
                            </div>
                        </div>

                        <div class="mb-2 container p-0">
                            <div class="row">
                                <div class="col col-4">
                                    <label for="participants" class="form-label fw-semibold">Participants</label>
                                    <input type="number" class="form-control border-success w-75" id="participants"
                                        name="participants">
                                </div>

                                <div class="col col-6">
                                    <label for="participants" class="form-label fw-semibold">Select Tent</label>
                                    <select name="tent_type" id="tent_type" class="form-select border-success"
                                        aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="bring_own">Bring Own Tent</option>
                                        <option value="tent_2p">Rent Tent 2 Person (IDR. 150.000,00)</option>
                                        <option value="tent_4p">Rent Tent 4 Person (IDR. 250.000,00)</option>
                                    </select>
                                </div>

                                <div class="col col-4">

                                </div>
                            </div>
                        </div>

                        <div class="mb-2 container p-0">
                            <div class="row">
                                <div class="col col-4 w-50">
                                    <div class="justify-content-start align-items-start">
                                        <h6 class="fw-semibold mb-1 w-100">Amount of Tent</h6>

                                        <div class="d-flex gap-2 mt-2">
                                            <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                                                data-target="tent_qty">
                                                −
                                            </button>

                                            <input type="number" name="tent_qty" id="tent_qty"
                                                class="form-control form-control-sm text-center" value="1" min="1"
                                                style="width: 60px;" required>

                                            <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                                                data-target="tent_qty">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
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

    <div class="modal fade" id="capacityModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Capacity Exceeded</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p id="capacityMessage"></p>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-success" data-bs-dismiss="modal">
                        OK
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Cancel -->
    <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-header border-0">
                    <h5 class="modal-title w-100 fw-bold" id="logoutModalLabel">Are you sure?</h5>
                </div>
                <div class="modal-footer d-flex justify-content-center border-0">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">No</button>
                    <form action="{{ route('camping') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger px-4">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            /* =====================================================
             * ELEMENTS
             * ===================================================== */
            const form = document.querySelector('form');
            const participants = document.getElementById('participants');
            const tentType = document.getElementById('tent_type');
            const tentQty = document.getElementById('tent_qty');
            const priceTotalEl = document.getElementById('priceTotal');

            const addonInputs = document.querySelectorAll('.addon-input');

            /* =====================================================
             * MODAL CAPACITY
             * ===================================================== */
            const modalEl = document.getElementById('capacityModal');
            const modal = new bootstrap.Modal(modalEl);
            const msg = document.getElementById('capacityMessage');

            /* =====================================================
             * CAPACITY RULE
             * ===================================================== */
            function tentCapacity(type) {
                if (type === 'tent_2p') return 2;
                if (type === 'tent_4p') return 4;
                return 0;
            }

            function validateCapacity(showModal = false) {
                const p = parseInt(participants.value || 0);
                const q = parseInt(tentQty.value || 1);
                const t = tentType.value;

                if (!p || !t || t === 'bring_own') return true;

                const totalCapacity = tentCapacity(t) * q;

                if (p > totalCapacity) {
                    if (showModal) {
                        msg.innerHTML = `
                                    Participants: <b>${p}</b><br>
                                    Tent Capacity: <b>${totalCapacity}</b><br><br>
                                    Please add more tents or change tent type.
                                `;
                        modal.show();
                    }
                    return false;
                }

                return true;
            }

            /* =====================================================
             * PRICE RULE
             * ===================================================== */
            function tentPrice(type) {
                if (type === 'tent_2p') return 150000;
                if (type === 'tent_4p') return 250000;
                return 0;
            }

            function formatIDR(num) {
                return 'IDR ' + num.toLocaleString('id-ID');
            }

            /* =====================================================
             * PRICE CALCULATOR
             * ===================================================== */
            function updatePriceSummary() {
                let total = 0;

                // 🏕️ TENT
                const type = tentType.value;
                const qty = parseInt(tentQty.value || 0);
                total += tentPrice(type) * qty;

                // ➕ ADDONS
                addonInputs.forEach(input => {
                    const qty = parseInt(input.value || 0);
                    const price = parseInt(input.dataset.price || 0);
                    total += qty * price;
                });

                priceTotalEl.innerText = 'IDR ' + total.toLocaleString('id-ID');
            }

            /* =====================================================
             * EVENTS — VALIDATION
             * ===================================================== */
            form.addEventListener('submit', function (e) {
                if (!validateCapacity(true)) {
                    e.preventDefault();
                }
            });

            participants.addEventListener('input', () => validateCapacity(false));
            tentType.addEventListener('change', () => validateCapacity(false));
            tentQty.addEventListener('input', () => validateCapacity(false));

            /* =====================================================
             * EVENTS — PRICE SUMMARY
             * ===================================================== */
            tentType.addEventListener('change', updatePriceSummary);
            tentQty.addEventListener('input', updatePriceSummary);

            addonInputs.forEach(input => {
                input.addEventListener('input', updatePriceSummary);
                input.addEventListener('change', updatePriceSummary);
            });

            /* =====================================================
             * INIT
             * ===================================================== */
            updatePriceSummary();

        });
    </script>


@endsection