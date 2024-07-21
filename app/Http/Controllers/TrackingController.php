<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function track($tracking_number)
    {
        $shipment = Shipment::where('tracking_number', $tracking_number)->firstOrFail();
        return view('tracking.show', compact('shipment'));
    }
}
