<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Invitation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-500 text-white flex items-center justify-center rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" 
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M5.121 17.804A4 4 0 019 15h6a4 4 0 013.879 2.804M16 11a4 4 0 10-8 0m4 6v4m-3-4h6"/>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-semibold ml-3">Create Invitation</h1>
                </div>

                <form method="POST" action="{{ route('invitations.store') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required
                        >
                    </div>

                    <div class="flex justify-end space-x-2">
                        <button 
                            type="submit" 
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                            Create Invitation
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
