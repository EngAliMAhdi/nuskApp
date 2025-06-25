<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bouquet extends Model
{
    protected $guarded = [];
    public function getImageAttribute($value)
    {
        return asset('storage/' . $value);
    }
    public function getAllDetails()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image
        ];
    }
}
