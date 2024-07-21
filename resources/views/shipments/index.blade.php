<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-luvi-card>
                <x-slot name="header">Welcome to Shipment Tracker</x-slot>
                <p>Here you can manage your shipments and track their progress.</p>
                <x-luvi-button href="{{ route('shipments.index') }}" class="mt-4">
                    View Shipments
                </x-luvi-button>
            </x-luvi-card>
        </div>
    </div>
</x-app-layout>
