<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invitation Invalid') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-yellow-100 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-yellow-600">Invalid Invitation</h1>
                <p>The invitation token is invalid.</p>
            </div>
        </div>
    </div>
</x-app-layout>
