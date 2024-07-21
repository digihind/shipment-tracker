<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class PublicTrackingController extends Controller
{
    public function show($tracking_number)
    {
        $shipment = Shipment::where('tracking_number', $tracking_number)->firstOrFail();
        return view('tracking.show', compact('shipment'));
    }
}
