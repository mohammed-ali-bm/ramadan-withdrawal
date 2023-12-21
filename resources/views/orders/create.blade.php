<x-splade-modal>
    <x-splade-form>

        <h1>إضافة طلب  جديد</h1>

        <div class="input-item">
            <x-splade-select name="product_id" :options="$products" label="إختر  البكج " choices  />
        </div>

        <div class="input-item">
            <x-splade-input name="store_order_id" label="معرف الطلب في  سلة" placeholder="رقم الطلب في سلة" />
        </div>

        <div class="input-item">
            <x-splade-input name="username" label="إسم العميل" placeholder=" " />
        </div>

        <div class="input-item">
            <x-splade-input  type="number" name="mobile" label="رقم الجوال" placeholder=" " />
        </div>

        <div class="input-item">
            <x-splade-input name="email" label="البريد الإلكتروني" type="email"  placeholder=" " />
        </div>

      


        <div class="input-item">
            <x-splade-submit label="إضافة" :spinner="true" class="primary-button" />
        </div>
    </x-splade-form>


</x-splade-modal>
