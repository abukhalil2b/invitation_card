<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            لوحة التحكم
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- بطاقات الإحصائيات -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                <div class="bg-white shadow rounded-lg p-6 flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-500 mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18m-9 5h9"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">الدعوات المتبقية</p>
                        <p class="text-2xl font-semibold">{{ $totalRemain }}</p>
                    </div>
                </div>
                <div class="bg-white shadow rounded-lg p-6 flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">الدعوات المستخدمة</p>
                        <p class="text-2xl font-semibold">{{ $totalPresent }}</p>
                    </div>
                </div>
            </div>

            <!-- صندوق التصفية -->
            <div class="mb-4">
                <input type="text" id="table-filter" placeholder="تصفية الدعوات حسب الاسم أو الهاتف أو الحالة..."
                    class="border border-gray-300 rounded-md px-4 py-2 w-full" />
            </div>

            <!-- جدول الدعوات -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">اسم الشخص</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">رقم هاتف المستلم</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">الحالة</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($invitations as $index => $invitation)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $invitation->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $invitation->recipient_phone }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($invitation->used_at)
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                                مستخدم
                                            </span>
                                        @else
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                غير مستخدم
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if (auth()->id() == 1)
                                            <a href="{{ route('invitations.show', $invitation->id) }}"
                                                class="text-xs px-2 py-1 bg-green-500 text-white rounded-md hover:bg-green-600">
                                                عرض
                                            </a>
                                            <a href="{{ route('invitations.edit', $invitation->id) }}"
                                                class="text-xs mx-1 px-2 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                                تعديل
                                            </a>
                                            <form method="POST" action="{{ route('invitations.destroy', $invitation->id) }}"
                                                class="inline-block"
                                                onsubmit="return confirm('هل أنت متأكد أنك تريد حذف هذه الدعوة؟')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-xs px-2 py-1 bg-red-500 text-white rounded-md hover:bg-red-600">
                                                    حذف
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <script>
                document.getElementById("table-filter").addEventListener("keyup", function() {
                    let filter = this.value.toLowerCase();
                    let rows = document.querySelectorAll("tbody tr");

                    rows.forEach(function(row) {
                        let rowText = row.textContent.toLowerCase();
                        row.style.display = rowText.includes(filter) ? "" : "none";
                    });
                });
            </script>

            <a class="mt-2 w-32 px-4 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition flex items-center justify-center"
                href="{{ route('invitations.index') }}">كل المدعوين</a>
        </div>
    </div>
</x-app-layout>
