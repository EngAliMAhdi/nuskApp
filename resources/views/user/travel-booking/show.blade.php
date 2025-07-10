@extends('layouts.user')
@section('content')
<div class="max-w-6xl p-6 mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-800">{{ __('menu.travel_booking_details') }} #{{ $travelBooking->id }}</h2>
        <a href="{{ route('user.travel-booking.index') }}" 
           class="px-4 py-2 text-sm font-medium text-gray-600 border border-gray-300 rounded hover:bg-gray-50">
            {{ __('menu.back_to_bookings') }}
        </a>
    </div>

    @if(session('success'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 border border-green-400 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="p-4 mb-4 text-red-700 bg-red-100 border border-red-400 rounded">
            {{ session('error') }}
        </div>
    @endif

    <!-- Booking Status -->
    <div class="p-6 bg-white border shadow-lg rounded-xl">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-700">{{ __('menu.booking_status') }}</h3>
            <span class="px-3 py-1 text-sm font-medium rounded-full
                @if($travelBooking->status == 'pending') bg-yellow-100 text-yellow-800
                @elseif($travelBooking->status == 'processing') bg-blue-100 text-blue-800
                @elseif($travelBooking->status == 'completed') bg-green-100 text-green-800
                @else bg-red-100 text-red-800
                @endif">
                @if($travelBooking->status == 'pending') {{ __('menu.pending') }}
                @elseif($travelBooking->status == 'processing') {{ __('menu.processing') }}
                @elseif($travelBooking->status == 'completed') {{ __('menu.completed') }}
                @else {{ __('menu.cancelled') }}
                @endif
            </span>
        </div>
    </div>

    <!-- Travel Details -->
    <div class="p-6 bg-white border shadow-lg rounded-xl">
        <h3 class="mb-4 text-lg font-semibold text-gray-700">{{ __('menu.booking_information') }}</h3>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div>
                <p class="text-sm font-medium text-gray-500">{{ __('menu.country') }}</p>
                <p class="text-gray-900">{{ $travelBooking->country }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">{{ __('menu.city') }}</p>
                <p class="text-gray-900">{{ $travelBooking->city }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">{{ __('menu.reservation_date') }}</p>
                <p class="text-gray-900">{{ $travelBooking->reservation_date }}</p>
            </div>
        </div>
    </div>

    <!-- Transport Details -->
    <div class="p-6 bg-white border shadow-lg rounded-xl">
        <h3 class="mb-4 text-lg font-semibold text-gray-700">{{ __('menu.transport_information') }}</h3>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <h4 class="mb-3 text-md font-medium text-gray-700">{{ __('menu.transport_to_mecca') }}</h4>
                <div class="space-y-2">
                    <p class="text-sm">
                        <span class="font-medium text-gray-500">{{ __('menu.transport_type') }}:</span>
                        @if($travelBooking->transport_type_to_mecca == 'bari') {{ __('menu.land_transport') }}
                        @else {{ __('menu.air_transport') }}
                        @endif
                    </p>
                    @if($travelBooking->transport_type_to_mecca == 'bari' && $travelBooking->transportFromAirport)
                        <p class="text-sm">
                            <span class="font-medium text-gray-500">{{ __('menu.transport_vehicle') }}:</span>
                            {{ $travelBooking->transportFromAirport->name }}
                        </p>
                    @elseif($travelBooking->transport_type_to_mecca == 'jawi' && $travelBooking->airTransportFromAirport)
                        <p class="text-sm">
                            <span class="font-medium text-gray-500">{{ __('menu.airplane') }}:</span>
                            {{ $travelBooking->airTransportFromAirport->airplane }}
                        </p>
                        <p class="text-sm">
                            <span class="font-medium text-gray-500">{{ __('menu.flight_number') }}:</span>
                            {{ $travelBooking->airTransportFromAirport->flight_number }}
                        </p>
                    @endif
                </div>
            </div>
            <div>
                <h4 class="mb-3 text-md font-medium text-gray-700">{{ __('menu.transport_to_madina') }}</h4>
                <div class="space-y-2">
                    <p class="text-sm">
                        <span class="font-medium text-gray-500">{{ __('menu.transport_type') }}:</span>
                        @if($travelBooking->transport_type_to_madina == 'bari') {{ __('menu.land_transport') }}
                        @else {{ __('menu.air_transport') }}
                        @endif
                    </p>
                    @if($travelBooking->transport_type_to_madina == 'bari' && $travelBooking->transportToMadina)
                        <p class="text-sm">
                            <span class="font-medium text-gray-500">{{ __('menu.transport_vehicle') }}:</span>
                            {{ $travelBooking->transportToMadina->name }}
                        </p>
                    @elseif($travelBooking->transport_type_to_madina == 'jawi' && $travelBooking->airTransportToMadina)
                        <p class="text-sm">
                            <span class="font-medium text-gray-500">{{ __('menu.airplane') }}:</span>
                            {{ $travelBooking->airTransportToMadina->airplane }}
                        </p>
                        <p class="text-sm">
                            <span class="font-medium text-gray-500">{{ __('menu.flight_number') }}:</span>
                            {{ $travelBooking->airTransportToMadina->flight_number }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Hotel Details -->
    <div class="p-6 bg-white border shadow-lg rounded-xl">
        <h3 class="mb-4 text-lg font-semibold text-gray-700">{{ __('menu.hotel_information') }}</h3>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <h4 class="mb-3 text-md font-medium text-gray-700">{{ __('menu.mecca_hotel') }}</h4>
                @if($travelBooking->hotelInMecca)
                    <p class="text-gray-900">{{ $travelBooking->hotelInMecca->name }}</p>
                @else
                    <p class="text-gray-500">{{ __('menu.no_hotel_selected') }}</p>
                @endif
            </div>
            <div>
                <h4 class="mb-3 text-md font-medium text-gray-700">{{ __('menu.madina_hotel') }}</h4>
                @if($travelBooking->hotelInMadina)
                    <p class="text-gray-900">{{ $travelBooking->hotelInMadina->name }}</p>
                @else
                    <p class="text-gray-500">{{ __('menu.no_hotel_selected') }}</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Passengers Details -->
    <div class="p-6 bg-white border shadow-lg rounded-xl">
        <h3 class="mb-4 text-lg font-semibold text-gray-700">{{ __('menu.passenger_details') }}</h3>
        <div class="grid gap-4">
            @foreach($travelBooking->passengers as $passenger)
                <div class="p-4 bg-gray-50 border rounded-lg">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        <div>
                            <p class="text-sm font-medium text-gray-500">{{ __('menu.first_name') }}</p>
                            <p class="text-gray-900">{{ $passenger->first_name }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">{{ __('menu.last_name') }}</p>
                            <p class="text-gray-900">{{ $passenger->last_name }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">{{ __('menu.dob') }}</p>
                            <p class="text-gray-900">{{ $passenger->birth_date }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">{{ __('menu.nationality') }}</p>
                            <p class="text-gray-900">{{ $passenger->nationality }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">{{ __('menu.national_id') }}</p>
                            <p class="text-gray-900">{{ $passenger->national_id }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">{{ __('menu.passenger_price') }}</p>
                            <p class="text-green-600 font-semibold">{{ $passenger->price }} {{ __('menu.rs') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Payment Details -->
    <div class="p-6 bg-white border shadow-lg rounded-xl">
        <h3 class="mb-4 text-lg font-semibold text-gray-700">{{ __('menu.payment_status') }}</h3>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div>
                <p class="text-sm font-medium text-gray-500">{{ __('menu.method_paid') }}</p>
                <p class="text-gray-900">
                    @if($travelBooking->method_paid == 'cash') {{ __('menu.cash_payment') }}
                    @else {{ __('menu.credit_card_payment') }}
                    @endif
                </p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">{{ __('menu.payment_status') }}</p>
                <p class="text-gray-900">{{ $travelBooking->payment_status }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">{{ __('menu.total_amount') }}</p>
                <p class="text-green-600 font-semibold text-lg">{{ $travelBooking->total_price }} {{ __('menu.rs') }}</p>
            </div>
        </div>
    </div>

    <!-- Actions -->
    @if($travelBooking->status == 'pending')
        <div class="p-6 bg-white border shadow-lg rounded-xl">
            <h3 class="mb-4 text-lg font-semibold text-gray-700">{{ __('menu.control') }}</h3>
            <form action="{{ route('user.travel-booking.cancel', $travelBooking->id) }}" method="POST" class="inline">
                @csrf
                @method('PATCH')
                <button type="submit" 
                        class="px-4 py-2 font-medium text-red-600 border border-red-600 rounded hover:bg-red-50"
                        onclick="return confirm('{{ __('menu.confirm_cancel_booking') }}')">
                    {{ __('menu.cancel_travel_booking') }}
                </button>
            </form>
        </div>
    @endif
</div>
@endsection

@section('script')
@endsection 