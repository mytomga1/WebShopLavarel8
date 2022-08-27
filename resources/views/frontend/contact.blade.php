@extends('frontend.layouts.main')

@section('content')
    <link href="https://cdn01.jotfor.ms/static/formCss.css?3.3.34988" rel="stylesheet" type="text/css" />
    <style type="text/css">@media print{.form-section{display:inline!important}.form-pagebreak{display:none!important}.form-section-closed{height:auto!important}.page-section{position:initial!important}}</style>
    <link type="text/css" rel="stylesheet" href="https://cdn02.jotfor.ms/css/styles/nova.css?3.3.34988" />
    <link type="text/css" rel="stylesheet" href="https://cdn03.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?themeRevisionID=58c6459d9a11c7136a8b4567"/>
    <link type="text/css" rel="stylesheet" href="https://cdn01.jotfor.ms/css/styles/payment/payment_feature.css?3.3.34988" />
    <link rel="stylesheet" href="{{asset('frontend')}}/css/contractUS.css">
    <script src="https://cdn02.jotfor.ms/static/prototype.forms.js?3.3.34988" type="text/javascript"></script>
    <script src="https://cdn03.jotfor.ms/static/jotform.forms.js?3.3.34988" type="text/javascript"></script>
    <script src="{{asset('frontend')}}/js/contractUS.js"></script>

    <main>
        <!-- page-banner-area-start -->
        <div class="page-banner-area page-banner-height" data-background="{{asset('frontend')}}/img/banner/page-banner-3.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-banner-content text-center">
                            <h4 class="breadcrumb-title">Contact Us</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                    <nav class="breadcrumb-trail breadcrumbs">
                                        <ul class="breadcrumb-menu">
                                            <li class="breadcrumb-trail">
                                                <a href="index.html"><span>Home</span></a>
                                            </li>
                                            <li class="trail-item">
                                                <span>Contact Us</span>
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

        <!-- location-area-start -->
        <div class="location-area pt-70 pb-25">
            <div class="container">
                <div class="row mb-25">
                    <div class="col-xl-12">
                        <div class="abs-section-title text-center">
                            <span>LOCATION STORE</span>
                            <h4>Where We Are</h4>
                            <p>The perfect way to enjoy brewing tea on low hanging fruit to identify. Duis autem vel eum iriure dolor in hendrerit <br> in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="location-item mb-30">
                            <div class="location-image w-img mb-20">
                                <img src="assets/img/location/location-1.jpg" alt="">
                            </div>
                            <h6>26 Rue Pelleport - Paris</h6>
                            <div class="sm-item-loc sm-item-border mb-20">
                                <div class="sml-icon mr-20">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="sm-content">
                                    <span>Find us</span>
                                    <p>Rue Saint-Antoine, Paris, France  </p>
                                </div>
                            </div>
                            <div class="sm-item-loc sm-item-border mb-20">
                                <div class="sml-icon mr-20">
                                    <i class="fal fa-phone-alt"></i>
                                </div>
                                <div class="sm-content">
                                    <span>Call us</span>
                                    <p><a href="tel:+8804568">(+100) 123 456 7890</a></p>
                                </div>
                            </div>
                            <div class="sm-item-loc mb-20">
                                <div class="sml-icon mr-20">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div class="sm-content">
                                    <span>Mail us</span>
                                    <p><a href="mailto:store@company.com">store@company.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="location-item mb-30">
                            <div class="location-image w-img mb-20">
                                <img src="assets/img/location/location-2.jpg" alt="">
                            </div>
                            <h6>150 Stanley Rd - London</h6>
                            <div class="sm-item-loc sm-item-border mb-20">
                                <div class="sml-icon mr-20">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="sm-content">
                                    <span>Find us</span>
                                    <p>Brick Ln, Spitalfields, London E1, UK</p>
                                </div>
                            </div>
                            <div class="sm-item-loc sm-item-border mb-20">
                                <div class="sml-icon mr-20">
                                    <i class="fal fa-phone-alt"></i>
                                </div>
                                <div class="sm-content">
                                    <span>Call us</span>
                                    <p><a href="tel:+8804568">(+100) 123 456 7890</a></p>
                                </div>
                            </div>
                            <div class="sm-item-loc mb-20">
                                <div class="sml-icon mr-20">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div class="sm-content">
                                    <span>Mail us</span>
                                    <p><a href="mailto:store@company.com">store@company.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="location-item mb-30">
                            <div class="location-image w-img mb-20">
                                <img src="assets/img/location/location-3.jpg" alt="">
                            </div>
                            <h6>1357 Prospect - New York</h6>
                            <div class="sm-item-loc sm-item-border mb-20">
                                <div class="sml-icon mr-20">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="sm-content">
                                    <span>Find us</span>
                                    <p>Atlantic, Brooklyn, New York, US</p>
                                </div>
                            </div>
                            <div class="sm-item-loc sm-item-border mb-20">
                                <div class="sml-icon mr-20">
                                    <i class="fal fa-phone-alt"></i>
                                </div>
                                <div class="sm-content">
                                    <span>Call us</span>
                                    <p><a href="tel:+8804568">(+100) 123 456 7890</a></p>
                                </div>
                            </div>
                            <div class="sm-item-loc mb-20">
                                <div class="sml-icon mr-20">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div class="sm-content">
                                    <span>Mail us</span>
                                    <p><a href="mailto:store@company.com">store@company.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="location-item mb-30">
                            <div class="location-image w-img mb-20">
                                <img src="assets/img/location/location-4.jpg" alt="">
                            </div>
                            <h6>86 Georgia Rd - Mardrid</h6>
                            <div class="sm-item-loc sm-item-border mb-20">
                                <div class="sml-icon mr-20">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="sm-content">
                                    <span>Find us</span>
                                    <p>Calle del Correo, 4, Madrid, Spain</p>
                                </div>
                            </div>
                            <div class="sm-item-loc sm-item-border mb-20">
                                <div class="sml-icon mr-20">
                                    <i class="fal fa-phone-alt"></i>
                                </div>
                                <div class="sm-content">
                                    <span>Call us</span>
                                    <p><a href="tel:+8804568">(+100) 123 456 7890</a></p>
                                </div>
                            </div>
                            <div class="sm-item-loc mb-20">
                                <div class="sml-icon mr-20">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div class="sm-content">
                                    <span>Mail us</span>
                                    <p><a href="mailto:store@company.com">store@company.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- location-area-end -->

        <!-- Contact Form Begin -->
        <div class="container">
            @if (session('msgContact'))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact__form__title">
                            <h3 style="color: green">{{ session('msgContact') }}</h3>
                        </div>
                        <a href="/"><i class="fa fa-backward" aria-hidden="true"></i> Quay về trang chủ</a>
                    </div>
                </div>
            @else
            <form class="jotform-form" action="{{ route('contactPost') }}" method="POST" id="contact" accept-charset="utf-8">
            @csrf
                <input type="hidden" name="formID" value="222183629415456" />
                <input type="hidden" id="JWTContainer" value="" />
                <input type="hidden" id="cardinalOrderNumber" value="" />
                <div role="main" class="form-all">
                    <ul class="form-section page-section">
                        <li id="cid_9" class="form-input-wide" data-type="control_head">
                            <div class="form-header-group  header-default">
                                <div class="header-text httal htvam">
                                    <h2 id="header_9" class="form-header" data-component="header" >
                                        Thông tin liên hệ
                                    </h2>
                                </div>
                            </div>
                        </li>
                        <li class="form-line jf-required" data-type="control_textbox" id="id_1">
                            <label class="form-label form-label-top" id="label_1" for="name" >Name: <span class="form-required">*</span></label>

                            <div id="cid_1" class="form-input-wide jf-required">
                                <input type="text" name="name" id="name" value="{{ old('name') }}" data-type="input-textbox" class="form-textbox validate[required]" data-defaultvalue="" size="20"  placeholder=" " data-component="textbox" aria-labelledby="label_1" required="" />
                                @error('name')
                                <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </li>
                        <li class="form-line jf-required" data-type="control_textbox" id="id_3">
                            <label class="form-label form-label-top" id="label_3" for="email">E-mail: <span class="form-required">*</span></label>

                            <div id="cid_3" class="form-input-wide jf-required">
                                <input type="email" name="email" id="email" value="{{ old('email') }}" data-type="input-textbox" class="form-textbox validate[required, Email]" data-defaultvalue="" size="20"  placeholder=" " data-component="textbox" aria-labelledby="label_3" required="" />
                                @error('email')
                                <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </li>
                        <li class="form-line jf-required" data-type="control_textbox" id="id_11">
                            <label class="form-label form-label-top" id="label_11" for="phone">phone: <span class="form-required">*</span></label>

                            <div id="cid_11" class="form-input-wide jf-required">
                                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" data-type="input-textbox" class="form-textbox validate[required, Email]" data-defaultvalue="" size="20"  placeholder=" " data-component="textbox" aria-labelledby="label_11" required="" />
                                @error('phone')
                                <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </li>
                        <li class="form-line jf-required" data-type="control_textarea" id="id_5">
                            <label class="form-label form-label-top" id="label_5" for="content">Message:<span class="form-required">*</span></label>

                            <div id="cid_5" class="form-input-wide jf-required">
                                <textarea class="form-textarea validate[required]" name="content" id="content" cols="31" rows="13" data-component="textarea" required="" aria-labelledby="label_5">{{ old('content') }}</textarea>
                                @error('content')
                                <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </li>
                        <li class="form-line" data-type="control_button" id="id_2">
                            <div id="cid_2" class="form-input-wide">
                                <div style="text-align:center" data-align="center" class="form-buttons-wrapper form-buttons-center   jsTest-button-wrapperField">
                                    <button id="input_2" type="submit" class="site-btn btnSend" data-component="button" data-content="">
                                        <img src="https://cms.jotform.com/uploads/image_upload/image_upload/global/7020_6145_button.png" alt="Submit" />
                                    </button>
                                </div>
                            </div>
                        </li>
                        <li style="display:none">
                            Should be Empty:
                            <input type="text" name="website" value="" />
                        </li>
                    </ul>
                </div>
            </form>
            @endif
        </div>
        <!-- Contract us-area-end -->

        <!-- cmamps-area-start -->
        <div class="cmamps-area">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1899531.5831083965!2d105.806381!3d21.58504!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x515f4860ede9e108!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5n!5e0!3m2!1sen!2sus!4v1644226635446!5m2!1sen!2sus"></iframe>
        </div>
        <!-- cmamps-area-end -->

        <!-- cta-area-start -->
{{--        <section class="cta-area d-ldark-bg pt-55 pb-10">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-4 col-md-6">--}}
{{--                        <div class="cta-item cta-item-d mb-30">--}}
{{--                            <h5 class="cta-title">Follow Us</h5>--}}
{{--                            <p>We make consolidating, marketing and tracking your social media website easy.</p>--}}
{{--                            <div class="cta-social">--}}
{{--                                <div class="social-icon">--}}
{{--                                    <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>--}}
{{--                                    <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>--}}
{{--                                    <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>--}}
{{--                                    <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>--}}
{{--                                    <a href="#" class="rss"><i class="fas fa-rss"></i></a>--}}
{{--                                    <a href="#" class="dribbble"><i class="fab fa-dribbble"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-4 col-md-6">--}}
{{--                        <div class="cta-item mb-30">--}}
{{--                            <h5 class="cta-title">Sign Up To Newsletter</h5>--}}
{{--                            <p>Join 60.000+ subscribers and get a new discount coupon  on every Saturday.</p>--}}
{{--                            <div class="subscribe__form">--}}
{{--                                <form action="#">--}}
{{--                                    <input type="email" placeholder="Enter your email here...">--}}
{{--                                    <button>subscribe</button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-4 col-md-6">--}}
{{--                        <div class="cta-item mb-30">--}}
{{--                            <h5 class="cta-title">Download App</h5>--}}
{{--                            <p>DukaMarket App is now available on App Store & Google Play. Get it now.</p>--}}
{{--                            <div class="cta-apps">--}}
{{--                                <div class="apps-store">--}}
{{--                                    <a href="#"><img src="assets/img/brand/app_ios.png" alt=""></a>--}}
{{--                                    <a href="#"><img src="assets/img/brand/app_android.png" alt=""></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </section>--}}
        <!-- cta-area-end -->

    </main>
@endsection

@section('js')
    <script type="text/javascript">
        $( document ).ready(function() {
            $('.btnSend').click(function () {
                if ($('#name').val() === '') {
                    $('#name').notify('Bạn  chưa nhập tên','error');
                    document.getElementById('name').scrollIntoView();
                    return false;
                }
                if ($('#email').val() === '') {
                    $('#email').notify('Bạn chưa nhập email','error');
                    document.getElementById('email').scrollIntoView();
                    return false;
                }
                if ($('#phone').val() === '') {
                    $('#phone').notify('Bạn  chưa nhập phone','error');
                    document.getElementById('email').scrollIntoView();
                    return false;
                }
                if ($('#content').val() === '') {
                    $('#content').notify('Bạn chưa nhập tin nhắn','error');
                    document.getElementById('email').scrollIntoView();
                    return false;
                }
            });
        });
    </script>
@endsection
