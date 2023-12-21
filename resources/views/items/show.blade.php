<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('منتج التخفيض :' . $item->name . ' - ' . $item->business->name) }}
        </h2>
    </x-slot>

    <div class="py-12 app-layout">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white bitem-b bitem-gray-200">




                    <div class="show-records-container">





                        @include('components.admin.show-record-item', [
                            'label' => 'معرف المنتج',
                            'content' => $item->id,
                        ])
                        @include('components.admin.show-record-item', [
                            'label' => 'إسم المتجر',
                            'content' => $item->business->name,
                        ])

                        @include('components.admin.show-record-item', [
                            'label' => 'محتوى المنتج',
                            'content' => $item->description,
                        ])

                        @include('components.admin.show-record-item', [
                            'label' => 'مستحقات النشاط التجاري من كل إستخدام',
                            'content' => $item->business_due . ' ريال ',
                        ])

                        @include('components.admin.show-record-item', [
                            'label' => 'إجمالي مرات الإستخدام من المستخدمين',
                            'content' => $item->id . ' مرة ',
                        ])


                        @include('components.admin.show-record-item', [
                            'label' => 'إجمالي مرات الإستخدام في المنتجات',
                            'content' => $item->id . ' مرة ',
                        ])


                        @include('components.admin.show-record-item', [
                            'label' => 'تاريخ الصلاحية',
                            'content' =>
                                ' <span class="badge badge-' .
                                ($item->expire_date < \Carbon\Carbon::today() ? 'inactive' : 'active') .
                                '">' .
                                $item->expire_date .
                                '</span>',
                        ])
                        @include('components.admin.show-record-item', [
                            'label' => 'حالة المنتج',
                            'content' =>
                                '<span
                                                                                                                                                                                                                                                                                                                                    class="badge badge-' .
                                $item->status .
                                '"> ' .
                                __('all.' . $item->status) .
                                '</span>',
                        ])
                        @include('components.admin.show-record-item', [
                            'label' => 'خيارات',
                            'content' => view('items.table-options', ['item' => $item]),
                        ])




                    </div>

                    <!-- This is an example component -->
                    <div class=" mx-auto tab-container">

                        <div class="bitem-b bitem-gray-200 dark:bitem-gray-700 mb-4">
                            <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent"
                                role="tablist">
                                <li class="mr-2" role="presentation">
                                    <button
                                        class="inline-block text-gray-500 hover:text-gray-600 hover:bitem-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center bitem-transparent bitem-b-2  dark:hover:text-gray-700"
                                        id="profile-tab" data-tabs-target="#profile" type="button" role="tab"
                                        aria-controls="profile" aria-selected="false">سجلات إستخدام المنتج</button>
                                </li>
                                <li class="mr-2" role="presentation">
                                    <button
                                        class="inline-block text-gray-500 hover:text-gray-600 hover:bitem-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center bitem-transparent bitem-b-2  dark:hover:text-gray-700 active"
                                        id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                                        aria-controls="dashboard" aria-selected="true">المنتجات</button>
                                </li>

                            </ul>
                        </div>
                        <div id="myTabContent">
                            <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800 hidden" id="profile"
                                role="tabpanel" aria-labelledby="profile-tab">
                                <p class="text-gray-500 dark:text-gray-400 text-sm">محتوى الطلبات
                                </p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800" id="dashboard" role="tabpanel"
                                aria-labelledby="dashboard-tab">
                                <p class="text-gray-500 dark:text-gray-400 text-sm">محتوى العروض
                                </p>
                            </div>

                        </div>


                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
