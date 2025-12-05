<div class="container d-flex justify-content-center mt-5">
    <div class="p-4 rounded-4 d-flex align-items-center justify-content-center gap-1 my-3"
        style="background-color: #FFFFFF; width: 280px; height: 65px;">

        <div class="fw-semibold text-center">
            <div class="step-circle {{ $currentStep >= 1 ? 'active' : '' }}">1</div>
            <div class="step-label {{ $currentStep >= 1 ? 'active-text' : '' }}">Booking</div>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" width="280px" height="65px"
            class="bi bi-arrow-right arrow {{ $currentStep > 1 ? 'active-arrow' : '' }}" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
        </svg>

        <div class="fw-semibold text-center">
            <div class="step-circle {{ $currentStep >= 2 ? 'active' : '' }}">2</div>
            <div class="step-label {{ $currentStep >= 2 ? 'active-text' : '' }}">Payment</div>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" width="280px" height="65px"
            class="bi bi-arrow-right arrow {{ $currentStep > 2 ? 'active-arrow' : '' }}" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
        </svg>

        <div class="fw-semibold text-center">
            <div class="step-circle {{ $currentStep >= 3 ? 'active' : '' }}">3</div>
            <div class="step-label {{ $currentStep >= 3 ? 'active-text' : '' }}">Invoice</div>
        </div>
    </div>
</div>