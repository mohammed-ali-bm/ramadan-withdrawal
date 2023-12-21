<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
    <div
      class="inline-block min-w-full shadow-md rounded-lg overflow-hidden"
    >
      <table class="min-w-full leading-normal">
        <thead>
          <tr>

            <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider"
          >
            #
          </th>
            <th
              class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider"
            >
              إسم العميل
            </th>
         
            <th
              class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider"
            >
            البكج
            </th>
         
            <th
              class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider"
            >
            تاريخ الطلب
            </th>
            <th
              class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider"
            >
              الحالة
            </th>
            <th
              class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"
            ></th>
          </tr>
        </thead>
        <tbody>
      
                @foreach ($orders as $order)
                <tr>

                  <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap">{{ $order->id }}</p>
                  </td>
                    <td class="px-5 py-5 border-b  border-gray-200 bg-white text-sm">
                      <div class="flex">
                     
                        <div class="mr-3">
                          <p class="text-gray-900 whitespace-no-wrap">
                            {{ $order->username  }}
                          </p>
                          <p class="text-gray-600 whitespace-no-wrap">{{ $order->mobile  }}</p>
        
                          
                        </div>
                      </div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                      <p class="text-gray-900 whitespace-no-wrap">{{ $order->product->name }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                      <p class="text-gray-900 whitespace-no-wrap">{{ $order->created_at->format("Y-m-d") }}</p>
                      <p class="text-gray-600 whitespace-no-wrap">{{ $order->created_at->diffForHumans()  }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <span class="badge badge-{{ $order->status }}">{{ __('all.' . $order->status) }}</span>
                    </td>

                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                      <Link slideover class="action-icon  tooltip-trigger" data-tooltip-target="tooltip-view" 
    href="{{ route('orders.show', ['order' => $order]) }}"><i class="fi fi-rr-globe"></i></Link>

                  </td>


                 
                  </tr>
                @endforeach
         
        </tbody>
      </table>
    </div>
  </div>