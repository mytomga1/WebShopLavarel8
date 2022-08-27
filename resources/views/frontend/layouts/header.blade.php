<!-- header-start -->
<div class="header-top">
    <div class="container custom-conatiner">
        <div class="header-inner">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-7">
                    <div class="header-inner-start">
                        <div class="header__currency border-right">
                            <div class="s-name">
                                <span>Language : &nbsp</span>
                            </div>
                            <select>
                                <option>Tiếng Việt</option>
                                <option>English</option>
                            </select>
                        </div>
                        <div class="header__lang border-right">
                            <div class="s-name">
                                <span>Currency : &nbsp</span>
                            </div>
                            <select>
                                <option> VNĐ</option>
                                <option> USD</option>
                            </select>
                        </div>
                        <div class="support d-none d-sm-block">
                            <p>Need Help? &nbsp<a href="đt : +84{{$setting -> phone}}"> (+84) {{$setting -> phone}}</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5 d-none d-lg-block">
                    <div class="header-inner-end text-md-end">
                        <div class="ovic-menu-wrapper ovic-menu-wrapper-2">
                            <ul>
                                <li><a href="{{route('contact')}}">Liên Hệ</a></li>
                                <li><a href="faq.html">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-mid">
    <div class="container custom-conatiner">
        <div class="heade-mid-inner">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4">
                    <div class="header__info">
                        <div class="logo">
                            <a href="{{route('index')}}" class="logo-image"><img src="{{ asset($setting->image) }}" alt="logo"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-4 d-none d-lg-block">
                    <div class="header__search">
                        <form action="#">
                            <div class="header__search-box">
                                <input class="search-input search-input-2" type="text" placeholder="I'm shopping for...">
                                <button class="button button-2" type="submit"><i class="far fa-search"></i></button>
                            </div>
                            <div class="header__search-cat">
                                <select>
                                    <option>All Categories</option>
                                    <option>Best Seller Products</option>
                                    <option>Top 10 Offers</option>
                                    <option>New Arrivals</option>
                                    <option>Phones &amp; Tablets</option>
                                    <option>Electronics &amp; Digital</option>
                                    <option>Fashion &amp; Clothings</option>
                                    <option>Jewelry &amp; Watches</option>
                                    <option>Health &amp; Beauty</option>
                                    <option>Sound &amp; Speakers</option>
                                    <option>TV &amp; Audio</option>
                                    <option>Computers</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-8 col-sm-8">
                    <div class="header-action">
                        <div class="block-userlink">
                            <a class="icon-link icon-link-2" href="my-account.html">
                                <i class="flaticon-user"></i>
                                <span class="text">
                                    <span class="sub">Đăng Nhập </span>
                                    Tài khoản của tôi </span>
                            </a>
                        </div>
                        <div class="block-wishlist action">
                            <a class="icon-link icon-link-2" href="wishlist.html">
                                <i class="flaticon-heart"></i>
                                <span class="count count-2">0</span>
                                <span class="text">
                                    <span class="sub">Favorite</span>
                                    Danh sách yêu thích </span>
                            </a>
                        </div>
                        <div class="block-cart action">
                            <a class="icon-link icon-link-2" href="cart.html">
                                <i class="flaticon-shopping-bag"></i>
                                <span class="count count-2">1</span>
                                <span class="text">
                                    <span class="sub">Giỏ Hàng:</span>
                                    $00.00 </span>
                            </a>
                            <div class="cart">
                                <div class="cart__mini">
                                    <ul>
                                        <li>
                                            <div class="cart__title">
                                                <h4>Your Cart</h4>
                                                <span>(1 Item in Cart)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="cart__item d-flex justify-content-between align-items-center">
                                                <div class="cart__inner d-flex">
                                                    <div class="cart__thumb">
                                                        <a href="product-details.html">
                                                            <img src="{{asset('frontend')}}/img/cart/20.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="cart__details">
                                                        <h6><a href="product-details.html"> Samsung C49J89: £875, Debenhams Plus  </a></h6>
                                                        <div class="cart__price">
                                                            <span>$255.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cart__del">
                                                    <a href="#"><i class="fal fa-times"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="cart__sub d-flex justify-content-between align-items-center">
                                                <h6>Subtotal</h6>
                                                <span class="cart__sub-total">$255.00</span>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="cart.html" class="wc-cart mb-10">View cart</a>
                                            <a href="checkout.html" class="wc-checkout">Checkout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- header-end -->
