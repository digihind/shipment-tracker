<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackingUpdate extends Model
{
    protected $fillable = ['location', 'status', 'description', 'update_time'];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}