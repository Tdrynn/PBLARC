@extends('layouts.app')

@section('content')

    @php $currentStep = 2; @endphp

    @include('layouts.navbar.navbar_back')
    <div class="row">
        <div class="Payment">
            @include('layouts.progressBar')
            <script src="https://app.sandbox.midtrans.com/snap/snap.js"
                data-client-key="{{ config('services.midtrans.clientKey') }}">
                </script>
            <button id="pay-button" class="btn btn-success btn-lg">
                Pay Now
            </button>
        </div>
    </div>
    <script>
        document.getElementById('pay-button').addEventListener('click', function () {

            const button = this;
            button.disabled = true;
            button.innerText = 'Processing...';

            fetch("{{ route('payment.snap', $booking->id) }}", {
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
                        button.disabled = false;
                        button.innerText = 'Pay Now';
                        return;
                    }

                    snap.pay(data.snap_token, {

                        onSuccess: function (result) {
                            window.location.href = "{{ route('payment.success', $booking->id) }}";
                        },

                        onPending: function (result) {
                            window.location.href = "{{ route('payment.pending', $booking->id) }}";
                        },

                        onError: function (result) {
                            alert('Pembayaran gagal');
                            button.disabled = false;
                            button.innerText = 'Pay Now';
                        },

                        onClose: function () {
                            button.disabled = false;
                            button.innerText = 'Pay Now';
                        }

                    });
                })
                .catch(() => {
                    alert('Server error');
                    button.disabled = false;
                    button.innerText = 'Pay Now';
                });

        });
    </script>
@endsection