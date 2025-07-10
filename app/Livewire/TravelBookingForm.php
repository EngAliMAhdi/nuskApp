<?php

namespace App\Livewire;

use App\Models\AirTransports;
use App\Models\Hotel;
use App\Models\Transport;
use App\Models\TravelBooking;
use App\Models\TravelBookingPassenger;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TravelBookingForm extends Component
{
    public $country = '';
    public $city = '';
    public $reservation_date = '';
    
    // Transport to Mecca
    public $transport_type_to_mecca = 'bari';
    public $transport_id_to_mecca = null;
    public $air_transport_id_to_mecca = null;
    
    // Transport to Madina
    public $transport_type_to_madina = 'bari';
    public $transport_id_to_madina = null;
    public $air_transport_id_to_madina = null;
    
    // Hotels
    public $hotel_id_mecca = null;
    public $hotel_id_madina = null;
    
    // Passengers
    public $passengers = [];
    public $total_price = 0;
    public $payment_method = 'cash';

    public function mount()
    {
        $this->passengers = [
            [
                'first_name' => '',
                'last_name' => '',
                'birth_date' => '',
                'nationality' => '',
                'national_id' => '',
                'price' => 0
            ]
        ];
    }

    public function addPassenger()
    {
        $this->passengers[] = [
            'first_name' => '',
            'last_name' => '',
            'birth_date' => '',
            'nationality' => '',
            'national_id' => '',
            'price' => 0
        ];
    }

    public function removePassenger($index)
    {
        unset($this->passengers[$index]);
        $this->passengers = array_values($this->passengers);
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->total_price = 0;
        foreach ($this->passengers as $passenger) {
            if (!empty($passenger['birth_date'])) {
                $age = \Carbon\Carbon::parse($passenger['birth_date'])->age;
                $basePrice = 1000; // Base price per person
                
                // Apply age-based pricing
                if ($age < 2) {
                    $price = 0; // Free for under 2
                } elseif ($age >= 2 && $age <= 10) {
                    $price = $basePrice * 0.5; // 50% for 2-10 years
                } else {
                    $price = $basePrice; // Full price for adults
                }
                
                $this->total_price += $price;
            }
        }
    }

    public function updatedPassengers()
    {
        $this->calculateTotal();
    }

    public function save()
    {
        $this->validate([
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'reservation_date' => 'required|date|after:today',
            'hotel_id_mecca' => 'nullable|exists:hotels,id',
            'hotel_id_madina' => 'nullable|exists:hotels,id',
            'transport_id_to_mecca' => 'nullable|exists:transports,id',
            'air_transport_id_to_mecca' => 'nullable|exists:air_transports,id',
            'transport_id_to_madina' => 'nullable|exists:transports,id',
            'air_transport_id_to_madina' => 'nullable|exists:air_transports,id',
            'passengers' => 'required|array|min:1',
            'passengers.*.first_name' => 'required|string|max:255',
            'passengers.*.last_name' => 'required|string|max:255',
            'passengers.*.birth_date' => 'required|date',
            'passengers.*.nationality' => 'required|string|max:255',
            'passengers.*.national_id' => 'required|string|max:255',
        ]);

        $travelBooking = TravelBooking::create([
            'user_id' => Auth::id(),
            'country' => $this->country,
            'city' => $this->city,
            'reservation_date' => $this->reservation_date,
            'transport_type_to_mecca' => $this->transport_type_to_mecca,
            'transport_type_to_madina' => $this->transport_type_to_madina,
            'transport_id_to_mecca' => $this->transport_id_to_mecca,
            'air_transport_id_to_mecca' => $this->air_transport_id_to_mecca,
            'transport_id_to_madina' => $this->transport_id_to_madina,
            'air_transport_id_to_madina' => $this->air_transport_id_to_madina,
            'hotel_id_mecca' => $this->hotel_id_mecca,
            'hotel_id_madina' => $this->hotel_id_madina,
            'method_paid' => $this->payment_method,
            'total_price' => $this->total_price,
            'status' => 'pending',
            'payment_status' => 'pending'
        ]);

        foreach ($this->passengers as $passenger) {
            $age = \Carbon\Carbon::parse($passenger['birth_date'])->age;
            $basePrice = 1000;
            
            if ($age < 2) {
                $price = 0;
            } elseif ($age >= 2 && $age <= 10) {
                $price = $basePrice * 0.5;
            } else {
                $price = $basePrice;
            }

            $travelBooking->passengers()->create([
                'first_name' => $passenger['first_name'],
                'last_name' => $passenger['last_name'],
                'birth_date' => $passenger['birth_date'],
                'nationality' => $passenger['nationality'],
                'national_id' => $passenger['national_id'],
                'price' => $price
            ]);
        }

        session()->flash('success', 'تم الحجز بنجاح!');

        if ($this->payment_method === 'cash') {
            return redirect()->route('user.travel-booking.index');
        }

        return redirect()->route('user.travel-booking.payment', $travelBooking->id);
    }

    public function render()
    {
        $hotels = Hotel::all();
        $transports = Transport::all();
        $airTransports = AirTransports::all();
        
        return view('livewire.travel-booking-form', compact('hotels', 'transports', 'airTransports'));
    }
} 