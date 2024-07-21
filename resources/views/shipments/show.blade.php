<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shipment Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-luvi-card>
                <x-slot name="header">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-medium text-gray-900">Shipment #{{ $shipment->tracking_number }}</h3>
                        <x-luvi-button href="{{ route('shipments.edit', $shipment) }}">
                            Edit Shipment
                        </x-luvi-button>
                    </div>
                </x-slot>

                <dl class="grid grid-cols-2 gap-4">
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

                <h4 class="font-medium text-gray-900 mt-8 mb-4">Tracking Updates</h4>
                @forelse($shipment->trackingUpdates as $update)
                    <x-luvi-card class="mb-4">
                        <h5 class="font-medium text-gray-900">{{ $update->status }}</h5>
                        <p class="text-sm text-gray-500">{{ $update->location }} - {{ $update->update_time }}</p>
                        <p class="mt-2">{{ $update->description }}</p>
                    </x-luvi-card>
                @empty
                    <p class="text-gray-500">No tracking updates available.</p>
                @endforelse
            </x-luvi-card>
        </div>
    </div>
</x-app-layout>
