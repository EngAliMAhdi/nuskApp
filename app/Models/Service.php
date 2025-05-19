<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'hotel_id',
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
        return $this->belongsToMany(Room::class, 'room_service');
    }
   
}
