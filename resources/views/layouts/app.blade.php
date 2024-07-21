<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Shipment Tracker') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <x-luvi-navbar>
            <x-slot name="left">
                <x-luvi-nav-item href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    Dashboard
                </x-luvi-nav-item>
                <x-luvi-nav-item href="{{ route('shipments.index') }}" :active="request()->routeIs('shipments.*')">
                    Shipments
                </x-luvi-nav-item>
            </x-slot>
            <x-slot name="right">
                <x-luvi-dropdown>
                    <x-slot name="trigger">
                        {{ Auth::user()->name }}
                    </x-slot>
                    <x-luvi-dropdown-link href="{{ route('profile.edit') }}">
                        Profile
                    </x-luvi-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-luvi-dropdown-link href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            Log Out
                        </x-luvi-dropdown-link>
                    </form>
                </x-luvi-dropdown>
            </x-slot>
        </x-luvi-navbar>

        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')
    @livewireScripts
</body>
</html>
