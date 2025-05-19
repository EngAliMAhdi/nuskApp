<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $guarded = [];

    public function services()
    {
        return $this->hasMany(TransportService::class, 'transport_id');
    }
    public function drivers()
    {
        return $this->hasMany(TransportDriver::class);
    }
}
