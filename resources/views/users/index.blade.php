<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-luvi-card>
                <x-slot name="header">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-medium text-gray-900">Company Users</h3>
                        <x-luvi-button href="{{ route('users.create') }}">
                            Add New User
                        </x-luvi-button>
                    </div>
                </x-slot>

                <x-luvi-table>
                    <x-slot name="header">
                        <x-luvi-table-column>Name</x-luvi-table-column>
                        <x-luvi-table-column>Email</x-luvi-table-column>
                        <x-luvi-table-column>Role</x-luvi-table-column>
                        <x-luvi-table-column>Actions</x-luvi-table-column>
                    </x-slot>

                    <x-slot name="body">
                        @foreach ($users as $user)
                            <x-luvi-table-row>
                                <x-luvi-table-column>{{ $user->name }}</x-luvi-table-column>
                                <x-luvi-table-column>{{ $user->email }}</x-luvi-table-column>
                                <x-luvi-table-column>{{ $user->role }}</x-luvi-table-column>
                                <x-luvi-table-column>
                                    <x-luvi-button-group>
                                        <x-luvi-button href="{{ route('users.edit', $user) }}" size="sm">Edit</x-luvi-button>
                                        <x-luvi-button wire:click="deleteUser({{ $user->id }})" size="sm" color="danger">Delete</x-luvi-button>
                                    </x-luvi-button-group>
                                </x-luvi-table-column>
                            </x-luvi-table-row>
                        @endforeach
                    </x-slot>
                </x-luvi-table>
            </x-luvi-card>
        </div>
    </div>
</x-app-layout>
