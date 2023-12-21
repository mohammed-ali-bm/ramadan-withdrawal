<x-splade-table :for="$businesses">
    <x-slot:empty-state>
        <p class="error-message"> لا توجد انشطة تجارية مضافة بعد</p>
    </x-slot>


    <x-splade-cell logo as="$business">
        <img src="{{ asset('images/' . $business->logo) }}" alt="{{ $business->name }}" class="table-thubmnail">
    </x-splade-cell>

    <x-splade-cell status as="$business">
        <span class="badge badge-{{ $business->status }}">{{ __('all.' . $business->status) }}</span>
    </x-splade-cell>
    <x-splade-cell actions as="$business">
        @include('businesses.table-options')







    </x-splade-cell>
</x-splade-table>
