<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-luvi-card>
                <x-slot name="header">
                    <h2 class="text-xl font-semibold text-gray-800">
                        Tracking Information for Shipment #{{ $shipment->tracking_number }}
                    </h2>
                </x-slot>

                <dl class="grid grid-cols-2 gap-4 mb-8">
                    <div>
                        <dt class="font-medium text-gray-500">Origin</dt>
                        <dd class="mt-1 text-gray-900">{{ $shipment->origin }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-500">Destination</dt>
                        <dd class="mt-1 text-gray-900">{{ $shipment->destination }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-500">Expected Delivery Date</dt>
                        <dd class="mt-1 text-gray-900">{{ $shipment->expected_delivery_date }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-500">Status</dt>
                        <dd class="mt-1 text-gray-900">{{ $shipment->status }}</dd>
                    </div>
                </dl>

                <h3 class="text-lg font-medium text-gray-900 mb-4">Tracking Updates</h3>
                @forelse($shipment->trackingUpdates as $update)
                    <x-luvi-card class="mb-4">
                        <h4 class="font-medium text-gray-900">{{ $update->status }}</h4>
                        <p class="text-sm text-gray-500">{{ $update->location }} - {{ $update->update_time }}</p>
                        <p class="mt-2">{{ $update->description }}</p>
                    </x-luvi-card>
                @empty
                    <p class="text-gray-500">No tracking updates available.</p>
                @endforelse
            </x-luvi-card>
        </div>
    </div>
</x-guest-layout>
