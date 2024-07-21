<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-luvi-card>
                <x-slot name="header">Company Information</x-slot>

                <form action="{{ route('company.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-luvi-input name="name" label="Company Name" :value="$company->name" required />
                    <x-luvi-input name="email" type="email" label="Company Email" :value="$company->email" required />
                    <x-luvi-input name="phone" type="tel" label="Company Phone" :value="$company->phone" />
                    <x-luvi-textarea name="address" label="Company Address" :value="$company->address" />
                    <x-luvi-input name="website" type="url" label="Company Website" :value="$company->website" />

                    <div class="mt-4">
                        <x-luvi-button type="submit">Update Company Information</x-luvi-button>
                    </div>
                </form>
            </x-luvi-card>

            <x-luvi-card class="mt-6">
                <x-slot name="header">Tracking Page Customization</x-slot>

                <form action="{{ route('company.update-tracking-page') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-luvi-input type="file" name="logo" label="Company Logo" accept="image/*" />
                    <x-luvi-input type="color" name="primary_color" label="Primary Color" :value="$company->primary_color" />
                    <x-luvi-textarea name="custom_message" label="Custom Message for Tracking Page" :value="$company->custom_message" />

                    <div class="mt-4">
                        <x-luvi-button type="submit">Update Tracking Page</x-luvi-button>
                    </div>
                </form>
            </x-luvi-card>
        </div>
    </div>
</x-app-layout>
