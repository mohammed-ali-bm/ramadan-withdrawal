<x-splade-modal>
    <x-splade-form action="{{ route('items.update', ['item' => $item]) }}" :default="$item" method="PUT">

        <h1>تعديل المنتج : {{ $item->name }}</h1>

        <div class="input-item">
            <x-splade-select name="offers_ids" :options="$offers" label="إختر  العروض الخاصة بالمنتج" choices multiple />
        </div>

        <div class="input-item">
            <x-splade-input name="store_p_id" label="معرف المنتج في  سلة"
                placeholder="المعرف الخاص بالمنتج  الذي يرسل من خلال ال webhook" />
        </div>

        <div class="input-item">
            <x-splade-input name="name" label="عنوان المنتج" placeholder="مثلاً جدول شهر نوفمبر " />
        </div>

        <div class="input-item">
            <x-splade-input name="price" type="number" label="سعر المنتج" placeholder="سعر المنتج في سلة" />
        </div>



        <div class="input-item">
            <x-splade-input name="expire_date" label="تاريخ إنتهاء  صلاحية المنتج" type="date"
                placeholder="التاريخ الذي ينتهي فيه المنتج  " />
        </div>


        <div class="input-item">
            <x-splade-submit label="تعديل" :spinner="true" class="primary-button" />
        </div>
    </x-splade-form>


</x-splade-modal>
