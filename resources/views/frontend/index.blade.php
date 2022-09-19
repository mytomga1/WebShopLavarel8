@extends('frontend.layouts.main')

@section('content')

    <!-- slider-area-start -->
    @include('frontend.layouts.slider')
    <!-- slider-area-end -->

    <!-- trending-product-area-start -->
    @foreach($list as $item)
        <section class="trending-product-area light-bg-s pt-25 pb-15">
            <div class="container custom-conatiner">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section__head d-flex justify-content-between mb-30">
                            <div class="section__title section__title-2">
                                <h3 class="st-titile">{{ $item['category']->name }}</h3>
                            </div>
                            <div class="button-wrap button-wrap-2">
                                <a href="{{ route('category', ['category' => $item['category']->slug ]) }}">Tất cả sản phẩm <i class="fal fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($item['products'] as $product)
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2">
                        <div class="product__item product__item-2 b-radius-2 mb-20">
                            <div class="product__thumb fix">
                                <div class="product-image w-img">
                                    <a href="{{ route('product', ['product' => $product->slug]) }}">
                                        <img src=" @if($product->image && file_exists(public_path($product->image)))
                                                       {{ asset($product->image) }}
                                                   @else
                                                       {{ asset('frontend\img\product\tp-2.jpg') }}
                                                   @endif
                                        " width="237px" height="237px" alt="product">
                                    </a>
                                </div>
                                <div class="product__offer">
                                    <span class="discount">0%</span>
                                </div>
                                <div class="product-action product-action-2">
                                    <a href="{{ route('product', ['product' => $product->slug]) }}" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                        <i class="fal fa-eye"></i>
                                        <i class="fal fa-eye"></i>
                                    </a>
                                    <a href="#" class="icon-box icon-box-1">
                                        <i class="fal fa-heart"></i>
                                        <i class="fal fa-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product__content product__content-2">
                                <h6><a href="{{ route('product', ['product' => $product->slug]) }}">{{ $product->name }}</a></h6>
                                <br/>

                                <!-- chức năng ratting-product-area-start -->
{{--                                <div class="rating mb-5 mt-10">--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                    <span>(01 review)</span>--}}
{{--                                </div>--}}
                                <!-- chức năng ratting-product-area-end -->

                                <div class="price">
                                    @if($product->sale < $product->price)
                                        <span style="color: red">{{ number_format($product->sale,0,",",".") }} đ</span><span> - <del> {{ number_format($product->price,0,",",".") }} đ</del></span>
                                    @else
                                        <span style="color: red">{{ number_format($product->price,0,",",".") }} đ</span>
                                    @endif
                                </div>
                            </div>

                            <!-- khu vực chức năng giỏ hàng -start -->
                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                <input type="hidden" value="{{ $product->sale }}" name="price">
                                <input type="hidden" value="{{ $product->image }}"  name="image">
                                <input type="hidden" value="1"  name="quantity">

                                <div class="product__add-cart text-center">
                                    <button type="submit"  class="cart-btn-3 product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                        Thêm vào giỏ hàng
                                    </button>
                                </div>
                            </form>
                            <!-- khu vực chức năng giỏ hàng -end -->

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach
    <!-- trending-product-area-end -->

    <!-- banner__area-start -->
    @include('frontend.layouts.bannerPopularCategories')
    <!-- banner__area-end -->

    <!-- Top Featured Products__area-start -->
    <section class="topsell__area light-bg-s pt-15">
        <div class="container custom-conatiner">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section__head d-flex justify-content-between mb-30">
                        <div class="section__title section__title-2">
                            <h5 class="st-titile-d st-titile-d-2">Ưu đãi trong ngày</h5>
                        </div>

                        <!-- Time Countdown__area-start -->
                        <div class="offer-time">
                            <span class="offer-title d-none d-sm-block">Hurry Up! Offer ends in:</span>
                            <div class="countdown">
                                <div class="countdown-inner b-radius-2" data-countdown="" data-date="Mar 02 2022 20:20:22">
                                    <ul class="text-center">
                                        <li><span data-days="">32</span> Days</li>
                                        <li><span data-hours="">5</span> Hours</li>
                                        <li><span data-minutes="">32</span> Mins</li>
                                        <li><span data-seconds="">27</span> Secs</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Time Countdown__area-end -->
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($hotProduct as $hotPro)
                    <div class="col-xl-6 col-lg-12">
                    <div class="single-features-item single-features-item-d single-features-item-d-2 b-radius-2 mb-20">
                        <div class="row  g-0 align-items-center">
                            <div class="col-lg-6">
                                <div class="features-thum">
                                    <div class="features-product-image w-img">
                                        <a href="{{ route('product', ['product' => $hotPro->slug]) }}">
                                            <img src=" @if($hotPro->image && file_exists(public_path($hotPro->image)))
                                                       {{ asset($hotPro->image) }}
                                                   @else
                                                       {{asset('frontend')}}/img/features-product/fpb-1.jpg
                                                   @endif
                                                        " width="334px" height="334px" alt="">
                                        </a>
                                    </div>
                                    <div class="product__offer">
                                        <span class="discount">0%</span>
                                    </div>
                                    <div class="product-action product-action-2">
                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                            <i class="fal fa-eye"></i>
                                            <i class="fal fa-eye"></i>
                                        </a>
                                        <a href="#" class="icon-box icon-box-1">
                                            <i class="fal fa-layer-group"></i>
                                            <i class="fal fa-layer-group"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="product__content product__content-d product__content-d-2">
                                    <h6><a href="{{ route('product', ['product' => $hotPro->slug]) }}">{{ $hotPro->name }}</a></h6>
                                    <div class="rating mb-5">
                                        <ul class="rating-d">
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="price mb-10">
                                        @if($hotPro->sale < $hotPro->price)
                                            <span style="color: red">{{ number_format($hotPro->sale,0,",",".") }} đ</span><span> - <del> {{ number_format($hotPro->price,0,",",".") }} đ</del></span>
                                        @else
                                            <span style="color: red">{{ number_format($hotPro->price,0,",",".") }} đ</span>
                                        @endif
                                    </div>
                                    <div class="features-des mb-20">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-circle"></i> Bass and Stereo Sound.</a></li>
                                            <li><a href="#"><i class="fas fa-circle"></i> Display with 3088 x 1440 pixels resolution.</a></li>
                                            <li><a href="#"><i class="fas fa-circle"></i> Memory, Storage &amp; SIM: 12GB RAM, 256GB.</a></li>
                                            <li><a href="#"><i class="fas fa-circle"></i> Androi v10.0 Operating system.</a></li>
                                        </ul>
                                    </div>
                                    <div class="progress mb-5">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress-rate mb-15">
                                        <br/>
                                    </div>

                                    <div class="cart-option">
                                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $hotPro->id }}" name="id">
                                            <input type="hidden" value="{{ $hotPro->name }}" name="name">
                                            <input type="hidden" value="{{ $hotPro->sale }}" name="price">
                                            <input type="hidden" value="{{ $hotPro->image }}"  name="image">
                                            <input type="hidden" value="1"  name="quantity">

                                            <button type="submit" class="cart-btn-4 w-100">Thêm vào giỏ hàng</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Top Featured Products__area-end -->

    <!-- moveing-text-area-start -->
    <section class="moveing-text-area">
        <div class="container">
            <div class="ovic-running">
                <div class="wrap">
                    <div class="inner">
                        <p class="item">Free ship cho đơn hàng trong nội thành HCM  |   Chỉ áp dụng trong nội thành HCM</p>
                        <p class="item">Giảm 50% phí ship cho đơn hàng trên 10tr</p>
                        <p class="item">Giảm giá 30% cho đơn hàng đầu tiên khi thanh toán bằng TP-Bank.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- moveing-text-area-end -->

    <!-- topsell__area-start -->
{{--    <section class="recomand-product-area light-bg-s pt-50 pb-15">--}}
{{--        <div class="container custom-conatiner">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-12">--}}
{{--                    <div class="section__head d-flex justify-content-between mb-30">--}}
{{--                        <div class="section__title section__title-2">--}}
{{--                            <h5 class="st-titile">Top Selling Products  (Chưa triển khai)</h5>--}}
{{--                        </div>--}}
{{--                        <div class="button-wrap button-wrap-2">--}}
{{--                            <a href="product.html">See All Product <i class="fal fa-chevron-right"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-12">--}}
{{--                    <div class="tab-content" id="flast-sell-tabContent">--}}
{{--                        <div class="tab-pane fade active show" id="computer" role="tabpanel" aria-labelledby="computer-tab">--}}
{{--                            <div class="product-bs-slider-2">--}}
{{--                                <div class="product-slider-2 swiper-container">--}}
{{--                                    <div class="swiper-wrapper">--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-1.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product__offer">--}}
{{--                                                    <span class="discount">-15%</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Epple iPad Pro 10.5-inch Cellular 64G</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$105-$110</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-2.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Men Size Yellow Basketball Jerseys</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$105-$150</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-3.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product__offer">--}}
{{--                                                    <span class="discount">-9%</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Xbox Wireless Game Controller Pink</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$200-$280</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-4.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Wireless Bluetooth Over-Ear Headphones</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$100-$180</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-5.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product__offer">--}}
{{--                                                    <span class="discount">-10%</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Solo3 Wireless On-Ear Headphones</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span><del>$270</del> $200</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-6.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Vifa Bluetooth Portable Wireless Speaker</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$150-$270</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- If we need navigation buttons -->--}}
{{--                                <div class="bs-button bs2-button-prev"><i class="fal fa-chevron-left"></i></div>--}}
{{--                                <div class="bs-button bs2-button-next"><i class="fal fa-chevron-right"></i></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane fade" id="samsung" role="tabpanel" aria-labelledby="samsung-tab">--}}
{{--                            <div class="product-bs-slider-2">--}}
{{--                                <div class="product-slider-2 swiper-container">--}}
{{--                                    <div class="swiper-wrapper">--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-1.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product__offer">--}}
{{--                                                    <span class="discount">-15%</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Epple iPad Pro 10.5-inch Cellular 64G</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$105-$110</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-4.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Wireless Bluetooth Over-Ear Headphones</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$100-$180</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-5.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product__offer">--}}
{{--                                                    <span class="discount">-10%</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Solo3 Wireless On-Ear Headphones</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span><del>$270</del> $200</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-6.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Vifa Bluetooth Portable Wireless Speaker</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$150-$270</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-2.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Men Size Yellow Basketball Jerseys</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$105-$150</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-3.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product__offer">--}}
{{--                                                    <span class="discount">-9%</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Xbox Wireless Game Controller Pink</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$200-$280</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!-- If we need navigation buttons -->--}}
{{--                                </div>--}}
{{--                                <div class="bs-button bs2-button-prev"><i class="fal fa-chevron-left"></i></div>--}}
{{--                                <div class="bs-button bs2-button-next"><i class="fal fa-chevron-right"></i></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane fade" id="htc" role="tabpanel" aria-labelledby="htc-tab">--}}
{{--                            <div class="product-bs-slider-2">--}}
{{--                                <div class="product-slider-2 swiper-container">--}}
{{--                                    <div class="swiper-wrapper">--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-4.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Wireless Bluetooth Over-Ear Headphones</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$100-$180</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-5.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product__offer">--}}
{{--                                                    <span class="discount">-10%</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Solo3 Wireless On-Ear Headphones</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span><del>$270</del> $200</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-6.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Vifa Bluetooth Portable Wireless Speaker</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$150-$270</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-1.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product__offer">--}}
{{--                                                    <span class="discount">-15%</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Epple iPad Pro 10.5-inch Cellular 64G</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$105-$110</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-2.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Men Size Yellow Basketball Jerseys</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$105-$150</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-3.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product__offer">--}}
{{--                                                    <span class="discount">-9%</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Xbox Wireless Game Controller Pink</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$200-$280</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- If we need navigation buttons -->--}}
{{--                                <div class="bs-button bs2-button-prev"><i class="fal fa-chevron-left"></i></div>--}}
{{--                                <div class="bs-button bs2-button-next"><i class="fal fa-chevron-right"></i></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane fade" id="nokia" role="tabpanel" aria-labelledby="nokia-tab">--}}
{{--                            <div class="product-bs-slider-2">--}}
{{--                                <div class="product-slider-2 swiper-container">--}}
{{--                                    <div class="swiper-wrapper">--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-1.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product__offer">--}}
{{--                                                    <span class="discount">-15%</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Epple iPad Pro 10.5-inch Cellular 64G</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$105-$110</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-2.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Men Size Yellow Basketball Jerseys</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$105-$150</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-3.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product__offer">--}}
{{--                                                    <span class="discount">-9%</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Xbox Wireless Game Controller Pink</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$200-$280</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-4.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Wireless Bluetooth Over-Ear Headphones</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$100-$180</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-5.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product__offer">--}}
{{--                                                    <span class="discount">-10%</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Solo3 Wireless On-Ear Headphones</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span><del>$270</del> $200</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-6.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Vifa Bluetooth Portable Wireless Speaker</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$150-$270</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- If we need navigation buttons -->--}}
{{--                                <div class="bs-button bs2-button-prev"><i class="fal fa-chevron-left"></i></div>--}}
{{--                                <div class="bs-button bs2-button-next"><i class="fal fa-chevron-right"></i></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane fade" id="cell" role="tabpanel" aria-labelledby="cell-tab">--}}
{{--                            <div class="product-bs-slider-2">--}}
{{--                                <div class="product-slider-2 swiper-container">--}}
{{--                                    <div class="swiper-wrapper">--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-1.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product__offer">--}}
{{--                                                    <span class="discount">-15%</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Epple iPad Pro 10.5-inch Cellular 64G</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$105-$110</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-2.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Men Size Yellow Basketball Jerseys</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$105-$150</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-3.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product__offer">--}}
{{--                                                    <span class="discount">-9%</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Xbox Wireless Game Controller Pink</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$200-$280</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-4.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Wireless Bluetooth Over-Ear Headphones</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$100-$180</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-5.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product__offer">--}}
{{--                                                    <span class="discount">-10%</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Solo3 Wireless On-Ear Headphones</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span><del>$270</del> $200</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product__item swiper-slide">--}}
{{--                                            <div class="product__thumb fix">--}}
{{--                                                <div class="product-image w-img">--}}
{{--                                                    <a href="product-details.html">--}}
{{--                                                        <img src="{{asset('frontend')}}/img/product/tp-6.jpg" alt="product">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                        <i class="fal fa-eye"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                        <i class="fal fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="icon-box icon-box-1">--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                        <i class="fal fa-layer-group"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__content">--}}
{{--                                                <h6><a href="product-details.html">Vifa Bluetooth Portable Wireless Speaker</a></h6>--}}
{{--                                                <div class="rating mb-5">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>(01 review)</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="price">--}}
{{--                                                    <span>$150-$270</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product__add-cart text-center">--}}
{{--                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">--}}
{{--                                                    Add to Cart--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- If we need navigation buttons -->--}}
{{--                                <div class="bs-button bs2-button-prev"><i class="fal fa-chevron-left"></i></div>--}}
{{--                                <div class="bs-button bs2-button-next"><i class="fal fa-chevron-right"></i></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- topsell__area-end -->

    <!-- banner__area-start -->
{{--    @include('frontend.layouts.slider2')--}}
    <section class="banner__area light-bg-s pt-40 pb-10">
        <div class="container custom-conatiner">
            <div class="row">
                @foreach($CategoryType3 as $type3)
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="banner__item p-relative w-img mb-30">
                        <div class="banner__img b-radius-2">
                            <a href="{{ route('category', ['category' => $type3->slug ]) }}"><img src="
                                                                            @if($type3->image && file_exists(public_path($type3->image)))
                                                                                {{ asset($type3->image) }}
                                                                            @else
                                                                                {{ asset('frontend')}}/img/banner/banner-15.jpg }}
                                                                            @endif
                                                                            " width="546.667px" height="200px" title="{{$type3->name}}" alt="{{$type3->name}}"></a>
                        </div>
                        <div class="banner__content banner__content-2">
                            <h6><a href="{{ route('category', ['category' => $type3->slug ]) }}">{{$type3->name}}</a></h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- banner__area-end -->

    <!-- blog-area-start ========================================================================-->
    @include('frontend.layouts.blognew')
    <!-- blog-area-end -->

@endsection
