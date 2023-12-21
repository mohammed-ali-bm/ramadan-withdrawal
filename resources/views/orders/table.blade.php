<x-splade-table :for="$orders">
    <x-slot:empty-state>
        <p class="error-message"> لا توجد منتجات مضافة بعد</p>
    </x-slot>


    <x-splade-cell logo as="$order">
        <img src="{{ asset('images/' . $order->logo) }}" alt="{{ $order->name }}" class="table-thubmnail">
    </x-splade-cell>

    <x-splade-cell expiry_date as="$order">
        <span
            class="badge badge-{{ $order->expire_date < \Carbon\Carbon::today() ? 'inactive' : 'active' }}">{{ $order->expire_date }}</span>
    </x-splade-cell>

    <x-splade-cell status as="$order">
        <span class="badge badge-{{ $order->status }}">{{ __('all.' . $order->status) }}</span>
    </x-splade-cell>
    <x-splade-cell actions as="$order">
        @include('orders.table-options')







    </x-splade-cell>
</x-splade-table>
