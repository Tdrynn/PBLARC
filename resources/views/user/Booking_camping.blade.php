@extends('layouts.app')

@section('content')
    @include('layouts.navbar.navbar_camping')
    <div class="row">
        <div class="Booking">

            {{-- Progress Bar --}}
            <div class="container d-flex justify-content-center mt-5">
                <div class="p-4 rounded-4 d-flex align-items-center justify-content-center gap-1 mb-3"
                    style="background-color: #FFFFFF; width: 280px; height: 65px;">

                    {{-- STEP 1 --}}
                    <div class="text-center">
                        <div class="step-circle fw-bold fs-4">1</div>
                        <div class="fw-medium">Booking</div>
                    </div>

                    {{-- ARROW 1 --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="400" height="100" class="bi bi-arrow-right mb-4"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg>

                    {{-- STEP 2 --}}
                    <div class="text-center">
                        <div class="step-circle fw-bold fs-4">2</div>
                        <div class="fw-medium">Payment</div>
                    </div>

                    {{-- ARROW 2 --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="400" height="100" class="bi bi-arrow-right mb-4"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.146-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg>

                    {{-- STEP 3 --}}
                    <div class="text-center">
                        <div class="step-circle fw-bold fs-4">3</div>
                        <div class="fw-medium">Invoice</div>
                    </div>

                </div>
            </div>
            {{-- Progress Bar --}}

            {{-- Form Booking --}}
            <div class="d-flex flex-column mx-auto mt-3 mb-5 rounded-5"
                style="background-color: #FFFFFF; width: 60%; height: auto;">
                <div class="mt-4">
                    <p class="text-success mb-0 text-center">Fill in the details below to make a reservation.</p>
                </div>

                <div class="w-75 justify-content-center align-items-center mx-auto mt-0">
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
                                <div class="col">
                                    <label for="participants" class="form-label fw-semibold">Number of participants</label>
                                    <input type="number" class="form-control border-success w-50" id="participants">
                                </div>

                                <div class="col flex-column">
                                    <label for="tent" class="form-label fw-semibold">Tent</label>
                                    <input type="number" class="form-control border-success w-75" id="tent">
                                </div>

                                <div class="col">

                                </div>
                            </div>
                        </div>

                        <div class="mb-2 container p-0">
                            <div class="row">
                                <div class="col">
                                    <label for="checkin" class="form-label fw-semibold">Check in Date</label>
                                    <input type="date" class="form-control border-success w-75" id="checkin">
                                </div>

                                <div class="col">
                                    <label for="checkout" class="form-label fw-semibold">Check out Date</label>
                                    <input type="date" class="form-control border-success w-75" id="checkout">
                                </div>

                                <div class="col">
                                </div>
                            </div>
                        </div>

                        <p class="text-success text-center my-2">Make sure all the data you enter is correct before
                            continuing.</p>

                        <div class="container p-0">
                            <div class="justify-content-start d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                    class="bi bi-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                </svg>
                                <p class="fs-5 fw-semibold">Add-ons (optional)</p>
                            </div>

                            <p class="text-success text-center my-1">Enter the amount if you want to rent, leave it blank if
                                you don't want to rent.</p>

                            <div class="row">
                                <div class="col gap-1 d-flex align-items-center">
                                    <p class="fw-semibold my-2 addon-label">Flysheet 3x3 <br> <small>IDR-25K</small></p>
                                    <input type="number" class="form-control border-success addon-input" id="flysheet" min="0">
                                </div>

                                <div class="col gap-1 d-flex align-items-center">
                                    <p class="fw-semibold my-2 addon-label">Small Stove <br> <small>IDR-10K</small></p>
                                    <input type="number" class="form-control border-success addon-input" id="SmallStove" min="0">
                                </div>

                                <div class="col gap-1 d-flex align-items-center">
                                    <p class="fw-semibold my-2 addon-label">Regular Mat <br> <small>IDR-10K</small></p>
                                    <input type="number" class="form-control border-success addon-input" id="RegularMat" min="0">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col gap-1 d-flex align-items-center">
                                    <p class="fw-semibold my-2 addon-label">Portable Stove <br> <small>IDR-15K</small></p>
                                    <input type="number" class="form-control border-success addon-input" id="PortableStove" min="0">
                                </div>

                                <div class="col gap-1 d-flex align-items-center">
                                    <p class="fw-semibold my-2 addon-label">Sleeping Bag <br> <small>IDR-15K</small></p>
                                    <input type="number" class="form-control border-success addon-input" id="SleepingBag" min="0">
                                </div>

                                <div class="col gap-1 d-flex align-items-center">
                                    <p class="fw-semibold my-2 addon-label">Grill Pan <br> <small>IDR-15K</small></p>
                                    <input type="number" class="form-control border-success addon-input" id="GrillPan" min="0">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col gap-1 d-flex align-items-center">
                                    <p class="fw-semibold my-2 addon-label">Folding Chair<br> <small>IDR-15K</small></p>
                                    <input type="number" class="form-control border-success addon-input" id="FoldingChair" min="0">
                                </div>

                                <div class="col gap-1 d-flex align-items-center">
                                    <p class="fw-semibold my-2 addon-label">Nesting<br> <small>IDR-15K</small></p>
                                    <input type="number" class="form-control border-success addon-input" id="Nesting" min="0">
                                </div>

                                <div class="col gap-1 d-flex align-items-center">
                                    <p class="fw-semibold my-2 addon-label">Folding Table<br> <small>IDR-20K</small></p>
                                    <input type="number" class="form-control border-success addon-input" id="FoldingTable" min="0">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col gap-1 d-flex align-items-center">
                                    <p class="fw-semibold my-2 addon-label">Tent Lamp<br> <small>IDR-10K</small></p>
                                    <input type="number" class="form-control border-success addon-input" id="Tent Lamp" min="0">
                                </div>

                                <div class="col gap-1 d-flex align-items-center">
                                    <p class="fw-semibold my-2 addon-label">Hammock<br> <small>IDR-15K</small></p>
                                    <input type="number" class="form-control border-success addon-input" id="Hammock" min="0">
                                </div>

                                <div class="col gap-1 d-flex align-items-center">
                                    <p class="fw-semibold my-2 addon-label">Portable Gas<br> <small>IDR-30K</small></p>
                                    <input type="number" class="form-control border-success addon-input" id="PortableGas" min="0">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-item-center justify-content-center">
                            <hr class="border border-dark opacity-50 mt-1 mb-3" style="width: 100%;">
                        </div>

                        <div>
                            <p class="fs-5 fw-semibold">Price Summary <br> IDR XX.XXX,XX</p>
                        </div>

                        <div class="d-flex gap-3 my-4 align-items-end justify-content-end">
                            <button type="cancel" class="btn btn-danger btn-lg" data-bs-toggle="modal" data-bs-target="#cancelModal">Cancel</button>
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