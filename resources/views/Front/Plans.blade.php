@extends('Layout.Front')
@section('Title',$title)

@section('content')
    <a href="{{route('MainUrl')}}" class="logo-float-right">
    LOGO
</a>
<div class="buy-sharing-plan">
<form action="{{route('S.BuyPlan')}}" method="post">
        @csrf
        <input type="hidden" id="plan_name" name="plan_name" value="">
        <div class="buy-sharing-plan-box">
        <button id="close_buy-plan-box">
            <i class="fa fa-times"></i>
        </button>
        <h1>

        </h1>
        <div class="price-box">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8">
                        <div class="price-plan-title">
                            قیمت:
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="price-plan_price"></div>
                    </div>
                    <div class="col-8">
                        <div class="off-plan-title">
                            جمع تخفیف:
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="off-plan_price"></div>
                    </div>
                    <div class="col-8">
                        <div class="VAT-title">
                            مالیات بر ارزش افزوده:
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="VAT_price"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="off-box">
            <h2>
                کد تخفیف
            </h2>
            <p>
                لطفا کد تخفیف خود را وارد کنید و دکمه ثبت کد تخفیف را بزنید.
            </p>
            <div class="input-place">
               
                    <input id="off_code" name="offCode" autocomplete="off">
                    <label for="off_code">
                        کد تخفیف
                    </label>
                <a id="submit-off_code" onclick="checkTakhfif(event,'{{route('checkTakhfif')}}')" class="btn--ripple text-center">
                        ثبت کد تخفیف
                </a>
                
            </div>
        </div>
        <div class="pay-box">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8 text-right">
                        مبلغ قابل پرداخت:
                    </div>
                    <div class="col-4 text-left">
                        <span id="pay_price"></span>
                    </div>
                </div>
            </div>
            <button id="pay_price_btn" class="btn--ripple">
                پرداخت آنلاین
            </button>
        </div>
    </div>
    </form>
</div>
<section class="site-sharing-body">
    <h1 class="site-sharing-body-title">
        خرید اشتراک سایت
        {{-- <a href="login_register.html">
            ورود
        </a> --}}
    </h1>
    <a class="header-link-sharing" href="#">
        <img src="assets/images/sharing_page/p1.jpg" alt="">
    </a>
    <div class="plans">
       @foreach ($plans as $item)
             <div class="plan-box">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3">
                    <p class="plan-length">{{$item->name}}</p>
                    </div>
                    <div class="col-3">
                        <p class="plan-price">
                            {{$item->price}} تومان
                        </p>
                    </div>
                    <div class="col-3">
                        <p class="after-off">
                            {{$item->priceWithDiscount()}} تومان
                        </p>
                    </div>
                    <div class="col-3">
                    <a class="choosePlane" data-id="{{$item->id}}" href="#">
                            انتخاب
                        </a>
                    </div>
                </div>
            </div>
        </div>
       @endforeach
       
    </div>
    <p class="text-sharing-page-head">
        به مبالغ فوق ۹٪ بابت مالیات بر ارزش افزوده اضافه می‌شود.
    </p>
<div id="editor1" contenteditable="true">
        <div class="plans">
        <h1 class="title-gift">
            هدیه سایت
        </h1>
        <form action="#" method="post">
            <div class="input-place">
                <input type="text" id="gift-code" name="gift_code" required>
                <label for="gift-code">
                    کد کارت هدیه
                </label>
                <button class="submit_register btn--ripple">
                    ثبت
                </button>
                <p class="note">
                    در صورتیکه دارای کد خریداری شده از مای شاتل هستید، در این قسمت وارد نمایید.
                </p>
                <p class="note">
                    در صورتیکه دارای کد تخفیف هستید، ابتدا اشتراک مورد نظر خود را انتخاب کرده و سپس در قسمت کد تخفیف، کد
                    خود را وارد نمایید.
                </p>
            </div>
        </form>
    </div>
    <p class="text-sharing-page-head">
        با خرید اشتراک نماوا، به امکانات بی نظیر زیر دسترسی خواهید داشت:
        <span class="note">
            تماشای نامحدود هزاران فیلم و سریال و انیمیشن جذاب نماوا در طول مدت اشتراک خریداری شده.
        </span>
        <span class="note">
            حجم اینترنت رایگان در زمان تماشای فیلم ( در صورتیکه اینترنت شما، یکی از شرکت های تحت قرارداد با نماوا باشد)
        </span>
        <span class="note">
            امکان دانلود درون برنامه ای تمامی محتواهای نماوا و تماشای آن در زمانیکه دسترسی به اینترنت ندارید.
        </span>
    </p>
    <div class="plans infoPlan">
        <a href="#">
            <h1>
                <i class="fa fa-exclamation-triangle"></i>
                شرایط محاسبه ترافیک مصرفی شما در وب‌سایت و اپلیکیشن نماوا تغییر کرده است.
            </h1>
            <p>
                سپاس‌گزار خواهیم بود اگر برای اطلاع از شرایط جدید محاسبه‌ی ترافیک مصرفی و حجم اینترنت در هنگام تماشای
                فیلم از نماوا، به صفحه اپراتورها مراجعه فرمایید.
            </p>
            <i class="fa fa-angle-left"></i>
        </a>
    </div>
    <p class="text-sharing-page-head">
        کاربران خارج از ایران با خرید اشتراک نماوا، تنها به فیلم های ایرانی دسترسی خواهند داشت. تماشای فیلم های خارجی
        تنها برای کاربران داخل ایران امکان پذیر است.
    </p>
    <div class="plans support">
        <h1>
            هفت روز هفته، ۲۴ ساعت شبانه‌روز پاسخگوی شما هستیم.
        </h1>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <p class="support-info">
                        شماره تماس: 021-00000000
                    </p>
                </div>
                <div class="col-6">
                    <p class="support-info">
                        ایمیل: support@site
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection

