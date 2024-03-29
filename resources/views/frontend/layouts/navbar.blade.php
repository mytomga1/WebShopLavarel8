<!-- NavBar-start -->
<div class="header__bottom">
    <div class="container custom-conatiner">
        <div class="row g-0 align-items-center">
            <div class="col-lg-3">
                <div class="cat__menu-wrapper side-border d-none d-lg-block">
                    <div class="cat-toggle">
                        <button type="button" class="cat-toggle-btn cat-toggle-btn-1"><i class="fal fa-bars"></i> Danh Mục Mua Sắm</button>
                        <div class="cat__menu-2 cat__menu">
                            <nav id="mobile-menu" style="display: block;">
                                <ul>
                                    <li>
                                        <a>Tất Cả Danh Mục <i class="far fa-angle-down"></i></a>
                                        <ul class="mega-menu">
                                            @foreach($categories as $category)
                                                <li><a href="{{ route('category', ['category' => $category->slug ]) }}">{{$category->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    @foreach($categories as $category)
                                        @if($category->parent_id == 0)
                                            <li><a href="{{ route('category', ['category' => $category->slug ]) }}">{{$category->name}}</a></li>
                                        @endif
                                    @endforeach

                                    <!-- khu vực mở rộng tab con Best Seller Products thanh nav -->
{{--                                    <li>--}}
{{--                                        <a href="product.html">Best Seller Products--}}
{{--                                            <span class="cat-label">hot!</span>--}}
{{--                                            <i class="far fa-angle-down"></i>--}}
{{--                                        </a>--}}
{{--                                        <ul class="mega-menu">--}}
{{--                                            <li><a href="product.html">Shop Pages</a>--}}
{{--                                                <ul class="mega-item">--}}
{{--                                                    <li><a href="product-details.html">Standard SHop Page</a></li>--}}
{{--                                                    <li><a href="product-details.html">Shop Right Sidebar</a></li>--}}
{{--                                                    <li><a href="product-details.html">Shop Left Sidebar</a></li>--}}
{{--                                                    <li><a href="product-details.html">Shop 3 Column</a></li>--}}
{{--                                                    <li><a href="product-details.html">Shop 4 Column</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </li>--}}
{{--                                            <li><a href="product.html">Product Pages</a>--}}
{{--                                                <ul class="mega-item">--}}
{{--                                                    <li><a href="product-details.html">Product Details</a></li>--}}
{{--                                                    <li><a href="product-details.html">Product V2</a></li>--}}
{{--                                                    <li><a href="product-details.html">Product V3</a></li>--}}
{{--                                                    <li><a href="product-details.html">Varriable Product</a></li>--}}
{{--                                                    <li><a href="product-details.html">External Product</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </li>--}}
{{--                                            <li><a href="product.html">Other Pages</a>--}}
{{--                                                <ul class="mega-item">--}}
{{--                                                    <li><a href="product-details.html">wishlist</a></li>--}}
{{--                                                    <li><a href="product-details.html">Shopping Cart</a></li>--}}
{{--                                                    <li><a href="product-details.html">Checkout</a></li>--}}
{{--                                                    <li><a href="product-details.html">Login</a></li>--}}
{{--                                                    <li><a href="product-details.html">Register</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </li>--}}
{{--                                            <li><a href="product.html">Phone &amp; Tablets</a>--}}
{{--                                                <ul class="mega-item">--}}
{{--                                                    <li><a href="product-details.html">Catagory 1</a></li>--}}
{{--                                                    <li><a href="product-details.html">Catagory 2</a></li>--}}
{{--                                                    <li><a href="product-details.html">Catagory 3</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </li>--}}
{{--                                            <li><a href="product.html">Phone &amp; Tablets</a>--}}
{{--                                                <ul class="mega-item">--}}
{{--                                                    <li><a href="product-details.html">Catagory 1</a></li>--}}
{{--                                                    <li><a href="product-details.html">Catagory 2</a></li>--}}
{{--                                                    <li><a href="product-details.html">Catagory 3</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="product.html">Top 10 Offers--}}
{{--                                            <span class="cat-label green">new!</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
                                    <!-- khu vực mở rộng tab con Best Seller Products  thanh nav end-->
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-3">
                <div class="header__bottom-left d-flex d-xl-block align-items-center">
                    <div class="side-menu d-lg-none mr-20">
                        <button type="button" class="side-menu-btn offcanvas-toggle-btn"><i class="fas fa-bars"></i></button>
                    </div>
                    <div class="main-menu d-none d-lg-block">
                        <nav>
                            <ul>
                                <li>
                                    <a href="{{route('index')}}" class="active">TRANG CHỦ</a>
                                </li>

                                <!-- khu vực mở rộng tab con Shop  thanh nav end-->
{{--                                <li class="has-mega"><a href="shop.html">Shop <i class="far fa-angle-down"></i></a>--}}
{{--                                    <div class="mega-menu">--}}
{{--                                        <div class="container container-mega">--}}
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    <ul>--}}
{{--                                                        <li class="title"><a href="shop.html">SHOP LAYOUT</a></li>--}}
{{--                                                        <li><a href="shop.html">Pagination</a></li>--}}
{{--                                                        <li><a href="shop.html">Ajax Load More</a></li>--}}
{{--                                                        <li><a href="shop.html">Infinite Scroll</a></li>--}}
{{--                                                        <li><a href="shop.html">Sidebar Right</a></li>--}}
{{--                                                        <li><a href="shop.html">Sidebar Left</a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <ul>--}}
{{--                                                        <li class="title"><a href="shop.html">SHOP PAGES</a></li>--}}
{{--                                                        <li><a href="shop.html">List View</a></li>--}}
{{--                                                        <li><a href="shop.html">Small Products</a></li>--}}
{{--                                                        <li><a href="shop.html">Large Products</a></li>--}}
{{--                                                        <li><a href="shop.html">Shop — 3 Items</a></li>--}}
{{--                                                        <li><a href="shop.html">Shop — 4 Items</a></li>--}}
{{--                                                        <li><a href="shop.html">Shop — 5 Items</a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <ul>--}}
{{--                                                        <li class="title"><a href="shop.html">PRODUCT LAYOUT</a></li>--}}
{{--                                                        <li><a href="shop.html">Description Sticky</a></li>--}}
{{--                                                        <li><a href="shop.html">Product Carousel</a></li>--}}
{{--                                                        <li><a href="shop.html">Gallery Modern</a></li>--}}
{{--                                                        <li><a href="shop.html">Thumbnail Left</a></li>--}}
{{--                                                        <li><a href="shop.html">Thumbnail Right</a></li>--}}
{{--                                                        <li><a href="shop.html">Thumbnail Botttom</a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <ul>--}}
{{--                                                        <li class="title"><a href="shop.html">Basketball</a></li>--}}
{{--                                                        <li><a href="shop.html">East Hampton Fleece</a></li>--}}
{{--                                                        <li><a href="shop.html">Faxon Canvas Low</a></li>--}}
{{--                                                        <li><a href="shop.html">Habitasse Dictumst</a></li>--}}
{{--                                                        <li><a href="shop.html">Kaoreet Lobortis</a></li>--}}
{{--                                                        <li><a href="shop.html">NikeCourt Zoom</a></li>--}}
{{--                                                        <li><a href="shop.html">NikeCourts Air Zoom</a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <ul>--}}
{{--                                                        <li class="title"><a href="shop.html">Basketball</a></li>--}}
{{--                                                        <li><a href="shop.html">East Hampton Fleece</a></li>--}}
{{--                                                        <li><a href="shop.html">Faxon Canvas Low</a></li>--}}
{{--                                                        <li><a href="shop.html">Habitasse Dictumst</a></li>--}}
{{--                                                        <li><a href="shop.html">Kaoreet Lobortis</a></li>--}}
{{--                                                        <li><a href="shop.html">NikeCourt Zoom</a></li>--}}
{{--                                                        <li><a href="shop.html">NikeCourts Air Zoom</a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </li>--}}
{{--                                                <li class="mega-image hover-effect" style="background-image: url({{asset('frontend')}}/img/bg/menu-item.jpg);">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="shop.html">--}}
{{--                                                                <h4>Top Cameras <br> Bestseller Products</h4>--}}
{{--                                                                <h5>4K</h5>--}}
{{--                                                                <h6>Sale Up To <span>60% Off</span></h6>--}}
{{--                                                            </a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                        <div class="offer mt-40">--}}
{{--                                            <p><b>Giảm 50%</b> phí vận chuyển cho đơn đặt hàng đầu tiên của bạn với mã : <b>SBEE-SALE30</b></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
                                <!-- khu vực mở rộng tab con thanh nav end-->

                                <li><a href="{{route('articles')}}">Blog</a></li>
                                <li><a href="{{route('contact')}}">About Us</a></li>

                                <!-- khu vực mở rộng tab con Pages thanh nav end-->
{{--                                <li>--}}
{{--                                    <a href="about.html">Pages <i class="far fa-angle-down"></i></a>--}}
{{--                                    <ul class="submenu">--}}
{{--                                        <li><a href="my-account.html">My Account</a></li>--}}
{{--                                        <li><a href="product-details.html">Product Details</a></li>--}}
{{--                                        <li><a href="faq.html">FAQs pages</a></li>--}}
{{--                                        <li><a href="cart.html">Cart</a></li>--}}
{{--                                        <li><a href="wishlist.html">Wishlist</a></li>--}}
{{--                                        <li><a href="checkout.html">Checkout</a></li>--}}
{{--                                        <li><a href="contact.html">Contact Us</a></li>--}}
{{--                                        <li><a href="404.html">404 Error</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
                                <!-- khu vực mở rộng tab con Pages thanh nav end-->

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-9">
                <div class="shopeing-text text-sm-end">
                    <p>Miễn phí vận chuyển Cho tất cả đơn hàng từ 3tr</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- NavBar-end -->
