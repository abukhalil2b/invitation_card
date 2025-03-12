<x-app-layout>
    <x-slot name="header">
        <!-- This header is for screen view only -->
        <header class="no-print">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight page-title">
                {{ __('Invitation Created') }}
            </h2>
        </header>
    </x-slot>

    <!-- Print styles: Hides header, page title, navigation bar, and other admin-only elements -->
    <style>
        @media print {
            .no-print, 
            header, 
            nav, 
            .page-title {
                display: none !important;
            }
            .print-only {
                display: block !important;
            }
            body {
                -webkit-print-color-adjust: exact;
            }
        }
        @media screen {
            .print-only {
                display: none;
            }
        }
    </style>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Screen Version: Full details with admin controls -->
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-6 no-print">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-12 h-12 bg-blue-500 text-white flex items-center justify-center rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" 
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M5.121 17.804A4 4 0 019 15h6a4 4 0 013.879 2.804M16 11a4 4 0 10-8 0m4 6v4m-3-4h6"/>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-semibold">{{ $invitation->name }}</h1>
                </div>

                <p class="text-gray-700 mb-4"></p>
                <div class="flex justify-center mb-4">
                    <div class="border-4 border-gray-300 rounded-lg p-4">
                        {!! $qrCode !!}
                    </div>
                </div>

                <div class="flex justify-end">
                    <button 
                        type="button" 
                        onclick="window.print()" 
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition">
                        Print / Export PDF
                    </button>
                </div>
            </div>

            <!-- Print-Only Version: Minimal invitation card for the invited person -->
            <div class="print-only">
                <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-6">
                    <div class="flex flex-col items-center space-y-4">
                        <h1 class="text-2xl font-semibold">Invitation for {{ $invitation->name }}</h1>
                        <div class="flex justify-center">
                            <div class="border-4 border-gray-300 rounded-lg p-4">
                                {!! $qrCode !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
