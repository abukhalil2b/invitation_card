<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invitation Already Used') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red-100 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-red-600">Invitation Already Used</h1>
                <p>This invitation has already been used. Please contact the administrator if you believe this is an error.</p>
            </div>
        </div>
    </div>
</x-app-layout>
