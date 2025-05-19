<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'hotel_id',
        'type',
        'number',
        'beds_count',
        'cost_price',
        'sale_price',
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

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function partment()
    {
        return $this->belongsTo(Partment::class, 'hotel_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'room_services')->withPivot('service_id');
    }
}
