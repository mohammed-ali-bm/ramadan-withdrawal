@extends('layouts.frontend.app')

@section('content')
   

    <div class="site-intro">

        <div class="intro-content">
            <h1>متجر دن</h1>
            <h3>عروض و خصومات حصرية للعميل و تسويق غير محدود  للانشطة التجارية</h3>
            <div class="hero-link">
                <Link class="main-button">سجل نشاطك</Link>
                <Link class="secondary-button">تصفح المتجر</Link>
            </div>
        </div>
    </div>

</div>

    <div class="sta-container">



        <div class="sta-item">

            <i class="fi fi-rr-store-alt"></i>
            <div>
                <p>20</p>
                <h4>متجر مسجل لدينا</h4>
            </div>
        </div>


        <div class="sta-item">

            <i class="fi fi-rr-users"></i>
            <div>
                <p>400</p>
                <h4>عميل</h4>
            </div>
        </div>

        <div class="sta-item">

            <i class="fi fi-rr-badge-percent"></i>
            <div>
                <p>1200</p>
                <h4>عرض تم الإستفادة منه</h4>
            </div>
        </div>

    </div>


    <div class="how-it-works">

        <h2 class="main-title">كيف يعمل دن؟</h2>

        <div class="how-it-works-content">

            <div class="content">

                <div class="inst-item">
                    <p>1</p>
                    <h4>قم بتقديم طلبك و تعبئة بياناتك</h4>
                </div>

                <div class="inst-item">
                    <p>2</p>
                    <h4>سنقوم بمراجعة الطلب و المواققة عليه</h4>
                </div>

                <div class="inst-item">
                    <p>3</p>
                    <h4>سنضيف العرض الخاص بك في احد باقاتنا</h4>
                </div>

                <div class="inst-item">
                    <p>4</p>
                    <h4>احصل على عملاء جدد بدون اي مجهود </h4>
                </div>

            </div>

            <div class="img">
                    {{-- load the svg file --}}

                    <img src="{{ asset('assets/images/how.svg') }}" alt="كيف يعمل دن ">
            </div>
        </div>
    </div>





    <div class="clients-container">


        <h2 class="main-title">عملاء نفتخر بهم</h2>
                <div class="clients-carousel">
                @foreach ($businesses as $business)
                    <img src="{{ asset('images/' . $business->logo) }}" alt="{{ $business->name }}" class="client-logo">
                @endforeach
            </div>
    </div>


    @endsection
