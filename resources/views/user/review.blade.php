@extends('layouts.app')

@section('content')
@include('layouts.navbar.navbar_back_history')

<div class="row min-vh-100 d-flex justify-content-center align-items-center">
    <section id="review" class="Booking">
        <div class="rounded-5 bg-white w-75 w-md-75 w-lg-50 p-4 position-fixed top-50 start-50 translate-middle">

            <h3 class="fw-bold fs-2">Leave a Review</h3>

            <hr class="border border-dark opacity-75">

            <form action="" class="mt-3">
                <label class="form-label fw-semibold fs-2">Rate</label>

                <div class="d-flex gap-4 simple-rating justify-content-center"
                    style="cursor:pointer; user-select:none;">

                    <!-- BINTANG -->
                    @for($i = 1; $i <= 5; $i++)
                    <svg class="star" data-value="{{ $i }}" xmlns="http://www.w3.org/2000/svg"
                         width="80" height="80" fill="none" viewBox="-2 -2 20 20">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 
                            6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 
                            0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 
                            3.356.83 4.73c.078.443-.36.79-.746.592L8 
                            13.187l-4.389 2.256z"/>
                    </svg>
                    @endfor
                </div>

                <input type="hidden" id="ratingValue" name="rating">

                <div class="mt-4">
                    <label class="form-label fw-semibold fs-2">Review</label>
                    <textarea class="form-control border-success fs-4" rows="5" name="review"></textarea>
                </div>

                <div class="d-flex gap-3 mt-4 justify-content-end">
                    <button type="button" class="btn btn-danger btn-lg" data-bs-toggle="modal"
                        data-bs-target="#cancelModal">Cancel</button>

                    <button type="submit" class="btn btn-success btn-lg">Submit</button>
                </div>

                <p class="text-center mt-3">
                    Thank you very much for taking the time to provide this review. We look forward to welcoming you back in the future.
                </p>

                <script>
                    const stars = document.querySelectorAll(".simple-rating .star");
                    const ratingInput = document.getElementById("ratingValue");

                    stars.forEach((star) => {
                        star.addEventListener("click", function () {
                            const value = this.dataset.value;
                            ratingInput.value = value;

                            stars.forEach(s => s.classList.remove("filled"));

                            for (let i = 0; i < value; i++) {
                                stars[i].classList.add("filled");
                            }
                        });
                    });
                </script>
            </form>
        </div>
    </section>
</div>

<!-- MODAL -->
<div class="modal fade" id="cancelModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">

            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">Are you sure?</h5>
            </div>

            <div class="modal-footer d-flex justify-content-center border-0">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">No</button>

                <form action="{{ route('history') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger px-4">Yes</button>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
