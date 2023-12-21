<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('المنتجات') }}
        </h2>
    </x-slot>

    <div class="py-12 app-layout">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <Link slideover href="{{ route('orders.create') }}" class=" primary-button  "><i
                        class="fi fi-rr-add"></i> إضافة طلب جديد
                    </Link>
                    @include('orders.table')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
