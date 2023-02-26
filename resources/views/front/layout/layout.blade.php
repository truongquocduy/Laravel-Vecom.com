
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="https://vecom.shop/images/slider_logo.png">
    <meta name="description" content="Vecom.shop - Sàn thương mại điện tử lớn nhất Châu Á. Gồm đầy đủ các mặt hàng tốt nhất thị trường trong và ngoài nước" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo-icons/slider_logo.webp') }}">
    <link rel="stylesheet" href="{{ asset('assets/lib/bootstrap-5.0.2/css/bootstrap.min.css') }}">
    <script src="{{ asset('assets/lib/bootstrap-5.0.2/js/bootstrap.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{ asset('assets/lib/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lib/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') }}">
    <script src="{{ asset('assets/lib/OwlCarousel2-2.3.4/dist/owl.carousel.min.js') }}"></script>
    <link rel="stylesheet" type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/front/main.css') }}">
    @yield('styles')
    <title>{{ settings('website-name') }} sàn thương mại điện tử lớn nhất Châu Á</title>
</head>
<body>
    <div class="loader">
        <img src="{{ asset('assets/images/logo-icons/'. settings('website-logo-loader')) }}" class="w-100" alt="settings('website-logo-loader')) }}">
    </div>
    <div class="container-fluid" id="app">
        <div class="row">
            <div class="col-lg-12 wrapper p-2 ps-4 pe-4">
                <div class="list-social text-light">
                    <a href="{{ settings('website-link-facebook') }}" target="_blank">
                        <i class="fa-brands fa-facebook me-2"></i>
                    </a>
                    <a href="{{ settings('website-link-twitter') }}" target="_blank">
                        <i class="fa-brands fa-twitter me-2"></i>
                    </a>
                    <a href="{{ settings('website-link-google') }}" target="_blank">
                        <i class="fa-brands fa-google me-2"></i>
                    </a>
                    <a href="{{ settings('website-link-pinterest') }}" target="_blank">
                        <i class="fa-brands fa-pinterest me-2"></i>
                    </a>
                    <a href="{{ settings('website-link-instagram') }}" target="_blank">
                        <i class="fa-brands fa-invision me-2"></i>
                    </a>
                </div>
                @if(!Auth::check())
                <a href="{{ route('front.user.login') }}">
                    <button class="btn btn-carts text-light"><i class="fa-solid fa-user me-2" style="color: #b06792;"></i>{{ languages('lang002') }}</button>
                </a>
                @else
                <a href="">
                    <button class="btn btn-carts text-light"><i class="fa-solid fa-user me-2" style="color: #b06792;"></i>Xin chào, {{ Auth::user()->name }}</button>
                </a>
                @endif
                <button class="btn btn-carts text-light"><i class="fa-solid fa-cart-shopping me-2" style="color: #1abc9c;"></i><a href="{{ route('front.cart.index') }}" class="text-light" style="text-decoration:none;">{{ languages('lang001') }}</a></button>
            </div>
        </div>
        <div class="row justify-content-center" id="parent-navb" style="background-color: white;">
            <div class="col-lg-12 p-3" style="display: flex;"  id="navb">
                <div id="logo">
                    <a href="{{ route('front.homepage') }}">
                        <img src="{{ asset('assets/images/logo-icons/logo2.png') }}" alt="" width="200px">
                    </a>
                </div>
                <div class="menu-primary ms-5">
                    <ul>
                        <li id="btn-menu-responsive">
                            <i class="fa-solid fa-bars" style="font-size: 30px;"></i>
                        </li>
                        <li class="mb-5 text-light" id="btn-menu-responsive-close">
                            <i class="fa-solid fa-xmark" style="font-size: 40px;float: right;"></i>
                        </li>
                        <li>
                            <a href="{{ route('front.product.index') }}">Sản phẩm</a>
                        </li>
                        <li>
                            <a href="#">Giảm giá</a>
                        </li>
                        <li>
                            <a href="{{ route('front.blog') }}">Tin tức</a>
                        </li>
                        <li>
                            <a href="#">Liên hệ</a>
                        </li>
                        <li>
                            <a href="#">Chúng tôi</a>
                        </li>
                        <li>
                            <form action="{{ route('front.product.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control rounded-0" name="search" placeholder="{{ languages('lang003') }}">
                                    <span class="input-group-text search-span">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </span>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="menu-responsive-area"></div>
        </div>
        @yield('content')
        <div class="row footer justify-content-center pt-5 pb-0">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-3 footer-row-1 text-light">
                        <img src="{{ asset('assets/images/logo-icons/' . settings('website-logo-footer')) }}" class="w-75" alt="">
                        <p class="mt-4">
                            {{ languages('lang028') }}
                        </p>
                        <p class="mt-3">
                            {{ languages('lang029') }}
                        </p>
                    </div>
                    <div class="col-lg-3 footer-row-2 text-light pt-3">
                        <h4>
                            {{ languages('lang030') }}
                        </h4>
                        <a href="#" class="footer-card-mini pb-3 mt-4">
                            <img src="{{ asset('assets/images/products/product1_a.jpg') }}" class="w-25" height="88px" alt="">
                            <div class="footer-card-mini-content ps-3">
                                <h6>Multi Author Blog Post</h6>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed varius ultricies metus.
                                </p>
                                <p>20 Tháng 2, 2022</p>
                            </div>
                        </a>
                        <a href="#" class="footer-card-mini pb-3 mt-4">
                            <img src="{{ asset('assets/images/products/product1_a.jpg') }}" class="w-25" height="88px" alt="">
                            <div class="footer-card-mini-content ps-3">
                                <h6>Multi Author Blog Post</h6>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed varius ultricies metus.
                                </p>
                                <p>20 Tháng 2, 2022</p>
                            </div>
                        </a>
                        <a href="#" class="footer-card-mini pb-3 mt-4">
                            <img src="{{ asset('assets/images/products/product1_a.jpg') }}" class="w-25" height="88px" alt="">
                            <div class="footer-card-mini-content ps-3">
                                <h6>Multi Author Blog Post</h6>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed varius ultricies metus.
                                </p>
                                <p>20 Tháng 2, 2022</p>
                            </div>
                        </a>
                        <a href="#" class="footer-card-mini pb-3 mt-4">
                            <img src="{{ asset('assets/images/products/product1_a.jpg') }}" class="w-25" height="88px" alt="">
                            <div class="footer-card-mini-content ps-3">
                                <h6>Multi Author Blog Post</h6>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed varius ultricies metus.
                                </p>
                                <p>20 Tháng 2, 2022</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 footer-row-2 text-light pt-3">
                        <h4>
                            {{ languages('lang031') }}
                        </h4>
                        <p class="mt-4">
                            <a href="https://tinnhiemmang.vn/" class="text-reset" target="_blank">
                                <img src="{{ asset('assets/images/banners/tinnhiemmang.png') }}" width="80%" alt="">
                            </a>
                        </p>
                        <p>
                            <a href="https://moit.gov.vn/" class="text-reset" target="_blank">
                                <img src="{{ asset('assets/images/banners/bocongthuong.webp') }}" width="80%" alt="">
                            </a>
                        </p>
                    </div>
                    <div class="col-lg-3 footer-row-4 text-light pt-3">
                        <h4>
                            {{ languages('lang032') }}
                        </h4>
                        <p>
                            Chi nhánh 1 <br><br>
                            Đường số 7, Tân tạo A, Q.Bình Tân, TP.HCM
                        </p>
                        <p>
                            Chi nhánh 1 <br>
                            Đường số 7, Tân tạo A, Q.Bình Tân, TP.HCM
                        </p>
                        <p>
                            Liên hệ <br><br>
                            +84 369082061 <br>
                            +84 369082061 <br>
                        </p>
                        <p>
                            Email Address<br><br>
                            quocduy13579113@gmail.com <br>
                            truongquocduy.mo@gmail.com <br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 text-light mt-3 copyring">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-8 p-4">
                                {!! languages('lang033') !!}
                            </div>
                            <div class="col-lg-4 p-3">
                                <div class="list-social-copyring text-light">
                                    <a href="#">
                                        <i class="fa-brands fa-facebook me-3"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa-brands fa-twitter me-3"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa-brands fa-google me-3"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa-brands fa-pinterest me-3"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa-brands fa-invision me-3"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://unpkg.com/vue-toastr/dist/vue-toastr.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('script')
<script src="{{ asset('assets/js/responsive.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    $(window).on("load",function () {
        $(".loader").css("display","none")
        $("#app").css("display","block")
    });
</script>
</html>