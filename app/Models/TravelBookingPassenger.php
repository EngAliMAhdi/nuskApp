<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelBookingPassenger extends Model
{
    protected $fillable = [
        'travel_booking_id',
        'first_name',
        'last_name',
        'birth_date',
        'nationality',
        'national_id',
        'price',
    ];

    public function booking()
    {
        return $this->belongsTo(TravelBooking::class, 'travel_booking_id');
    }
}
