<x-splade-table :for="$offers">
    <x-slot:empty-state>
        <p class="error-message"> لا توجد عروض للانشطة التجارية مضافة بعد</p>
    </x-slot>


    <x-splade-cell logo as="$offer">
        <img src="{{ asset('images/' . $offer->logo) }}" alt="{{ $offer->name }}" class="table-thubmnail">
    </x-splade-cell>

    <x-splade-cell expiry_date as="$offer">
        <span class="badge badge-{{ $offer->expire_date < \Carbon\Carbon::today() ? "inactive" : "active" }}">{{  $offer->expire_date }}</span>
    </x-splade-cell>

    <x-splade-cell status as="$offer">
        <span class="badge badge-{{ $offer->status }}">{{ __('all.' . $offer->status) }}</span>
    </x-splade-cell>
    <x-splade-cell actions as="$offer">
        @include('offers.table-options')







    </x-splade-cell>
</x-splade-table>
