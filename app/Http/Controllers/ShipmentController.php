<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index()
    {
        $shipments = auth()->user()->company->shipments()->latest()->paginate(10);
        return view('shipments.index', compact('shipments'));
    }

    public function create()
    {
        return view('shipments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tracking_number' => 'required|unique:shipments',
            'origin' => 'required',
            'destination' => 'required',
            'status' => 'required',
            'expected_delivery_date' => 'required|date',
        ]);

        $shipment = auth()->user()->company->shipments()->create($validated);

        return redirect()->route('shipments.show', $shipment)->with('success', 'Shipment created successfully.');
    }

    public function show(Shipment $shipment)
    {
        $this->authorize('view', $shipment);
        return view('shipments.show', compact('shipment'));
    }

    public function edit(Shipment $shipment)
    {
        $this->authorize('update', $shipment);
        return view('shipments.edit', compact('shipment'));
    }

    public function update(Request $request, Shipment $shipment)
    {
        $this->authorize('update', $shipment);

        $validated = $request->validate([
            'tracking_number' => 'required|unique:shipments,tracking_number,' . $shipment->id,
            'origin' => 'required',
            'destination' => 'required',
            'status' => 'required',
            'expected_delivery_date' => 'required|date',
        ]);

        $shipment->update($validated);

        return redirect()->route('shipments.show', $shipment)->with('success', 'Shipment updated successfully.');
    }

    public function destroy(Shipment $shipment)
    {
        $this->authorize('delete', $shipment);

        $shipment->delete();

        return redirect()->route('shipments.index')->with('success', 'Shipment deleted successfully.');
    }
}
