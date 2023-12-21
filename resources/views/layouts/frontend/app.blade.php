<div class="animated-bg dir-rtl">
    <div class="shape-1"></div>
    <div class="shape-2"></div>
    <div class="shape-3"></div>


   
</div>

<div class="content dir-rtl">


    <div class="intro-wrapper">    <div class="site-header">
        <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="front-logo">
        <nav class="site-nav">
            <ul>
                <li><a href="">الرئيسية</a></li>
                <li><a href="">من نحن</a></li>
                <li><a href="">اتصل بنا</a></li>
                <li><a href="{{ route('login') }}">تسجيل الدخول</a></li>
                <li><a href="{{ route('register') }}">انشاء حساب</a></li>
            </ul>
        </nav>
    </div>


    @yield('content')





    @yield('footer-js')
    <footer>
        <img src="{{ asset('assets/images/logo-white.png') }}" alt="logo" class="footer-logo">

        <ul>
            <li>سياسة الخصوصية</li>
            <li>شروط اللإستخدام</li>
            <li>تواصل معنا</li>
        </ul>
    </footer>
</div>