<x-splade-table :for="$items">
    <x-slot:empty-state>
        <p class="error-message"> لا توجد منتجات مضافة بعد</p>
    </x-slot>


    <x-splade-cell logo as="$item">
        <img src="{{ asset('images/' . $item->logo) }}" alt="{{ $item->name }}" class="table-thubmnail">
    </x-splade-cell>

    <x-splade-cell expire_date as="$item">
        <span
            class="{{ $item->expire_date < \Carbon\Carbon::today() ? 'badge badge-inactive' : '' }}">{{ $item->expire_date }}</span>
    </x-splade-cell>


    <x-splade-cell status as="$item">
        <span class="badge badge-{{ $item->status }}">{{ __('all.' . $item->status) }}</span>
    </x-splade-cell>
    <x-splade-cell actions as="$item">
        @include('items.table-options')







    </x-splade-cell>
</x-splade-table>
