<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportDriver extends Model
{
    protected $guarded = [];
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }
}
