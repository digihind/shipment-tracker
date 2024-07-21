<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $shipmentCount = $user->company->shipments()->count();
        $recentShipments = $user->company->shipments()->latest()->take(5)->get();
        
        return view('dashboard', compact('shipmentCount', 'recentShipments'));
    }
}
