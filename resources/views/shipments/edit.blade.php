<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Shipment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-luvi-card>
                <x-slot name="header">Edit Shipment #{{ $shipment->tracking_number }}</x-slot>

                <form action="{{ route('shipments.update', $shipment) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-luvi-input name="tracking_number" label="Tracking Number" :value="$shipment->tracking_number" required />
                    <x-luvi-input name="origin" label="Origin" :value="$shipment->origin" required />
                    <x-luvi-input name="destination" label="Destination" :value="$shipment->destination" required />
                    <x-luvi-input type="date" name="expected_delivery_date" label="Expected Delivery Date" :value="$shipment->expected_delivery_date" required />
                    <x-luvi-select name="status" label="Status" :options="['Pending', 'In Transit', 'Delivered']" :value="$shipment->status" required />

                    <div class="mt-4">
                        <x-luvi-button type="submit">Update Shipment</x-luvi-button>
                    </div>
                </form>
            </x-luvi-card>
        </div>
    </div>
</x-app-layout>
