<?php

namespace App\Models;

use App\LuxuryLevel;
use App\PackageStatus;
use App\PackageType;
use App\TargetGroup;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];
    protected $table = 'packages';


    public function transport()
    {
        return $this->morphTo(__FUNCTION__, 'transport_type', 'transport_id');
    }
    public function services()
    {
        return $this->belongsToMany(OtherService::class, 'package_services', 'package_id', 'service_id')
            ->withPivot('quantity', 'extra_price')
            ->withTimestamps();
    }


    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }


    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function bouquet()
    {
        return $this->belongsTo(Bouquet::class);
    }
}
