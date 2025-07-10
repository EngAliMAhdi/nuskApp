<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\api\BaseController;
use App\Models\TravelBooking;
use App\Models\TravelBookingPassenger;
use App\Models\Transport;
use App\Models\AirTransports;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TravelBookingController extends BaseController
{
    /**
     * Display a listing of travel bookings for the authenticated user.
     */
    public function index()
    {
        try {
            $user = Auth::user();
            $travelBookings = TravelBooking::with(['passengers', 'user'])
                ->where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->get();

            return $this->sendResponse($travelBookings, __('menu.travel_bookings') . ' retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving travel bookings', $e->getMessage(), 500);
        }
    }

    /**
     * Store a newly created travel booking.
     */
    public function create(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'country' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'reservation_date' => 'required|date',
                'transport_type_to_mecca' => 'required|in:bari,jawi',
                'transport_type_to_madina' => 'required|in:bari,jawi',
                'transport_id_to_mecca' => 'nullable|exists:transports,id',
                'transport_id_to_madina' => 'nullable|exists:transports,id',
                'air_transport_id_to_mecca' => 'nullable|exists:air_transports,id',
                'air_transport_id_to_madina' => 'nullable|exists:air_transports,id',
                'hotel_id_mecca' => 'nullable|exists:hotels,id',
                'hotel_id_madina' => 'nullable|exists:hotels,id',
                'payment_method' => 'required|in:cash,credit_card',
                'passengers' => 'required|array|min:1',
                'passengers.*.first_name' => 'required|string|max:255',
                'passengers.*.last_name' => 'required|string|max:255',
                'passengers.*.birth_date' => 'required|date',
                'passengers.*.nationality' => 'required|string|max:255',
                'passengers.*.national_id' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation failed', $validator->errors(), 422);
            }

            $user = Auth::user();

            DB::beginTransaction();

            // Calculate total price based on passengers
            $totalPrice = 0;
            foreach ($request->passengers as $passengerData) {
                $age = \Carbon\Carbon::parse($passengerData['birth_date'])->age;
                if ($age < 2) {
                    $totalPrice += 0; // Free for infants
                } elseif ($age < 12) {
                    $totalPrice += 500; // Half price for children
                } else {
                    $totalPrice += 1000; // Full price for adults
                }
            }

            // Create travel booking
            $travelBooking = TravelBooking::create([
                'user_id' => $user->id,
                'country' => $request->country,
                'city' => $request->city,
                'reservation_date' => $request->reservation_date,
                'transport_type_to_mecca' => $request->transport_type_to_mecca,
                'transport_type_to_madina' => $request->transport_type_to_madina,
                'transport_id_to_mecca' => $request->transport_id_to_mecca,
                'transport_id_to_madina' => $request->transport_id_to_madina,
                'air_transport_id_to_mecca' => $request->air_transport_id_to_mecca,
                'air_transport_id_to_madina' => $request->air_transport_id_to_madina,
                'hotel_id_mecca' => $request->hotel_id_mecca,
                'hotel_id_madina' => $request->hotel_id_madina,
                'method_paid' => $request->payment_method,
                'total_price' => $totalPrice,
                'status' => 'pending',
                'payment_status' => 'unpaid',
            ]);

            // Create passengers
            foreach ($request->passengers as $passengerData) {
                $age = \Carbon\Carbon::parse($passengerData['birth_date'])->age;
                if ($age < 2) {
                    $price = 0;
                } elseif ($age < 12) {
                    $price = 500;
                } else {
                    $price = 1000;
                }

                TravelBookingPassenger::create([
                    'travel_booking_id' => $travelBooking->id,
                    'first_name' => $passengerData['first_name'],
                    'last_name' => $passengerData['last_name'],
                    'birth_date' => $passengerData['birth_date'],
                    'nationality' => $passengerData['nationality'],
                    'national_id' => $passengerData['national_id'],
                    'price' => $price,
                ]);
            }

            DB::commit();

            // Load relationships for response
            $travelBooking->load(['passengers', 'user']);

            return $this->sendResponse($travelBooking, __('menu.new_travel_booking') . ' created successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError('Error creating travel booking', $e->getMessage(), 500);
        }
    }

    /**
     * Display the specified travel booking.
     */
    public function show($id)
    {
        try {
            $user = Auth::user();
            $travelBooking = TravelBooking::with([
                'passengers',
                'user',
                'transportFromAirport',
                'transportToMadina',
                'airTransportFromAirport',
                'airTransportToMadina',
                'hotelInMecca',
                'hotelInMadina'
            ])->where('user_id', $user->id)
              ->findOrFail($id);

            return $this->sendResponse($travelBooking, __('menu.travel_booking_details') . ' retrieved successfully');

        } catch (\Exception $e) {
            return $this->sendError('Travel booking not found or access denied', $e->getMessage(), 404);
        }
    }

    /**
     * Get all models/data needed for creating travel booking.
     */
    public function getFormData()
    {
        try {
            // Get all transports (land transport)
            $transports = Transport::select('id', 'name', 'type', 'capacity', 'price')->get();
            
            // Get all air transports
            $airTransports = AirTransports::select('id', 'airplane', 'flight_number', 'departure_time', 'arrival_time', 'price')->get();
            
            // Get hotels grouped by city
            $hotels = Hotel::with(['hotelImages' => function ($query) {
                $query->take(5);
            }])
           ->orderBy('name')
           ->get();


            


            $formData = [
                'transports' => $transports,
                'air_transports' => $airTransports,
                'hotels' => $hotels,
               
            ];

            return $this->sendResponse($formData, 'Travel booking form data retrieved successfully');

        } catch (\Exception $e) {
            return $this->sendError('Error retrieving form data', $e->getMessage(), 500);
        }
    }

    /**
     * Cancel a travel booking.
     */
    public function cancel($id)
    {
        try {
            $user = Auth::user();
            $travelBooking = TravelBooking::where('user_id', $user->id)
                ->where('status', 'pending')
                ->findOrFail($id);

            $travelBooking->update(['status' => 'cancelled']);

            return $this->sendResponse($travelBooking, __('menu.booking_cancelled_success'));

        } catch (\Exception $e) {
            return $this->sendError('Error cancelling travel booking', $e->getMessage(), 500);
        }
    }
} 