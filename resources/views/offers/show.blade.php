<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('عرض التخفيض :' . $offer->name ." - " . $offer->business->name) }}
        </h2>
    </x-slot>

    <div class="py-12 app-layout">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">




                    <div class="show-records-container">





                        @include('components.admin.show-record-item', [
                            'label' => 'معرف العرض',
                            'content' => $offer->id,
                        ])
                        @include('components.admin.show-record-item', [
                            'label' => 'إسم المتجر',
                            'content' => $offer->business->name,
                        ])

                        @include('components.admin.show-record-item', [
                            'label' => 'محتوى العرض',
                            'content' => $offer->description,
                        ])

                        @include('components.admin.show-record-item', [
                            'label' => 'مستحقات النشاط التجاري من كل إستخدام',
                            'content' => $offer->business_due . ' ريال ',
                        ])

                        @include('components.admin.show-record-item', [
                            'label' => 'إجمالي مرات الإستخدام من المستخدمين',
                            'content' => $offer->id . ' مرة ',
                        ])


                        @include('components.admin.show-record-item', [
                            'label' => 'إجمالي مرات الإستخدام في المنتجات',
                            'content' => $offer->id . ' مرة ',
                        ])


                        @include('components.admin.show-record-item', [
                            'label' => 'تاريخ الصلاحية',
                            'content' => ' <span class="badge badge-'. ( $offer->expire_date < \Carbon\Carbon::today() ? "inactive" : "active") .'">'.  $offer->expire_date .'</span>',
                        ])
                        @include('components.admin.show-record-item', [
                            'label' => 'حالة العرض',
                            'content' =>
                                '<span
                                                                                                                                                                                                                                    class="badge badge-' .
                                $offer->status .
                                '"> ' .
                                __('all.' . $offer->status) .
                                '</span>',
                        ])
                        @include('components.admin.show-record-item', [
                            'label' => 'خيارات',
                            'content' => view('offers.table-options', ['offer' => $offer]),
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
                                        aria-controls="profile" aria-selected="false">سجلات إستخدام العرض</button>
                                </li>
                                <li class="mr-2" role="presentation">
                                    <button
                                        class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2  dark:hover:text-gray-700 active"
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
