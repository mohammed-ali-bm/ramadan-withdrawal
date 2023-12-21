
<x-splade-modal>
    <x-splade-form action="{{ route('offers.update', ['offer' => $offer]) }}" :default="$offer" method="PUT">
    
        <h1>تعديل  التخفيض {{ $offer->name }}</h1>
    
        <div class="input-item">
            <x-splade-select name="business_id" :options="$businesses" label="إختر النشاط التجاري" choices />
        </div>
        <div class="input-item">
            <x-splade-input name="name" label="عنوان التخفيض" placeholder="مثلاً تخفيض 20% إلى 50 ريال كحد اقصى" />
        </div>
        
        <div class="input-item">
            <x-splade-input name="business_due" type="number"  label="المبلغ المستحق" placeholder="المبلغ المستحق للنشاط عند عمل مسح لكود العميل" />
        </div>
    
        <div class="input-item">
            <x-splade-textarea name="description" label="وصف ( محتوى) العرض" placeholder="المحتوى الذي يظهر للمستخدمين و صاحب النشاط التجاري عند عمل مسح للكود"  autosize />
        </div>
    
    
    <div class="input-item">
            <x-splade-input name="expire_date" label="تاريخ إنتهاء العرض"  type="date" placeholder="التاريخ الذي ينتهي فيه العرض لهذا المتجر " />
        </div>
    
       
        <div class="input-item">
            <x-splade-submit label="تعديل" :spinner="true" class="primary-button" />
        </div>
    </x-splade-form>
    
    
    </x-splade-modal>