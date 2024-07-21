<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\TrackingUpdate;
use Illuminate\Http\Request;

class TrackingUpdateController extends Controller
{
    public function create(Shipment $shipment)
    {
        $this->authorize('update', $shipment);
        return view('tracking-updates.create', compact('shipment'));
    }

    public function store(Request $request, Shipment $shipment)
    {
        $this->authorize('update', $shipment);

        $validated = $request->validate([
            'status' => 'required',
            'location' => 'required',
            'description' => 'required',
            'update_time' => 'required|date',
        ]);

        $shipment->trackingUpdates()->create($validated);

        return redirect()->route('shipments.show', $shipment)->with('success', 'Tracking update added successfully.');
    }

    public function destroy(TrackingUpdate $trackingUpdate)
    {
        $this->authorize('delete', $trackingUpdate->shipment);

        $trackingUpdate->delete();

        return redirect()->route('shipments.show', $trackingUpdate->shipment)->with('success', 'Tracking update deleted successfully.');
    }
}
