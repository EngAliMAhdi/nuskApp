<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TravelBooking;
use Illuminate\Http\Request;

class TravelBookingController extends Controller
{
    public function index()
    {
        $travelBookings = TravelBooking::with(['user', 'passengers', 'hotelInMecca', 'hotelInMadina'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        
        return view('admin.travel-booking.index', compact('travelBookings'));
    }

    public function show($id)
    {
        $travelBooking = TravelBooking::with(['user', 'passengers', 'hotelInMecca', 'hotelInMadina', 'transportFromAirport', 'airTransportFromAirport', 'transportToMadina', 'airTransportToMadina'])
            ->findOrFail($id);
        
        return view('admin.travel-booking.show', compact('travelBooking'));
    }

    public function updateStatus(Request $request, $id)
    {
        $travelBooking = TravelBooking::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
            'payment_status' => 'required|in:pending,paid,failed'
        ]);

        $travelBooking->update([
            'status' => $request->status,
            'payment_status' => $request->payment_status
        ]);

        return redirect()->back()->with('success', 'تم تحديث حالة الحجز بنجاح');
    }

    public function destroy($id)
    {
        $travelBooking = TravelBooking::findOrFail($id);
        $travelBooking->delete();

        return redirect()->route('admin.travel-booking.index')->with('success', 'تم حذف الحجز بنجاح');
    }
} 