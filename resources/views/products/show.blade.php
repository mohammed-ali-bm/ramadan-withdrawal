<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('منتج التخفيض :' . $product->name ) }}
        </h2>
    </x-slot>

    <div class="py-12 app-layout">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">




                    <div class="show-records-container">





                        @include('components.admin.show-record-item', [
                            'label' => 'معرف المنتج',
                            'content' => $product->id,
                        ])
                        @include('components.admin.show-record-item', [
                            'label' => 'إسم المنتج',
                            'content' => $product->name,
                        ])

                        @include('components.admin.show-record-item', [
                            'label' => 'معرف المنتج في المتجر',
                            'content' => $product->store_p_id,
                        ])

                    

                        @include('components.admin.show-record-item', [
                            'label' => 'إجمالي مرات الشراء',
                            'content' => $product->order_count . ' مرة ',
                        ])


                      


                        @include('components.admin.show-record-item', [
                            'label' => 'تاريخ الصلاحية',
                            'content' =>
                                ' <span class="badge badge-' .
                                ($product->expire_date < \Carbon\Carbon::today() ? 'inactive' : 'active') .
                                '">' .
                                $product->expire_date .
                                '</span>',
                        ])
                        @include('components.admin.show-record-item', [
                            'label' => 'حالة المنتج',
                            'content' =>
                                '<span
                                                                                                                                                                                                                                                                                    class="badge badge-' .
                                $product->status .
                                '"> ' .
                                __('all.' . $product->status) .
                                '</span>',
                        ])
                        @include('components.admin.show-record-item', [
                            'label' => 'خيارات',
                            'content' => view('products.table-options', ['product' => $product]),
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
                                        aria-controls="profile" aria-selected="false">الطلبات</button>
                                </li>
                                <li class="mr-2" role="presentation">
                                    <button
                                        class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2  dark:hover:text-gray-700 active"
                                        id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                                        aria-controls="dashboard" aria-selected="true">عروض المنتج</button>
                                </li>

                            </ul>
                        </div>
                        <div id="myTabContent">
                            <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800 hidden" id="profile"
                                role="tabpanel" aria-labelledby="profile-tab">
                                <p class="text-gray-500 dark:text-gray-400 text-sm"> @include('orders.table')
                                </p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800" id="dashboard" role="tabpanel"
                                aria-labelledby="dashboard-tab">
                                <p class="text-gray-500 dark:text-gray-400 text-sm">@include('offers.table')
                                </p>
                            </div>

                        </div>


                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
