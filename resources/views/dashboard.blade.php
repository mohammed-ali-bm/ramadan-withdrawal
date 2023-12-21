<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('الرئيسية') }}
        </h2>
    </x-slot>

    <div class="py-12 dir-rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
               
                    <div class="show-records-container">




                    @include('components.admin.sta-item', [
                        'label' => 'إجمالي البكجات',
                        'content' => $products_count,
                        'icon' => "fi fi-rr-store-alt"
                    ])

@include('components.admin.sta-item', [
    'label' => 'إجمالي المتاجر',
    'content' => $businesses_count,
    'icon' => "fi fi-rr-box-open"
])

@include('components.admin.sta-item', [
    'label' => 'إجمالي العروض',
    'content' => $offers_count,
    "icon" => "fi fi-rr-badge-percent"
])

                </div>

                <div class="dashborad-home-charts">
                    <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4  mt-10 md:p-6">
                        <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                          <div class="flex items-center">
                            <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
                                <i class="fi fi-rr-receipt w-6 h-6 text-gray-500 dark:text-gray-400"></i>

                            </div>
                            <div>
                              <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">12</h5>
                              <p class="text-sm font-normal text-gray-500 dark:text-gray-400">طلب جديد</p>
                            </div>
                          </div>
                          <div>
                    
                          </div>
                        </div>
                    
                    
                    
                        <div id="column-chart"></div>
                    
                          <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                            <div class="flex justify-between items-center pt-5">
                              <!-- Button -->
                              <button
                                id="dropdownDefaultButton"
                                data-dropdown-toggle="lastDaysdropdown"
                                data-dropdown-placement="bottom"
                                class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                                type="button">
                                في آخر 7 ايام
                    
                              </button>
                              <!-- Dropdown menu -->
                    
                              <Link
                                href="#"
                                class="uppercase text-sm font-semibold inline-flex items-center rounded-lg   dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                                عرض الطلبات
                                <svg class="w-2.5 h-2.5 ms-1.5 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                              </Link>
                            </div>
                          </div>
                      </div>
             
             
                
                      <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4  mt-10 md:p-6">
                        <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                          <div class="flex items-center">
                            <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
                                <i class="fi fi-rr-badge-percent w-6 h-6 text-gray-500 dark:text-gray-400"></i>

                            </div>
                            <div>
                              <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">12</h5>
                              <p class="text-sm font-normal text-gray-500 dark:text-gray-400">عرض تم إستخدامه</p>
                            </div>
                          </div>
                          <div>
                    
                          </div>
                        </div>
                    
                    
                    
                        <div id="column-chart2"></div>
                    
                          <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                            <div class="flex justify-between items-center pt-5">
                              <!-- Button -->
                              <button
                                id="dropdownDefaultButton"
                                data-dropdown-toggle="lastDaysdropdown"
                                data-dropdown-placement="bottom"
                                class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                                type="button">
                                في آخر 7 ايام
                    
                              </button>
                              <!-- Dropdown menu -->
                    
                              <Link
                                href="#"
                                class="uppercase text-sm font-semibold inline-flex items-center rounded-lg   dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                                عرض سجلات الإستخدام
                                <svg class="w-2.5 h-2.5 ms-1.5 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                              </Link>
                            </div>
                          </div>
                      </div>
             
                      <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4  mt-10 md:p-6">
                        <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                          <div class="flex items-center">
                            <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
                             <i class="fi fi-rr-store-alt w-6 h-6 text-gray-500 dark:text-gray-400"></i>
                            </div>
                            <div>
                              <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">12</h5>
                              <p class="text-sm font-normal text-gray-500 dark:text-gray-400">متجر مسجل</p>
                            </div>
                          </div>
                          <div>
                    
                          </div>
                        </div>
                    
                    
                    
                        <div id="column-chart3"></div>
                    
                          <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                            <div class="flex justify-between items-center pt-5">
                              <!-- Button -->
                              <button
                                id="dropdownDefaultButton"
                                data-dropdown-toggle="lastDaysdropdown"
                                data-dropdown-placement="bottom"
                                class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                                type="button">
                                في آخر 7 ايام
                    
                              </button>
                              <!-- Dropdown menu -->
                    
                              <Link
                                href="#"
                                class="uppercase text-sm font-semibold inline-flex items-center rounded-lg   dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                                عرض المتاجر
                                <svg class="w-2.5 h-2.5 ms-1.5 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                              </Link>
                            </div>
                          </div>
                      </div>
             
             
                
                
                
                    </div>
                  

                
                <div class=" mx-auto ">
                    <div class="py-8 pt-16">
                      <div>
                        <h2 class="text-2xl  leading-tight">الأنشطة التجارية الجديدة</h2>
                      </div>
                      
                      
                        @include('businesses.latest_table' , ['businesses' => $businesses])
                    </div>
                  </div>

                <div class=" mx-auto ">
                    <div class="py-8">
                      <div>
                        <h2 class="text-2xl  leading-tight">آخر  الطلبات</h2>
                      </div>
                      
                      
                        @include('orders.latest_table' , ['orders' => $orders])
                    </div>
                  </div>
                
                
                </div>

                </div>
            </div>
        </div>
 
</x-app-layout>
