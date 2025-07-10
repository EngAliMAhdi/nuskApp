<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AirTransports;
use App\Models\Hotel;
use App\Models\Transport;
use App\Models\TravelBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TravelBookingController extends Controller
{
    public function index()
    {
        $travelBookings = TravelBooking::where('user_id', Auth::id())
            ->with(['passengers', 'hotelInMecca', 'hotelInMadina'])
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('user.travel-booking.index', compact('travelBookings'));
    }

    public function create()
    {
        $hotels = Hotel::all();
        $transports = Transport::all();
        $airTransports = AirTransports::all();
        
        return view('user.travel-booking.create', compact('hotels', 'transports', 'airTransports'));
    }

    public function show($id)
    {
        $travelBooking = TravelBooking::where('user_id', Auth::id())
            ->with(['passengers', 'hotelInMecca', 'hotelInMadina', 'transportFromAirport', 'airTransportFromAirport', 'transportToMadina', 'airTransportToMadina'])
            ->findOrFail($id);
        
        return view('user.travel-booking.show', compact('travelBooking'));
    }

    public function cancel($id)
    {
        $travelBooking = TravelBooking::where('user_id', Auth::id())->findOrFail($id);
        
        if ($travelBooking->status == 'cancelled') {
            return redirect()->back()->with('error', 'هذا الحجز تم إلغاؤه بالفعل.');
        }
        
        if ($travelBooking->status != 'pending') {
            return redirect()->back()->with('error', 'لا يمكنك إلغاء هذا الحجز لأنه في حالة غير قابلة للإلغاء.');
        }

        $travelBooking->update(['status' => 'cancelled']);
        return redirect()->back()->with('success', 'تم إلغاء الحجز بنجاح.');
    }
} 