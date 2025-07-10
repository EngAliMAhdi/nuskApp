@extends('layouts.user')
@section('content')
<div class="max-w-6xl p-6 mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-800">{{ __('menu.travel_bookings') }}</h2>
        <a href="{{ route('user.travel-booking.create') }}" 
           class="px-4 py-2 font-semibold text-white transition bg-green-600 rounded-lg shadow hover:bg-green-700">
            {{ __('menu.new_travel_booking') }}
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

    @if($travelBookings->count() > 0)
        <div class="grid gap-6">
            @foreach($travelBookings as $booking)
                <div class="p-6 bg-white border shadow-lg rounded-xl">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-700">
                            {{ __('menu.travel_booking_number') }}: #{{ $booking->id }}
                        </h3>
                        <span class="px-3 py-1 text-sm font-medium rounded-full
                            @if($booking->status == 'pending') bg-yellow-100 text-yellow-800
                            @elseif($booking->status == 'processing') bg-blue-100 text-blue-800
                            @elseif($booking->status == 'completed') bg-green-100 text-green-800
                            @else bg-red-100 text-red-800
                            @endif">
                            {{ __('menu.'.$booking->status) }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        <div>
                            <p class="text-sm font-medium text-gray-500">{{ __('menu.country') }}</p>
                            <p class="text-gray-900">{{ $booking->country }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">{{ __('menu.city') }}</p>
                            <p class="text-gray-900">{{ $booking->city }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">{{ __('menu.reservation_date') }}</p>
                            <p class="text-gray-900">{{ $booking->reservation_date }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">{{ __('menu.passengers_count') }}</p>
                            <p class="text-gray-900">{{ $booking->passengers->count() }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">{{ __('menu.total_amount') }}</p>
                            <p class="text-green-600 font-semibold">{{ $booking->total_price }} {{ __('menu.rs') }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">{{ __('menu.method_paid') }}</p>
                            <p class="text-gray-900">
                                @if($booking->method_paid == 'cash') {{ __('menu.cash_payment') }}
                                @else {{ __('menu.credit_card_payment') }}
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-4 pt-4 border-t">
                        <a href="{{ route('user.travel-booking.show', $booking->id) }}" 
                           class="px-4 py-2 text-sm font-medium text-blue-600 border border-blue-600 rounded hover:bg-blue-50">
                            {{ __('menu.view_details') }}
                        </a>
                        
                        @if($booking->status == 'pending')
                            <form action="{{ route('user.travel-booking.cancel', $booking->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" 
                                        class="px-4 py-2 text-sm font-medium text-red-600 border border-red-600 rounded hover:bg-red-50"
                                        onclick="return confirm('{{ __('menu.confirm_cancel_booking') }}')">
                                    {{ __('menu.cancel_travel_booking') }}
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="p-8 text-center bg-white border rounded-xl">
            <div class="mb-4 text-gray-400">
                <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h3 class="mb-2 text-lg font-medium text-gray-900">{{ __('menu.no_travel_bookings') }}</h3>
            <p class="text-gray-500">{{ __('menu.no_travel_bookings_message') }}</p>
            <a href="{{ route('user.travel-booking.create') }}" 
               class="inline-block px-4 py-2 mt-4 font-semibold text-white transition bg-green-600 rounded-lg shadow hover:bg-green-700">
                {{ __('menu.book_new_trip') }}
            </a>
        </div>
    @endif
</div>
@endsection

@section('script')
@endsection 