@extends('frontend.layouts.main')

@section('content')
    <!-- page-banner-area-start -->
    <div class="page-banner-area page-banner-height-2" data-background="{{asset('frontend')}}/img/banner/page-banner-4.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">BLOG</h4>
                        <div class="breadcrumb-two">
                            <nav>
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                            <a href="{{route('index')}}"><span>Trang chủ</span></a>
                                        </li>
                                        <li class="trail-item">
                                            <span>Blog</span>
                                        </li>
                                    </ul>
                                </nav>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-banner-area-end -->

    <!-- news-detalis-area-start -->
    <div class="blog-area mt-120 mb-75">
        <div class="container">
            <div class="row">
                <!-- khu vực danh sách bài viết bên trái-start -->
                <div class="col-xl-12 col-lg-12">{{--<div class="col-xl-8 col-lg-7"> --}}
                    <div class="row">
                        @foreach($articles as $article)
                           <div class="col-xl-4">{{-- <div class="col-xl-6">--}}
                                <div class="single-smblog mb-30">
                                    <div class="smblog-thum">
                                        <div class="blog-image w-img">
                                            <a href="{{ route('article-detail', ['slug' =>$article->slug]) }}"> {{-- add chuyển trang chi tiết bài viết theo link slug--}}
                                                @if($article->image && file_exists(public_path($article->image)))
                                                    <img src="{{ asset($article->image) }}" width="450" height="281" alt="">
                                                @else
                                                    <img src="{{ asset('frontend') }}/img/blog/sm-b2-2.jpg" alt="">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="blog-tag blog-tag-2">
                                            <a href="#">{{ !empty($article->Article_Category->name) ? $article->Article_Category->name : '' }}</a>{{-- khai báo quan hệ trong model--}}
                                        </div>
                                    </div>
                                    <div class="smblog-content smblog-content-3">
                                        <h6><a href="{{ route('article-detail', ['slug' =>$article->slug]) }}">{{$article->title}}</a></h6> {{-- add chuyển trang chi tiết bài viết theo link slug--}}
                                        <span class="author mb-10">posted by <a href="#">{{ !empty($article->Article_user->name) ? $article->Article_user->name : '' }}</a></span>{{-- khai báo quan hệ trong model--}}

                                        <p>{!! substr($article->summary,0,174)!!} ...</p>

                                        <div class="smblog-foot pt-15">
                                            <div class="post-readmore">
                                                {{-- add chuyển trang chi tiết bài viết theo link slug--}}
                                                <a href="{{ route('article-detail', ['slug' =>$article->slug]) }}"> Đọc thêm >> <span class="icon"></span></a>
                                            </div>
                                            <div class="post-date">
                                                <a href="#">{{ date('d-m-Y', strtotime($article->created_at))  }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <div class="tp-pagination text-center">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class=" pt-30 pb-30">
                                    {!! $articles->links('vendor.pagination.custom') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- khu vực danh sách bài viết bên phải-start -->

                <!-- khu vực menu bài viết bên phải-start -->
{{--                <div class="col-xl-4 col-lg-5">--}}
{{--                    <div class="news-sidebar pl-10">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-12 col-md-12">--}}
{{--                                <div class="widget">--}}
{{--                                    <h6 class="sidebar-title"> Search Here</h6>--}}
{{--                                    <div class="n-sidebar-search">--}}
{{--                                        <input type="text" placeholder="Search your keyword...">--}}
{{--                                        <a href="#"><i class="fal fa-search"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-12 col-md-12">--}}
{{--                                <div class="widget">--}}
{{--                                    <h6 class="sidebar-title">Popular Feeds</h6>--}}
{{--                                    <div class="n-sidebar-feed">--}}
{{--                                        <ul>--}}
{{--                                            <li>--}}
{{--                                                <div class="feed-number">--}}
{{--                                                    <a href="blog-details.html"><img src="{{asset('frontend')}}/img/blog/sm-b-1.jpg" alt=""></a>--}}
{{--                                                </div>--}}
{{--                                                <div class="feed-content">--}}
{{--                                                    <h6><a href="blog-details.html">APL Logistics seeks to be a premier, profitable</a></h6>--}}
{{--                                                    <span class="feed-date">--}}
{{--                                                      <i class="fal fa-calendar-alt"></i> 24th March 2021--}}
{{--                                                   </span>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <div class="feed-number">--}}
{{--                                                    <a href="blog-details.html"><img src="{{asset('frontend')}}/img/blog//sm-b-2.jpg" alt=""></a>--}}
{{--                                                </div>--}}
{{--                                                <div class="feed-content">--}}
{{--                                                    <h6><a href="blog-details.html">Of global supply-chain services to help</a></h6>--}}
{{--                                                    <span class="feed-date">--}}
{{--                                                      <i class="fal fa-calendar-alt"></i> 24th March 2021--}}
{{--                                                   </span>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <div class="feed-number">--}}
{{--                                                    <a href="blog-details.html"><img src="{{asset('frontend')}}/img/blog//sm-b-3.jpg" alt=""></a>--}}
{{--                                                </div>--}}
{{--                                                <div class="feed-content">--}}
{{--                                                    <h6><a href="blog-details.html">Enable sustainable trade and commerce</a></h6>--}}
{{--                                                    <span class="feed-date">--}}
{{--                                                      <i class="fal fa-calendar-alt"></i> 24th March 2021--}}
{{--                                                   </span>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <div class="feed-number">--}}
{{--                                                    <a href="blog-details.html"><img src="{{asset('frontend')}}/img/blog//sm-b-4.jpg" alt=""></a>--}}
{{--                                                </div>--}}
{{--                                                <div class="feed-content">--}}
{{--                                                    <h6><a href="blog-details.html">In key markets & region We will accomplish</a>--}}
{{--                                                    </h6>--}}
{{--                                                    <span class="feed-date">--}}
{{--                                                      <i class="fal fa-calendar-alt"></i> 24th March 2021--}}
{{--                                                   </span>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-12 col-md-6">--}}
{{--                                <div class="widget">--}}
{{--                                    <h6 class="sidebar-title">Categories</h6>--}}
{{--                                    <ul class="n-sidebar-categories">--}}
{{--                                        <li>--}}
{{--                                            <a href="blog-details.html">--}}
{{--                                                <div class="single-category p-relative mb-10">--}}
{{--                                                    Business--}}
{{--                                                    <span class="category-number">26</span>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="blog-details.html">--}}
{{--                                                <div class="single-category p-relative mb-10">--}}
{{--                                                    consultant--}}
{{--                                                    <span class="category-number">30</span>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="blog-details.html">--}}
{{--                                                <div class="single-category p-relative mb-10">--}}
{{--                                                    Creative--}}
{{--                                                    <span class="category-number">71</span>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="blog-details.html">--}}
{{--                                                <div class="single-category p-relative mb-10">--}}
{{--                                                    UI/UX--}}
{{--                                                    <span class="category-number">56</span>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="blog-details.html">--}}
{{--                                                <div class="single-category p-relative">--}}
{{--                                                    Texhnology--}}
{{--                                                    <span class="category-number">60</span>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-12 col-md-6">--}}
{{--                                <div class="widget">--}}
{{--                                    <h6 class="sidebar-title">Instagram Feeds</h6>--}}
{{--                                    <div class="dktags">--}}
{{--                                        <a class="single-tag" href="#">Popular</a>--}}
{{--                                        <a class="single-tag" href="#">Design</a>--}}
{{--                                        <a class="single-tag" href="#">Usability</a>--}}
{{--                                        <a class="single-tag" href="#">Icon</a>--}}
{{--                                        <a class="single-tag" href="#">Kit</a>--}}
{{--                                        <a class="single-tag" href="#">Business</a>--}}
{{--                                        <a class="single-tag" href="#">Keypad</a>--}}
{{--                                        <a class="single-tag" href="#">Tech</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- khu vực menu bài viết bên phải-end -->
            </div>
        </div>
    </div>
    <!-- news-detalis-area-end  -->
@endsection

