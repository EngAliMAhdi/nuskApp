<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'city',
        'name',
        'description',
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
        return $this->hasMany(Room::class, 'hotel_id');
    }
    public function services()
    {
        return $this->hasMany(Service::class, 'hotel_id');
    }
}
