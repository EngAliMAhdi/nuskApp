<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getImageAttribute($value)
    {
        return $value ? asset('storage/' . $value) : asset('image/pro.png');
    }
}
