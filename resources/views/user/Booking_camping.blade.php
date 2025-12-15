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

                    <form>
                        <div class="mb-2">
                            <label for="name" class="form-label fw-semibold">Reservation Name</label>
                            <input type="text" class="form-control border-success" id="name" required>
                        </div>

                        <div class="mb-2">
                            <label for="telephone" class="form-label  fw-semibold">WhatsApp Number</label>
                            <input type="tel" class="form-control border-success" id="telephone" required>
                        </div>

                        <div class="mb-2">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control border-success" id="email" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-2 container p-0">
                            <div class="row">
                                <div class="col col-4">
                                    <label for="checkin" class="form-label fw-semibold">Check in Date</label>
                                    <input type="date" class="form-control border-success" id="checkin">
                                </div>

                                <div class="col col-4">
                                    <label for="checkout" class="form-label fw-semibold">Check out Date</label>
                                    <input type="date" class="form-control border-success" id="checkout">
                                </div>

                                <div class="col">
                                </div>
                            </div>
                        </div>

                        <div class="mb-2 container p-0">
                            <div class="row">
                                <div class="col col-4">
                                    <label for="participants" class="form-label fw-semibold">Participants</label>
                                    <input type="number" class="form-control border-success w-75" id="participants">
                                </div>

                                <div class="col col-6">
                                    <label for="participants" class="form-label fw-semibold">Select Tent</label>
                                    <select class="form-select border-success" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">Bring Own Tent</option>
                                        <option value="2">Rent Tent 2 Person (IDR. 150.000,00)</option>
                                        <option value="3">Rent Tent 4 Person (IDR. 250.000,00)</option>
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
                                                data-input="amountTent">
                                                −
                                            </button>

                                            <input type="number" id="amountTent"
                                                class="form-control form-control-sm text-center" value="0" min="1"
                                                style="width: 60px;" required>

                                            <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                                                data-input="amountTent">
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
                            <p class="fs-5 fw-semibold">Price Summary <br> IDR XX.XXX,XX</p>
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
@endsection