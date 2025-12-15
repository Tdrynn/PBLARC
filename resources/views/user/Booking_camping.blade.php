@extends('layouts.app')

@section('content')
    @php $currentStep = 1; @endphp

    @include('layouts.navbar.navbar_camping')
    <div class="row">
        <div class="Booking">

            @include('layouts.progressBar')

            {{-- Form Booking --}}
            <div class="d-flex flex-column mx-auto mt-3 mb-5 rounded-5 form-booking">
                <div class="mt-4">
                    <p class="text-success mb-0 text-center">Fill in the details below to make a reservation.</p>
                </div>

                <div class="w-75 justify-content-center align-items-center mx-auto mt-0">
                    <form action="{{ route('booking.store', $package->id) }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="name" class="form-label fw-semibold">Reservation Name</label>
                            <input type="text" class="form-control border-success" id="name" name="name" required>
                        </div>

                        <div class="mb-2">
                            <label for="telephone" class="form-label  fw-semibold">WhatsApp Number</label>
                            <input type="tel" class="form-control border-success" id="telephone" name="telephone" required>
                        </div>

                        <div class="mb-2">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control border-success" id="email" name="email"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="mb-2 container p-0">
                            <div class="row">
                                <div class="col">
                                    <label for="participants" class="form-label fw-semibold">Number of
                                        participants</label>
                                    <input type="number" class="form-control border-success w-50" id="participants"
                                        name="participants" min="1" required>
                                </div>

                                <div class="col flex-column">
                                    <label for="tent" class="form-label fw-semibold">Tent</label>
                                    <input type="number" class="form-control border-success w-75" id="tent" name="tent"
                                        min="1" required>
                                </div>

                                <div class="col">

                                </div>
                            </div>
                        </div>

                        <div class="mb-2 container p-0">
                            <div class="row">
                                <div class="col">
                                    <label for="checkin" class="form-label fw-semibold">Check in Date</label>
                                    <input type="date" class="form-control border-success w-75" id="checkin" name="checkin"
                                        required>
                                </div>

                                <div class="col">
                                    <label for="checkout" class="form-label fw-semibold">Check out Date</label>
                                    <input type="date" class="form-control border-success w-75" id="checkout"
                                        name="checkout" required>
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

                        <div class="fs-5 fw-semibold">
                            Price Summary <br>
                            <span id="priceSummary">IDR 0</span>
                        </div>

                        <div class="d-flex gap-3 my-4 align-items-end justify-content-end">
                            <button type="cancel" class="btn btn-danger btn-lg" data-bs-toggle="modal"
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
        const PACKAGE_PRICE = {{ $package->price }};
    </script>

    <script>
        const tentInput = document.getElementById('tent');
        const checkinInput = document.getElementById('checkin');
        const checkoutInput = document.getElementById('checkout');
        const priceSummary = document.getElementById('priceSummary');

        function calculateDays() {
            if (!checkinInput.value || !checkoutInput.value) return 0;

            const checkin = new Date(checkinInput.value);
            const checkout = new Date(checkoutInput.value);

            const diffTime = checkout - checkin;
            const diffDays = diffTime / (1000 * 60 * 60 * 24);

            return diffDays > 0 ? diffDays : 0;
        }

        function formatRupiah(number) {
            return 'IDR ' + number.toLocaleString('id-ID');
        }

        function updatePrice() {
            const days = calculateDays();
            const tentQty = parseInt(tentInput.value) || 0;

            if (days === 0 || tentQty === 0) {
                priceSummary.innerText = 'IDR 0';
                return;
            }

            const total = PACKAGE_PRICE * tentQty * days;
            priceSummary.innerText = formatRupiah(total);
        }

        // Trigger realtime
        tentInput.addEventListener('input', updatePrice);
        checkinInput.addEventListener('change', updatePrice);
        checkoutInput.addEventListener('change', updatePrice);
    </script>

@endsection