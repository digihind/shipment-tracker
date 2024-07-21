<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Tracking Update') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-luvi-card>
                <x-slot name="header">New Tracking Update for Shipment #{{ $shipment->tracking_number }}</x-slot>

                <form action="{{ route('tracking-updates.store', $shipment) }}" method="POST">
                    @csrf
                    <x-luvi-input name="location" label="Location" required />
                    <x-luvi-select name="status" label="Status" :options="['In Transit', 'Out for Delivery', 'Delivered', 'Delayed']" required />
                    <x-luvi-textarea name="description" label="Description" required />
                    <x-luvi-input type="datetime-local" name="update_time" label="Update Time" required />

                    <div class="mt-4">
                        <x-luvi-button type="submit">Add Update</x-luvi-button>
                    </div>
                </form>
            </x-luvi-card>
        </div>
    </div>
</x-app-layout>
