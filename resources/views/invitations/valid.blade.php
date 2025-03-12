<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invitation Valid') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Icon with the message -->
                <div class="flex items-center space-x-4 mb-4">
                    <div class="w-12 h-12 bg-green-500 text-white flex items-center justify-center rounded-full">
                        <!-- Checkmark icon for success -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" 
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-semibold text-green-600">Welcome, {{ $invitation->name }}!</h1>
                </div>
                <p class="text-gray-700">Your invitation is valid and has now been marked as used.</p>
            </div>
        </div>
    </div>
</x-app-layout>
