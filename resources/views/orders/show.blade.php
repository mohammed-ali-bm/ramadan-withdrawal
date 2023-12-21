<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('تفاصيل  الطلب  #' . $order->id ) }}
        </h2>
    </x-slot>

    <div class="py-12 app-layout">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">




                    <div class="show-records-container">





                        @include('components.admin.show-record-item', [
                            'label' => 'رقم الطلب',
                            'content' => $order->id,
                        ])

                        @include('components.admin.show-record-item', [
                            'label' => 'رقم الطلب في سلة ',
                            'content' => $order->store_order_id,
                        ])
                        @include('components.admin.show-record-item', [
                            'label' => 'إسم العميل',
                            'content' => $order->username,
                        ])
                        @include('components.admin.show-record-item', [
                            'label' => 'جوال العميل',
                            'content' => $order->mobile,
                        ])

                   
                        @include('components.admin.show-record-item', [
                            'label' => 'ايميل العميل',
                            'content' => $order->email,
                        ])

                   



@include('components.admin.show-record-item', [
    'label' => 'تم إرسال رسالة  الكود للعميل',
    'content' =>
        '<span
                                                                                                                                                                                                                                                                                    class="badge badge-' .
        ($order->sms_sent ? "active" : "inactive") .
        '"> ' .
        __(  ($order->sms_sent ? "نعم" : "لا")) .
        '</span>',
])

                     
                        @include('components.admin.show-record-item', [
                            'label' => 'حالة الطلب',
                            'content' =>
                                '<span
                                                                                                                                                                                                                                                                                                            class="badge badge-' .
                                $order->status .
                                '"> ' .
                                __('all.' . $order->status) .
                                '</span>',
                        ])
                        @include('components.admin.show-record-item', [
                            'label' => 'خيارات',
                            'content' => view('orders.table-options', ['order' => $order]),
                        ])




                    </div>

                    <!-- This is an example component -->
                    <div class=" mx-auto tab-container">

                        <div class="border-b border-gray-200 dark:border-gray-700 mb-4">
                            <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent"
                                role="tablist">
                                <li class="mr-2" role="presentation">
                                    <button
                                        class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2  dark:hover:text-gray-700"
                                        id="profile-tab" data-tabs-target="#profile" type="button" role="tab"
                                        aria-controls="profile" aria-selected="false">العروض الخاصة بالطلب</button>
                                </li>
                              

                            </ul>
                        </div>
                        <div id="myTabContent">
                            <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800 hidden" id="profile"
                                role="tabpanel" aria-labelledby="profile-tab">
                                @include('items.table')
                            </div>
                         

                        </div>


                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
