<!-- blog-area-start -->
<div class="blog-area light-bg-s pt-20 pb-30">
    <div class="container custom-conatiner">
        <div class="row">
            <div class="col-xl-12">
                <div class="section__head d-flex justify-content-between mb-30">
                    <div class="section__title section__title-2">
                        <h5 class="st-titile">From the Blog</h5>
                    </div>
                    <div class="button-wrap button-wrap-2">
                        <a href="product.html">See All Post <i class="fal fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($articles as $article)
                <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-4">
                <div class="single-smblog mb-30">
                    <div class="smblog-thum">
                        <div class="blog-image w-img">
                            <a href="{{ route('article-detail', ['slug' =>$article->slug]) }}"> {{-- add chuyển trang chi tiết bài viết theo link slug--}}
                                @if($article->image && file_exists(public_path($article->image)))
                                    <img src="{{ asset($article->image) }}" width="277" height="173" title="{{$article->title}}" alt="">
                                @else
                                    <img src="{{ asset('frontend') }}/img/blog/sm-b2-2.jpg" title="{{$article->title}}" alt="">
                                @endif
                            </a>
                        </div>
                        <div class="blog-tag">
                            <a href="#">{{ !empty($article->Article_Category->name) ? $article->Article_Category->name : '' }}</a>
                        </div>
                    </div>
                    <div class="smblog-content">
                        <h6><a href="#" title="{{$article->title}}">{!! substr($article->title,0,45)!!}...</a></h6>
                        <span class="author mb-10">posted by <a href="#">{{ !empty($article->Article_user->name) ? $article->Article_user->name : '' }}</a></span>
                        <p>{!! substr($article->summary,0,40)!!}...</p>
                        <div class="smblog-foot pt-15">
                            <div class="post-readmore">
                                <a href="{{ route('article-detail', ['slug' =>$article->slug]) }}"> Đọc Thêm <span class="icon"></span></a>
                            </div>
                            <div class="post-date">
                                <a href="#">{{ date('d-m-Y', strtotime($article->created_at))  }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
{{--            <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-4">--}}
{{--                <div class="single-smblog mb-30">--}}
{{--                    <div class="smblog-thum">--}}
{{--                        <div class="blog-image w-img">--}}
{{--                            <a href="blog-details.html"><img src="{{asset('frontend')}}/img/blog/sm-b-2.jpg" alt=""></a>--}}
{{--                        </div>--}}
{{--                        <div class="blog-tag">--}}
{{--                            <a href="#">New</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="smblog-content">--}}
{{--                        <h6><a href="blog-details.html">Top 5 Best Digital Cameras for 2021 You Should Buy</a></h6>--}}
{{--                        <span class="author mb-10">posted by <a href="#">Angelia</a></span>--}}
{{--                        <p>It is accompanied by a case that can contain...</p>--}}
{{--                        <div class="smblog-foot pt-15">--}}
{{--                            <div class="post-readmore">--}}
{{--                                <a href="#">Read More <span class="icon"></span></a>--}}
{{--                            </div>--}}
{{--                            <div class="post-date">--}}
{{--                                <a href="#">Jan 24, 2022</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-4">--}}
{{--                <div class="single-smblog mb-30">--}}
{{--                    <div class="smblog-thum">--}}
{{--                        <div class="blog-image w-img">--}}
{{--                            <a href="blog-details.html"><img src="{{asset('frontend')}}/img/blog/sm-b-3.jpg" alt=""></a>--}}
{{--                        </div>--}}
{{--                        <div class="blog-tag">--}}
{{--                            <a href="#">Update</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="smblog-content">--}}
{{--                        <h6><a href="blog-details.html">Capture the moment with 4 cameras on Oppo A92</a></h6>--}}
{{--                        <span class="author mb-10">posted by <a href="#">Iqbal</a></span>--}}
{{--                        <p>It is accompanied by a case that can contain...</p>--}}
{{--                        <div class="smblog-foot pt-15">--}}
{{--                            <div class="post-readmore">--}}
{{--                                <a href="#"> Read More <span class="icon"></span></a>--}}
{{--                            </div>--}}
{{--                            <div class="post-date">--}}
{{--                                <a href="#">Jan 24, 2022</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-4">--}}
{{--                <div class="single-smblog mb-30">--}}
{{--                    <div class="smblog-thum">--}}
{{--                        <div class="blog-image w-img">--}}
{{--                            <a href="blog-details.html"><img src="{{asset('frontend')}}/img/blog/sm-b-4.jpg" alt=""></a>--}}
{{--                        </div>--}}
{{--                        <div class="blog-tag">--}}
{{--                            <a href="#">Offer</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="smblog-content">--}}
{{--                        <h6><a href="blog-details.html">Use Headphones Properly Not To Damage Your Hearing</a></h6>--}}
{{--                        <span class="author mb-10">posted by <a href="#">Jenny</a></span>--}}
{{--                        <p>It is accompanied by a case that can contain...</p>--}}
{{--                        <div class="smblog-foot pt-15">--}}
{{--                            <div class="post-readmore">--}}
{{--                                <a href="#"> Read More <span class="icon"></span></a>--}}
{{--                            </div>--}}
{{--                            <div class="post-date">--}}
{{--                                <a href="#">Jan 24, 2022</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-4">--}}
{{--                <div class="single-smblog mb-30">--}}
{{--                    <div class="smblog-thum">--}}
{{--                        <div class="blog-image w-img">--}}
{{--                            <a href="blog-details.html"><img src="{{asset('frontend')}}/img/blog/sm-b-5.jpg" alt=""></a>--}}
{{--                        </div>--}}
{{--                        <div class="blog-tag">--}}
{{--                            <a href="#">Common</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="smblog-content">--}}
{{--                        <h6><a href="blog-details.html">Laptops Become More Common in Everyday Life</a></h6>--}}
{{--                        <span class="author mb-10">posted by <a href="#">Nihal Fultu</a></span>--}}
{{--                        <p>It is accompanied by a case that can contain...</p>--}}
{{--                        <div class="smblog-foot pt-15">--}}
{{--                            <div class="post-readmore">--}}
{{--                                <a href="#"> Read More <span class="icon"></span></a>--}}
{{--                            </div>--}}
{{--                            <div class="post-date">--}}
{{--                                <a href="#">Jan 24, 2022</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-4">--}}
{{--                <div class="single-smblog mb-30">--}}
{{--                    <div class="smblog-thum">--}}
{{--                        <div class="blog-image w-img">--}}
{{--                            <a href="blog-details.html"><img src="{{asset('frontend')}}/img/blog/sm-b-6.jpg" alt=""></a>--}}
{{--                        </div>--}}
{{--                        <div class="blog-tag">--}}
{{--                            <a href="#">Hot</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="smblog-content">--}}
{{--                        <h6><a href="blog-details.html">Do you know how to wear headphones properly?</a></h6>--}}
{{--                        <span class="author mb-10">posted by <a href="#">Rosanlina</a></span>--}}
{{--                        <p>It is accompanied by a case that can contain...</p>--}}
{{--                        <div class="smblog-foot pt-15">--}}
{{--                            <div class="post-readmore">--}}
{{--                                <a href="#"> Read More <span class="icon"></span></a>--}}
{{--                            </div>--}}
{{--                            <div class="post-date">--}}
{{--                                <a href="#">Jan 24, 2022</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
<!-- blog-area-end -->
