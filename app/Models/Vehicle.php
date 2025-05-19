<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $guarded=[];
    public function transport(){
        return $this->belongsTo(Transport::class);
    }
}
