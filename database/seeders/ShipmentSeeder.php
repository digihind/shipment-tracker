<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shipment;

class ShipmentSeeder extends Seeder
{
    public function run()
    {
        Shipment::create([
            'tracking_number' => 'SHIP123456',
            'status' => 'In Transit',
            'origin' => 'New York',
            'destination' => 'Los Angeles',
            'estimated_delivery' => now()->addDays(5),
        ]);

        // Add more shipments as needed
    }
}
