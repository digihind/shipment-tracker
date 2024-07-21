<!-- resources/views/livewire/shipments-table.blade.php -->
<div>
    <div class="mb-4">
        <x-luvi-input wire:model.debounce.300ms="search" type="search" placeholder="Search shipments..." />
    </div>

    <x-luvi-table>
        <x-slot name="header">
            <x-luvi-table-column sortable wire:click="sortBy('tracking_number')" :direction="$sortField === 'tracking_number' ? $sortDirection : null">Tracking Number</x-luvi-table-column>
            <x-luvi-table-column sortable wire:click="sortBy('origin')" :direction="$sortField === 'origin' ? $sortDirection : null">Origin</x-luvi-table-column>
            <x-luvi-table-column sortable wire:click="sortBy('destination')" :direction="$sortField === 'destination' ? $sortDirection : null">Destination</x-luvi-table-column>
            <x-luvi-table-column sortable wire:click="sortBy('status')" :direction="$sortField === 'status' ? $sortDirection : null">Status</x-luvi-table-column>
            <x-luvi-table-column>Actions</x-luvi-table-column>
        </x-slot>

        <x-slot name="body">
            @forelse ($shipments as $shipment)
                <x-luvi-table-row>
                    <x-luvi-table-column>{{ $shipment->tracking_number }}</x-luvi-table-column>
                    <x-luvi-table-column>{{ $shipment->origin }}</x-luvi-table-column>
                    <x-luvi-table-column>{{ $shipment->destination }}</x-luvi-table-column>
                    <x-luvi-table-column>
                        <x-luvi-badge :color="$shipment->status === 'Delivered' ? 'green' : ($shipment->status === 'In Transit' ? 'blue' : 'yellow')">
                            {{ $shipment->status }}
                        </x-luvi-badge>
                    </x-luvi-table-column>
                    <x-luvi-table-column>
                        <x-luvi-button-group>
                            <x-luvi-button href="{{ route('shipments.show', $shipment) }}" size="sm">View</x-luvi-button>
                            <x-luvi-button href="{{ route('shipments.edit', $shipment) }}" size="sm" color="secondary">Edit</x-luvi-button>
                            <x-luvi-button wire:click="deleteShipment({{ $shipment->id }})" size="sm" color="danger">Delete</x-luvi-button>
                        </x-luvi-button-group>
                    </x-luvi-table-column>
                </x-luvi-table-row>
            @empty
                <x-luvi-table-row>
                    <x-luvi-table-column colspan="5">
                        <div class="text-center py-4">
                            <p class="text-gray-500">No shipments found.</p>
                        </div>
                    </x-luvi-table-column>
                </x-luvi-table-row>
            @endforelse
        </x-slot>
    </x-luvi-table>

    <div class="mt-4">
        {{ $shipments->links() }}
    </div>
</div>
