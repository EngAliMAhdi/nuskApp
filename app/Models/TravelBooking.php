<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelBooking extends Model
{
    protected $fillable = [
        'user_id',
        'country',
        'city',
        'reservation_date',
        'transport_type_to_mecca',
        'transport_type_to_madina',
        'transport_id_to_mecca',
        'air_transport_id_to_mecca',
        'transport_id_to_madina',
        'air_transport_id_to_madina',
        'hotel_id_mecca',
        'hotel_id_madina',
        'method_paid',
        'payment_status',
        'total_price',
        'payment_reference',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function passengers()
    {
        return $this->hasMany(TravelBookingPassenger::class);
    }

    public function transportFromAirport()
    {
        return $this->belongsTo(Transport::class, 'transport_id_to_mecca');
    }

    public function airTransportFromAirport()
    {
        return $this->belongsTo(AirTransports::class, 'air_transport_id_to_mecca');
    }

    public function transportToMadina()
    {
        return $this->belongsTo(Transport::class, 'transport_id_to_madina');
    }

    public function airTransportToMadina()
    {
        return $this->belongsTo(AirTransports::class, 'air_transport_id_to_madina');
    }

    public function hotelInMecca()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id_mecca');
    }

    public function hotelInMadina()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id_madina');
    }
}
