<x-app-layout>
    <x-slot name="header">
        <header class="no-print">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight page-title">
                {{ __('Invitation Created') }}
            </h2>
        </header>
    </x-slot>

    <style>
        .invitation {
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 600px;
            margin: auto;
            text-align: center;
        }
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
            <!-- Screen Version -->
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-6 no-print">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-12 h-12 bg-blue-500 text-white flex items-center justify-center rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A4 4 0 019 15h6a4 4 0 013.879 2.804M16 11a4 4 0 10-8 0m4 6v4m-3-4h6" />
                        </svg>
                    </div>
                    <h1 class="text-2xl font-semibold">{{ $invitation->name }}</h1>
                </div>

                <div class="flex justify-center mb-4">
                    <div class="border-4 border-gray-300 rounded-lg p-4">
                        {!! $qrCode !!}
                    </div>
                </div>

                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="handlePrintAndShare()"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                        Print & Share via WhatsApp
                    </button>
                </div>
            </div>

            <!-- Print-Only Version -->
            <div class="print-only">
                <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-6">
                    <div class="flex flex-col items-center space-y-4">
                        <h1 class="text-2xl font-semibold">{{ $invitation->name }}</h1>
                        <div class="flex justify-center">
                            <div class="border-4 border-gray-300 rounded-lg p-4">
                                {!! $qrCode !!}
                            </div>
                            <div class="invitation">
                                <h2>دعوة</h2>
                                <p>
                                    بارك الله في قلبين على الحب الحلال قد إلتقو وأكرم الله شملاً بالمودة قد إلتأم<br>
                                    يشرفنا ويسعدنا<br>
                                    لدعوتكم لحضور حفل زفاف<br>
                                    محمد & أفراح<br>
                                    وذلك بمشيئة لله تعالى<br>
                                    يوم الاثنين (٧/٤/٢٠٢٥)<br>
                                    قاعة الحزم / السيب / المعبيلة<br>
                                    الساعه: ٨:٠٠ pm<br>
                                    ممنوع التصوير<br>
                                    ممنوع إصطحاب الأطفال<br>
                                    ملاحظة مهمة: الرجاء إبراز الباركود قبل الدخول للقاعة
                                </p>
                                <a href="https://maps.app.goo.gl/2Xn223QxBuGwLgcN7?g_st=iw" target="_blank">
                                    اضغط هنا للموقع
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function handlePrintAndShare() {
            // Trigger the print dialog
            window.print();
        }

        // After the print dialog is closed, open WhatsApp with the invitation message
        window.onafterprint = function() {
            // Configure these values from your backend or hard-coded as needed
            const phoneNumber = "91171747"; // Phone number without country code; adjust if needed.
            const invitationName = "{{ $invitation->name }}";
            const message = encodeURIComponent(
                `دعوة\nبارك الله في قلبين على الحب الحلال قد إلتقو وأكرم الله شملاً بالمودة قد إلتأم\nيشرفنا ويسعدنا\nلدعوتكم لحضور حفل زفاف\n${invitationName}\nوبمشيئة الله تعالى\nيوم الاثنين (٧/٤/٢٠٢٥)\nقاعة الحزم / السيب / المعبيلة\nالساعه: ٨:٠٠ pm\nممنوع التصوير\nممنوع إصطحاب الأطفال\nملاحظة مهمة: الرجاء إبراز الباركود قبل الدخول للقاعة\nالموقع: https://maps.app.goo.gl/2Xn223QxBuGwLgcN7?g_st=iw`
            );

            // Create WhatsApp share link (ensure country code +968 is added if applicable)
            const whatsappUrl = `https://wa.me/+968${phoneNumber}?text=${message}`;

            // Open WhatsApp in a new tab
            window.open(whatsappUrl, '_blank');
        };
    </script>
</x-app-layout>
