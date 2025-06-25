<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['package_id', 'user_id', 'total_price', 'method_paid', 'status', 'payment_status', 'payment_reference'];

    public function people()
    {
        return $this->hasMany(BookingPerson::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
