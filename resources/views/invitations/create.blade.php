<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            إنشاء دعوة
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-500 text-white flex items-center justify-center rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A4 4 0 019 15h6a4 4 0 013.879 2.804M16 11a4 4 0 10-8 0m4 6v4m-3-4h6" />
                        </svg>
                    </div>
                    <h1 class="text-2xl font-semibold ml-3">إنشاء دعوة</h1>
                </div>

                <form method="POST" action="{{ route('invitations.store') }}" class="space-y-4">
                    @csrf

                    <!-- مجموعة إدخال الاسم -->
<div>
    <label for="name" class="block text-sm font-medium text-gray-700">الاسم:</label>
    <div class="flex mt-1" dir="ltr">
        <span class="inline-flex items-center px-3 text-gray-500 bg-gray-200 border border-gray-300 rounded-l-md">
            <!-- أيقونة SVG للاسم -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5.121 17.804A4 4 0 019 15h6a4 4 0 013.879 2.804M16 11a4 4 0 10-8 0m4 6v4m-3-4h6" />
            </svg>
        </span>
        <input type="text" name="name" id="name"
            class="flex-1 block w-full px-3 py-2 border border-gray-300 rounded-r-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="أدخل اسمك" required>
    </div>
</div>

<!-- مجموعة إدخال رقم الهاتف -->
<div>
    <label for="recipient_phone" class="block text-sm font-medium text-gray-700">رقم الهاتف (8 أرقام):</label>
    <div class="flex mt-1" dir="ltr">
        <span class="inline-flex items-center px-3 text-gray-500 bg-gray-200 border border-gray-300 rounded-l-md">
            <!-- أيقونة SVG للهاتف -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 5a2 2 0 012-2h3.28a2 2 0 011.948 1.368l1.24 3.718a2 2 0 01-.514 2.09l-2.2 2.2a11.042 11.042 0 005.516 5.516l2.2-2.2a2 2 0 012.09-.514l3.718 1.24A2 2 0 0121 15.72V19a2 2 0 01-2 2A16 16 0 013 5z" />
            </svg>
        </span>
        <span class="inline-flex items-center px-3 text-gray-500 bg-gray-200 border border-gray-300">+968</span>
        <input type="number" name="recipient_phone" id="recipient_phone"
            class="flex-1 block w-full px-3 py-2 border border-gray-300 rounded-r-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="أدخل رقم الهاتف (سيتم إضافة رمز الدولة تلقائياً)"
            pattern="\d{8}" title="يرجى إدخال 8 أرقام بالضبط" required>
    </div>
</div>


                    <!-- زر الإرسال -->
                    <div class="flex justify-end space-x-2">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                            إنشاء دعوة
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
