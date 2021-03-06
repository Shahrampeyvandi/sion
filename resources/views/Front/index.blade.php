@extends('Layout.Front')
@section('Title',$title)


@section('content')


@include('Includes.Front.DesktopSlider')
@include('Includes.Front.MobileSlider')

@include('Includes.Front.TopSlider')

@if (isset($newseries) && count($newseries))
<section class="movie-sections">
    <h3>
        تازه ترین سریال ها
    <a href="{{route('S.ShowMore')}}?c=new&type=serie">
            مشاهده همه
            <i class="fa fa-angle-left"></i>
        </a>
    </h3>
    <div class="swiper-container IranNews">
        <div class="swiper-wrapper">
            @foreach ($newseries as $serie)
            <div class="swiper-slide">
            @component('components.article',['model'=>$serie , 'ajax'=>1])
            @endcomponent
            </div>
            @endforeach

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
     @component('components.showDetail')
    @endcomponent
</section>
@endif


@if (isset($newmovies) && count($newmovies))
<section class="movie-sections">
    <h3>
        تازه ترین فیلم ها
    <a href="{{route('S.ShowMore')}}?c=new&type=serie">
            مشاهده همه
            <i class="fa fa-angle-left"></i>
        </a>
    </h3>
    <div class="swiper-container IranNews">
        <div class="swiper-wrapper">
            @foreach ($newmovies as $serie)
            <div class="swiper-slide">
            @component('components.article',['model'=>$serie , 'ajax'=>1])
            @endcomponent
            </div>
            @endforeach

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
     @component('components.showDetail')
    @endcomponent
</section>
@endif

@if (isset($latestdoble) && count($latestdoble))
<section class="movie-sections">
    <h3>
        دوبله فارسی
    <a href="{{route('S.ShowMore')}}?c=doble&type=serie">
            مشاهده همه
            <i class="fa fa-angle-left"></i>
        </a>
    </h3>
    <div class="swiper-container IranNews">
        <div class="swiper-wrapper">
            @foreach ($latestdoble as $post)
            <div class="swiper-slide">
                @component('components.article',['model'=>$post , 'ajax'=>1])
            @endcomponent
            </div>
            @endforeach

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <div class="movie-detail-show_index"
        style=" background: url('../images/آقازاده.jpg') no-repeat;    background-size: contain;">
        <div class="details_movie_index">
            <div class="cover-movie-detail_index"></div>
            <a>
                <h1>
                    دل
                </h1>
                <div class="desc mt-2 w-50">
                    توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات
                    توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات
                </div>
                <div>
                    <a href="#" class="page-movie-play btn--ripple mr-0 mt-5">
                        <i class="fa fa-play"></i>
                        پخش فیلم
                    </a>
                    <a href="./moviePage.html" class="more-detail-movie btn--ripple">
                        <i class="fa fa-exclamation"></i>
                        توضیحات بیشتر
                    </a>
                </div>
                <h6>
                    ستارگان:
                    <a href="#">
                        ستاره 1
                    </a>
                </h6>
                <h6>
                    دسته بندی:
                    <a href="#">
                        دسته بندی 1 -
                    </a>
                </h6>
            </a>
        </div>
    </div>
</section>
@endif



@if (isset($newyear) &&  count($newyear))
<section class="movie-sections">
    <h3>
        جدیدترین فیلم های {{$year}}
    <a href="{{route('S.ShowMore')}}?c={{$year}}&type=all">
            مشاهده همه
            <i class="fa fa-angle-left"></i>
        </a>
    </h3>
    <div class="swiper-container IranNews">
        <div class="swiper-wrapper">
            @foreach ($newyear as $post)
            <div class="swiper-slide">
            @component('components.article',['model'=>$post , 'ajax'=>1])
            @endcomponent
            </div>
            @endforeach

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <div class="movie-detail-show_index"
        style=" background: url('../images/آقازاده.jpg') no-repeat;    background-size: contain;">
        <div class="details_movie_index">
            <div class="cover-movie-detail_index"></div>
            <a>
                <h1>
                    دل
                </h1>
                <div class="desc mt-2 w-50">
                    توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات
                    توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات
                </div>
                <div>
                    <a href="#" class="page-movie-play btn--ripple mr-0 mt-5">
                        <i class="fa fa-play"></i>
                        پخش فیلم
                    </a>
                    <a href="./moviePage.html" class="more-detail-movie btn--ripple">
                        <i class="fa fa-exclamation"></i>
                        توضیحات بیشتر
                    </a>
                </div>
                <h6>
                    ستارگان:
                    <a href="#">
                        ستاره 1
                    </a>
                </h6>
                <h6>
                    دسته بندی:
                    <a href="#">
                        دسته بندی 1 -
                    </a>
                </h6>
            </a>
        </div>
    </div>
</section>
@endif


@endsection

