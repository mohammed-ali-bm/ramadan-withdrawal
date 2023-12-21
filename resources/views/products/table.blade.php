<x-splade-table :for="$products">
    <x-slot:empty-state>
        <p class="error-message"> لا توجد  منتجات  مضافة بعد</p>
    </x-slot>


    <x-splade-cell logo as="$product">
        <img src="{{ asset('images/' . $product->logo) }}" alt="{{ $product->name }}" class="table-thubmnail">
    </x-splade-cell>

    <x-splade-cell expiry_date as="$product">
        <span
            class="badge badge-{{ $product->expire_date < \Carbon\Carbon::today() ? 'inactive' : 'active' }}">{{ $product->expire_date }}</span>
    </x-splade-cell>

    <x-splade-cell status as="$product">
        <span class="badge badge-{{ $product->status }}">{{ __('all.' . $product->status) }}</span>
    </x-splade-cell>
    <x-splade-cell actions as="$product">
        @include('products.table-options')







    </x-splade-cell>
</x-splade-table>
