<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingPerson extends Model
{
    protected $fillable = [
        'booking_id',
        'first_name',
        'last_name',
        'birth_date',
        'nationality',
        'national_id',
        'type',
        'price'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
