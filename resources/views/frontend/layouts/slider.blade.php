<!-- slider-area-start -->
<div class="slider-area light-bg-s pt-60">
    <div class="container custom-conatiner">
        <div class="row">
            <!-- slider lớn -area-start -->
            <div class="col-xl-7">
                <div class="swiper-container slider__active pb-30">
                    <div class="slider-wrapper swiper-wrapper">
{{--                        @foreach($banners as $key => $banner)--}}
{{--                            <div class="single-slider swiper-slide b-radius-2 slider-height-2 d-flex align-items-center" data-background="{{asset('frontend')}}/img/slider/02-slide-3.jpg">--}}
{{--                                <div class="slider-content slider-content-2">--}}
{{--                                    <h2 data-animation="fadeInLeft" data-delay="1.7s" class="pt-15 slider-title pb-5">{{$banner->title}}</h2>z--}}

{{--                                    <a data-animation="fadeInUp" data-delay="1.9s" href="shop.html" class="st-btn-border b-radius-2">Discover now</a>--}}
{{--                                </div>--}}
{{--                            </div><!-- /single-slider -->--}}
{{--                        @endforeach--}}

                        @foreach($banners as $key => $banner)
                            <div class="single-slider swiper-slide b-radius-2 slider-height-2 d-flex align-items-center">
                                <div class="banner__img single-slider swiper-slide b-radius-2 slider-height-2 d-flex align-items-center" href="{{ route('banner-detail', ['slug' =>$banner->slug]) }}">
                                    <a href="{{ route('banner-detail', ['slug' =>$banner->slug]) }}"><img src="
                                                                            @if($banner->image && file_exists(public_path($banner->image)))
                                                                                {{ asset($banner->image) }}
                                                                            @else
                                                                                {{ asset('frontend\img\slider\02-slide-3.jpg') }}
                                                                            @endif
                                                                            " width="990px" height="420px" title="{{$banner->name}}" alt="{{$banner->title}}"></a>
                                </div>
                                <div class="banner__content banner__content-2">
{{--                                    <h6 data-animation="fadeInLeft" data-delay="1.5s" class="pt-15 slider-title pb-5" style="color: #0b0b0b"><a href="#">{{$banner->title}}</a></h6>--}}
                                    <a data-animation="fadeInUp" data-delay="1.8s" href="{{ route('banner-detail', ['slug' =>$banner->slug]) }}"  class="st-btn-border b-radius-2" style="color: #0b0b0b">Khám phá thôi >></a>
                                </div>

                            </div><!-- /single-slider -->
                        @endforeach

                        <div class="main-slider-paginations"></div>
                    </div>
                </div>
            </div>
            <!-- slider lớn-area-end -->

            <!-- 4 slider nhỏ -area-start -->
            <div class="col-xl-5">
                <div class="row">
                    @foreach($CategoryType1 as $type1)
                        <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="banner__item p-relative w-img mb-30">
                            <div class="banner__img b-radius-2">
                                <a href="{{ route('category', ['category' => $type1->slug ]) }}"><img src="
                                                                            @if($type1->image && file_exists(public_path($type1->image)))
                                                                                {{ asset($type1->image) }}
                                                                            @else
                                                                                {{ asset('frontend')}}/img/banner/banner-11.jpg }}
                                                                            @endif
                                                                            " width="330px" height="200px" title="{{$type1->name}}" alt="{{$type1->name}}"></a>
                            </div>
                            <div class="banner__content banner__content-2">
                                <h6><a href="{{ route('category', ['category' => $type1->slug ]) }}">{{$type1->name}}</a></h6>
                            </div>
                        </div>
                    </div>
                    @endforeach
{{--                    <div class="col-xl-6 col-lg-6 col-md-6">--}}
{{--                        <div class="banner__item p-relative w-img mb-30">--}}
{{--                            <div class="banner__img b-radius-2">--}}
{{--                                <a href="product-details.html"><img src="{{asset('frontend')}}/img/banner/banner-11.jpg" alt=""></a>--}}
{{--                            </div>--}}
{{--                            <div class="banner__content banner__content-2">--}}
{{--                                <h6><a href="product-details.html">Phone <br> Galaxy S20</a></h6>--}}
{{--                                <p>Cellphone & Tablets</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-6 col-lg-6 col-md-6">--}}
{{--                        <div class="banner__item p-relative w-img mb-30">--}}
{{--                            <div class="banner__img b-radius-2">--}}
{{--                                <a href="product-details.html"><img src="{{asset('frontend')}}/img/banner/banner-13.jpg" alt=""></a>--}}
{{--                            </div>--}}
{{--                            <div class="banner__content banner__content-2">--}}
{{--                                <h6><a href="product-details.html">Galaxy <br> Buds Plus</a></h6>--}}
{{--                                <p>Headphone & Audio</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-6 col-lg-6 col-md-6">--}}
{{--                        <div class="banner__item p-relative w-img mb-30">--}}
{{--                            <div class="banner__img b-radius-2">--}}
{{--                                <a href="product-details.html"><img src="{{asset('frontend')}}/img/banner/banner-12.jpg" alt=""></a>--}}
{{--                            </div>--}}
{{--                            <div class="banner__content banner__content-2">--}}
{{--                                <h6><a href="product-details.html">Chair <br>Swoon Lounge</a></h6>--}}
{{--                                <p>Headphone & Audio</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
            <!-- 4 slider nhỏ -area-end -->
        </div>
    </div>
</div>
<!-- slider-area-end -->
