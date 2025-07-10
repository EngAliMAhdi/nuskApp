@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        {{ __('menu.travel_bookings') }}</a>
@endsection
@section('main_title_content')
 {{ __('menu.travel_bookings') }}
@endsection
@section('title_content')
 {{ __('menu.control') }}
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="mb-4 card">
            <div class="pb-0 card-header">
                <h6>{{ __('menu.travel_bookings') }}</h6>
            </div>
            <div class="px-0 pt-0 pb-2 card-body">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ __('menu.username') }}</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{ __('menu.country') }}</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{ __('menu.city') }}</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{ __('menu.reservation_date') }}</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{ __('menu.passengers_count') }}</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{ __('menu.total_amount') }}</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{ __('menu.booking_status') }}</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{ __('menu.payment_status') }}</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{ __('menu.control') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($travelBookings as $booking)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $booking->user->username }}</h6>
                                            <p class="text-xs text-secondary mb-0">{{ $booking->user->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $booking->country }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $booking->city }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $booking->reservation_date }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $booking->passengers->count() }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $booking->total_price }} {{ __('menu.rs') }}</p>
                                </td>
                                <td>
                                    <span class="badge badge-sm bg-gradient-{{ $booking->status == 'pending' ? 'warning' : ($booking->status == 'processing' ? 'info' : ($booking->status == 'completed' ? 'success' : 'danger')) }}">
                                        @if($booking->status == 'pending') {{ __('menu.pending') }}
                                        @elseif($booking->status == 'processing') {{ __('menu.processing') }}
                                        @elseif($booking->status == 'completed') {{ __('menu.completed') }}
                                        @else {{ __('menu.cancelled') }}
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-sm bg-gradient-{{ $booking->payment_status == 'paid' ? 'success' : 'warning' }}">
                                        {{ $booking->payment_status == 'paid' ? __('menu.paid') : __('menu.unpaid') }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.travel-booking.show', $booking->id) }}" class="btn btn-link text-secondary mb-0">
                                        <i class="fa fa-eye text-xs me-2"></i>{{ __('menu.view_details') }}
                                    </a>
                                    <form action="{{ route('admin.travel-booking.destroy', $booking->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger mb-0" onclick="return confirm('{{ __('menu.confirm_delete_booking') }}')">
                                            <i class="fa fa-trash text-xs me-2"></i>{{ __('menu.remove') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    {{ $travelBookings->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection 