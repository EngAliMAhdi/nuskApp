<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'city',
        'name',
        'images',
        'added_by',
        'updated_by',
        'active',
        'delete_reason',
        'deleted_at',

    ];

    public function addedby()
    {
        return $this->belongsTo(User::class, 'added_by');
    }
    public function updateby()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class, 'hotel_id');
    }
    public function hotelImages()
    {
        return $this->hasMany(HotelImage::class);
    }
}
