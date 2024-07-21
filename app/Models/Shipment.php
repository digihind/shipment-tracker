<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = ['tracking_number', 'origin', 'destination', 'expected_delivery_date', 'status'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function trackingUpdates()
    {
        return $this->hasMany(TrackingUpdate::class);
    }
}