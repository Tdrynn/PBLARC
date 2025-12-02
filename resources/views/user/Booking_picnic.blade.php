@extends('layouts.app')

@section('content')
    @include('layouts.navbar.navbar_back')
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
                            <label for="telephone" class="form-label fw-semibold">WhatsApp Number</label>
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
                                    <input type="number" class="form-control border-success w-50" id="participants" required>
                                </div>

                                <div class="col flex-column">
                                    <label for="adult" class="form-label fw-semibold">Adult</label>
                                    <input type="number" class="form-control border-success w-50" id="adult">
                                </div>

                                <div class="col flex-column ">
                                    <label for="child" class="form-label fw-semibold">Child (Above 5 y.o)</label>
                                    <input type="number" class="form-control border-success w-50" id="child">
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

                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                <div class="col">
                                    <div class="p-3 text-center">
                                        <h6 class="fw-semibold mb-1">Flysheet 3x3</h6>
                                        <p class="text-muted mb-2">IDR 25K</p>

                                        <div class="d-flex justify-content-center align-items-center gap-2 mt-2">
                                            <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                                                data-input="flysheet">−</button>
                                            <input type="number" id="flysheet"
                                                class="form-control form-control-sm text-center" value="0" min="0"
                                                style="width: 60px;">
                                            <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                                                data-input="flysheet">+</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="p-3 text-center">
                                        <h6 class="fw-semibold mb-1">Small Stove</h6>
                                        <p class="text-muted mb-2">IDR-10K</p>

                                        <div class="d-flex justify-content-center align-items-center gap-2 mt-2">
                                            <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                                                data-input="smallStove">−</button>
                                            <input type="number" id="smallStove"
                                                class="form-control form-control-sm text-center" value="0" min="0"
                                                style="width: 60px;">
                                            <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                                                data-input="smallStove">+</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="p-3 text-center">
                                        <h6 class="fw-semibold mb-1">Regular Mat</h6>
                                        <p class="text-muted mb-2">IDR-10K</p>

                                        <div class="d-flex justify-content-center align-items-center gap-2 mt-2">
                                            <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                                                data-input="regularMat">−</button>
                                            <input type="number" id="regularMat"
                                                class="form-control form-control-sm text-center" value="0" min="0"
                                                style="width: 60px;">
                                            <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                                                data-input="regularMat">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="p-3 text-center">
                                        <h6 class="fw-semibold mb-1">Portable Stove</h6>
                                        <p class="text-muted mb-2">IDR-15K</p>

                                        <div class="d-flex justify-content-center align-items-center gap-2 mt-2">
                                            <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                                                data-input="portableStove">−</button>
                                            <input type="number" id="portableStove"
                                                class="form-control form-control-sm text-center" value="0" min="0"
                                                style="width: 60px;">
                                            <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                                                data-input="portableStove">+</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="p-3 text-center">
                                        <h6 class="fw-semibold mb-1">Sleeping Bag</h6>
                                        <p class="text-muted mb-2">IDR-15K</p>

                                        <div class="d-flex justify-content-center align-items-center gap-2 mt-2">
                                            <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                                                data-input="sleepingBag">−</button>
                                            <input type="number" id="sleepingBag"
                                                class="form-control form-control-sm text-center" value="0" min="0"
                                                style="width: 60px;">
                                            <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                                                data-input="sleepingBag">+</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="p-3 text-center">
                                        <h6 class="fw-semibold mb-1">Grill Pan</h6>
                                        <p class="text-muted mb-2">IDR-15K</p>

                                        <div class="d-flex justify-content-center align-items-center gap-2 mt-2">
                                            <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                                                data-input="grillPan">−</button>
                                            <input type="number" id="grillPan"
                                                class="form-control form-control-sm text-center" value="0" min="0"
                                                style="width: 60px;">
                                            <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                                                data-input="grillPan">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="p-3 text-center">
                                        <h6 class="fw-semibold mb-1">Folding Chair</h6>
                                        <p class="text-muted mb-2">IDR-15K</p>

                                        <div class="d-flex justify-content-center align-items-center gap-2 mt-2">
                                            <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                                                data-input="foldingChair">−</button>
                                            <input type="number" id="foldingChair"
                                                class="form-control form-control-sm text-center" value="0" min="0"
                                                style="width: 60px;">
                                            <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                                                data-input="foldingChair">+</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="p-3 text-center">
                                        <h6 class="fw-semibold mb-1">Nesting</h6>
                                        <p class="text-muted mb-2">IDR-15K</p>

                                        <div class="d-flex justify-content-center align-items-center gap-2 mt-2">
                                            <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                                                data-input="Nesting">−</button>
                                            <input type="number" id="Nesting"
                                                class="form-control form-control-sm text-center" value="0" min="0"
                                                style="width: 60px;">
                                            <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                                                data-input="Nesting">+</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="p-3 text-center">
                                        <h6 class="fw-semibold mb-1">Folding Table</h6>
                                        <p class="text-muted mb-2">IDR-20K</p>

                                        <div class="d-flex justify-content-center align-items-center gap-2 mt-2">
                                            <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                                                data-input="foldingTable">−</button>
                                            <input type="number" id="foldingTable"
                                                class="form-control form-control-sm text-center" value="0" min="0"
                                                style="width: 60px;">
                                            <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                                                data-input="foldingTable">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="p-3 text-center">
                                        <h6 class="fw-semibold mb-1">Tent Lamp</h6>
                                        <p class="text-muted mb-2">IDR-10K</p>

                                        <div class="d-flex justify-content-center align-items-center gap-2 mt-2">
                                            <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                                                data-input="tentLamp">−</button>
                                            <input type="number" id="tentLamp"
                                                class="form-control form-control-sm text-center" value="0" min="0"
                                                style="width: 60px;">
                                            <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                                                data-input="tentLamp">+</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="p-3 text-center">
                                        <h6 class="fw-semibold mb-1">Hammock</h6>
                                        <p class="text-muted mb-2">IDR-15K</p>

                                        <div class="d-flex justify-content-center align-items-center gap-2 mt-2">
                                            <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                                                data-input="hammock">−</button>
                                            <input type="number" id="hammock"
                                                class="form-control form-control-sm text-center" value="0" min="0"
                                                style="width: 60px;">
                                            <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                                                data-input="hammock">+</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="p-3 text-center">
                                        <h6 class="fw-semibold mb-1">Portable Gas</h6>
                                        <p class="text-muted mb-2">IDR-30K</p>

                                        <div class="d-flex justify-content-center align-items-center gap-2 mt-2">
                                            <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                                                data-input="portableGas">−</button>
                                            <input type="number" id="portableGas"
                                                class="form-control form-control-sm text-center" value="0" min="0"
                                                style="width: 60px;">
                                            <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                                                data-input="portableGas">+</button>
                                        </div>
                                    </div>
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

    {{-- Scrip Button (+ / -) --}}
    <script>
        document.querySelectorAll('.plus-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const input = document.getElementById(this.dataset.input);
                input.value = parseInt(input.value) + 1;
            });
        });

        document.querySelectorAll('.minus-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const input = document.getElementById(this.dataset.input);
                input.value = Math.max(0, parseInt(input.value) - 1);
            });
        });
    </script>
@endsection