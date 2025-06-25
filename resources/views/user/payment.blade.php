@extends('layouts.user')
@section('css')
    <script
        src="https://www.paypal.com/sdk/js?client-id=AV8Q2UdVVjaiEv22zVVP3zV4e3etBJdVhV2HjzFJWzVwkqXaWUX6b6tsReM7snYneMVhzKMAIfW6Y_M9&currency=USD">
    </script>
@endsection
@section('content')
    <section class="container flex flex-col items-center justify-center p-6 mx-auto">
        <div class="w-full p-6 mx-auto bg-white rounded-2xl shadow-xl md:w-1/2 border border-gray-200">
            <h2 class="mb-6 text-3xl font-bold text-center text-gray-800">الدفع</h2>

            <div class="flex items-center justify-center mb-6">
                <div class="bg-green-100 text-green-800 text-3xl font-extrabold rounded-xl px-6 py-4 shadow-inner">
                    {{ number_format($booking->total_price, 2) }} <span class="text-lg font-medium">ج.م</span>
                </div>
            </div>
            <div class="flex justify-center">
                <div id="paypal-button-container" class="relative  z-10"></div>
            </div>
        </div>

    </section>
@endsection
@section('script')
    <script>
        let bookingId = {{ $booking->id }};

        paypal.Buttons({
            createOrder: function(data, actions) {
                return fetch("{{ route('paypal.process') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            booking_id: bookingId,

                        })
                    }).then(response => response.json())
                    .then(order => order.id);
            },
            onApprove: function(data, actions) {
                return fetch("{{ route('paypal.capture') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            orderID: data.orderID,
                            booking_id: bookingId,
                        })
                    }).then(response => response.json())
                    .then(orderData => {
                        alert('success');

                    });
            }
        }).render('#paypal-button-container');
    </script>
@endsection
