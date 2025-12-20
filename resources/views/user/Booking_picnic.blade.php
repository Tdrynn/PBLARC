@extends('layouts.app')

@section('content')
    @php $currentStep = 1; @endphp

    @include('layouts.navbar.navbar_picnic')
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
                        <input type="hidden" name="checkout" value="{{ old('checkin') }}">
                        <div class="mb-2">
                            <label for="name" class="form-label fw-semibold">Reservation Name</label>
                            <input type="text" class="form-control border-success" id="name" name="name"
                                value="{{ auth()->user()->name }}" required>
                        </div>

                        <div class="mb-2">
                            <label for="telephone" class="form-label fw-semibold">WhatsApp Number</label>
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
                                    <input type="date" class="form-control border-success w-75" id="checkin" name="checkin"
                                        value="{{ session('booking.checkin') }}" readonly>
                                </div>

                                <input type="hidden" name="checkin" value="{{ session('booking.checkin') }}">

                                <div class="col">

                                </div>

                                <div class="col">
                                </div>
                            </div>
                        </div>

                        <div class="mb-2 container p-0">
                            <div class="row">
                                <div class="col col-4 my-auto">
                                    <label for="adult" class="form-label fw-semibold">Adult</label>
                                    <input type="number" class="form-control border-success w-75" name="adult_qty" required>
                                </div>

                                <div class="col col-4 my-auto">
                                    <label for="child" class="form-label fw-semibold">Child (Above 5 y.o)</label>
                                    <input type="number" class="form-control border-success w-75" name="child_qty" required>
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
                            <button type="cancel" class="btn btn-danger btn-lg" data-bs-toggle="modal"
                                data-bs-target="#cancelModal">Cancel</button>
                            <button type="submit" class="btn btn-success btn-lg">Submit</button>
                        </div>
                    </form>
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
                    <form action="{{ route('picnic') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger px-4">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const priceTotal = document.getElementById('priceTotal');
            const form = document.querySelector('form');

            function formatIDR(value) {
                return 'IDR ' + value.toLocaleString('id-ID');
            }

            async function updatePrice() {

                const formData = new FormData(form);

                const response = await fetch("{{ route('booking.calculatePrice') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                });

                const data = await response.json();
                priceTotal.innerText = formatIDR(data.total);
            }

            /* Trigger realtime */
            form.querySelectorAll('input, select').forEach(el => {
                el.addEventListener('input', updatePrice);
                el.addEventListener('change', updatePrice);
            });

        });
    </script>

@endsection