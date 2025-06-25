<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'email',
        'registration_number',
        'license_number',
        'user_id',
        'city',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getCompanyDetails()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'registration_number' => $this->registration_number,
            'license_number' => $this->license_number,
            'city' => $this->city,
        ];
    }
    public function getCompanyName()
    {
        return $this->name;
    }
}
