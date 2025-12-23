@extends('layouts.app')

@section('content')

    @php $currentStep = 2; @endphp

    @include('layouts.navbar.navbar_back')

    <div class="row">
        <div class="Payment">

            @include('layouts.progressBar')

            {{-- MIDTRANS SNAP --}}
            <script src="https://app.sandbox.midtrans.com/snap/snap.js"
                data-client-key="{{ config('services.midtrans.clientKey') }}">
                </script>

            <div class="container mt-4">
                <div class="row d-flex justify-content-center align-items-center gap-4 my-4">
                    <div class="col-lg-6 bg-light rounded-4 mx-2">
                        <div class="p-4">

                            {{-- STATUS --}}
                            <div class="text-center mb-3">
                                <h4 class="text-warning">⏳ Payment Pending</h4>
                                <small class="text-muted">
                                    Please complete your payment to continue
                                </small>
                            </div>

                            {{-- ORDER ID --}}
                            <div class="row border-bottom pb-2 mb-3 border-3">
                                <div class="col">
                                    <p class="text-secondary m-0">Order ID</p>
                                </div>
                                <div class="col text-end">
                                    <p class="fw-semibold m-0">
                                        {{ $booking->order_id }}
                                    </p>
                                </div>
                            </div>

                            {{-- TITLE --}}
                            <p class="text-center fs-5 mb-4">
                                Angklung River Camp, Klungkung Bali
                            </p>

                            {{-- CHECK IN / OUT --}}
                            <div class="row text-center mb-3">
                                <div class="col">
                                    <small class="text-secondary">Check In</small>
                                    <p class="m-0 fw-semibold">
                                        {{ \Carbon\Carbon::parse($booking->checkin)->format('d F Y') }}
                                    </p>
                                </div>

                                <div class="col border-start border-end border-3">
                                    <small class="text-secondary">Check Out</small>
                                    <p class="m-0 fw-semibold">
                                        {{ \Carbon\Carbon::parse($booking->checkout)->format('d F Y') }}
                                    </p>
                                </div>

                                <div class="col">
                                    <small class="text-secondary">Duration</small>
                                    <p class="m-0 fw-semibold">
                                        {{ $duration }} Night
                                    </p>
                                </div>
                            </div>

                            {{-- PACKAGE --}}
                            <div class="row border-top pt-3 mb-3 border-3">
                                <div class="col">
                                    <p class="fw-semibold m-0">Packages Type</p>
                                </div>
                                <div class="col text-end">
                                    <p class="fw-semibold m-0">
                                        {{ ucfirst($package->name) }}
                                    </p>
                                </div>
                            </div>

                            {{-- ADDONS --}}
                            <div class="mb-3">
                                @if($addons->count())
                                    @foreach($addons as $addon)
                                        <div class="d-flex justify-content-between">
                                            <p class="m-0">
                                                {{ $addon->name }}
                                                <small class="text-secondary">
                                                    (x{{ $addon->pivot->quantity }})
                                                </small>
                                            </p>
                                            <p class="m-0">
                                                IDR {{ number_format($addon->price * $addon->pivot->quantity, 0, ',', '.') }}
                                            </p>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-muted">No add-ons</p>
                                @endif
                            </div>

                            <div class="row border-top pt-3 mb-3 border-3" style="border-color:#AFAFAF;">
                                <div class="col">
                                    {{-- <p class="m-0">Package ({{ $duration }} night)</p> --}}
                                    <p class="m-0">Add-ons</p>
                                </div>
                                <div class="col text-end">
                                    {{-- <p class="m-0">
                                        IDR {{ number_format($package->price * $duration, 0, ',', '.') }}
                                    </p> --}}
                                    <p class="m-0">
                                        IDR
                                        {{ number_format($addons->sum(fn($a) => $a->price * $a->pivot->quantity), 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>

                            {{-- TOTAL --}}
                            <div class="row mb-4">
                                <div class="col">
                                    <p class="fw-bold fs-5 m-0">Total Payment</p>
                                </div>
                                <div class="col text-end">
                                    <p class="fw-bold fs-5 m-0">
                                        IDR {{ number_format($booking->total_price, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>

                            {{-- ACTION --}}
                            <div class="d-grid gap-2">
                                <button id="pay-again" class="btn btn-success btn-lg">
                                    Pay Again
                                </button>

                                <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                                    Back to Home
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.clientKey') }}">
        </script>

    <script>
        document.getElementById('pay-again').addEventListener('click', function () {

            const button = this;
            button.disabled = true;
            button.innerText = 'Processing...';

            fetch("{{ route('payment.retry', $booking->id) }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
                .then(res => res.json())
                .then(data => {

                    if (!data.snap_token) {
                        alert('Gagal membuat transaksi');
                        resetButton();
                        return;
                    }

                    snap.pay(data.snap_token, {

                        onSuccess: function () {
                            window.location.href =
                                "{{ route('payment.success', $booking->id) }}";
                        },

                        onPending: function () {
                            window.location.href =
                                "{{ route('payment.pending', $booking->id) }}";
                        },

                        onError: function () {
                            window.location.href =
                                "{{ route('payment.failed', $booking->id) }}";
                        },

                        onClose: function () {
                            // ⛔ PENTING: override example.com
                            window.location.href =
                                "{{ route('payment.pending', $booking->id) }}";
                        }

                    });
                })
                .catch(() => {
                    alert('Server error');
                    resetButton();
                });

            function resetButton() {
                button.disabled = false;
                button.innerText = 'Pay Again';
            }
        });
    </script>

@endsection