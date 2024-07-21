<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Shipment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-luvi-card>
                <x-slot name="header">New Shipment Details</x-slot>

                <form action="{{ route('shipments.store') }}" method="POST">
                    @csrf
                    <x-luvi-input name="tracking_number" label="Tracking Number" required />
                    <x-luvi-input name="origin" label="Origin" required />
                    <x-luvi-input name="destination" label="Destination" required />
                    <x-luvi-input type="date" name="expected_delivery_date" label="Expected Delivery Date" required />
                    <x-luvi-select name="status" label="Status" :options="['Pending', 'In Transit', 'Delivered']" required />

                    <div class="mt-4">
                        <x-luvi-button type="submit">Create Shipment</x-luvi-button>
                    </div>
                </form>
            </x-luvi-card>
        </div>
    </div>
</x-app-layout>
