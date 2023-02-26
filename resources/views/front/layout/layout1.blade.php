<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="https://pbs.twimg.com/media/ELOV640XkAAQq_Z.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@350&family=Roboto:ital,wght@0,300;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/front/main1.css') }}">
    <link rel="stylesheet" type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <title>Vecom.com - Chào mừng đến với thế giới mua sắm !!!</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-sm fixed-top navbar-light" style="height: 120px;background-color: white;">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse bg-light" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <button class="btn"><a class="nav-link a--menu" href="{{ route('front.product.index') }}">Xu hướng</a></button>
                            <button class="btn"><a class="nav-link a--menu">Sản phẩm</a></button>

                            <button class="btn"><a class="nav-link a--menu">Giảm giá</a></button>
                        </li>
                    </ul>
                    <a class="navbar-brand mx-auto d-block" href="{{ route('front.homepage') }}"><img class="mx-auto d-block" src="{{ asset('assets/images1/logo/logo.png') }}" width="100px" alt=""></a>
                    <ul class="navbar-nav">
                        @if(!Auth::check())
                        <button class="btn"><a class="nav-link a--menu" href="{{ route('front.user.login') }}">Đăng nhập</a></button>
                        @else
                        <button class="btn"><a class="nav-link a--menu" href="{{ route('front.user.logout') }}">Xin chào, {{ Auth::user()->name }}</a></button>
                        @endif
                        <button class="btn"><a class="nav-link a--menu" href="{{ route('front.search.index') }}">Tìm kiếm</a></button>
                        <button class="btn"><a class="nav-link a--menu" href="{{ route('front.cart.index') }}">Giỏ hàng</a></button>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- Carousel -->
    </div>
    @yield('content')
    <div class="container-fluid" style="margin-top:120px;">
        <!-- footer -->
        <div class="row">
            <!-- Footer -->
            <footer class="text-center text-lg-start bg-light text-muted w-100">
                <!-- Section: Social media -->
                <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                    <!-- Left -->
                    <div class="me-5 d-none d-lg-block">
                        <span>Get connected with us on social networks:</span>
                    </div>
                    <!-- Left -->

                    <!-- Right -->
                    <div>
                        <a href="" class="mr-4 text-reset">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="" class="mr-4 text-reset">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="" class="mr-4 text-reset">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="" class="mr-4 text-reset">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="" class="mr-4 text-reset">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="" class="mr-4 text-reset">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                    <!-- Right -->
                </section>
                <!-- Section: Social media -->

                <!-- Section: Links  -->
                <section class="">
                    <div class="container text-center text-md-start mt-5">
                        <!-- Grid row -->
                        <div class="row mt-3">
                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-4 col-xl-3 col-6 mx-auto mb-4">
                                <!-- Content -->
                                <h6 class="text-uppercase fw-bold mb-4">
                                    <i class="fas fa-gem mr-3"></i>Beauty World
                                </h6>
                                <p>
                                    Here you can use rows and columns to organize your footer content. Lorem ipsum
                                    dolor sit amet, consectetur adipisicing elit.
                                </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-2 col-lg-2 col-xl-2 col-6 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">
                                    Sản phẩm
                                </h6>
                                <p>
                                    <a href="#!" class="text-reset">Kem</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">Tẩy trang</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">Sửa rửa mặt</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">Sirum</a>
                                </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-2 col-xl-2 col-6 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">
                                    Liên kết trang
                                </h6>
                                <p>
                                    <a href="https://tinnhiemmang.vn/" class="text-reset" target="_blank">
                                        <img src="{{ asset('assets/images1/banners/tinnhiemmang.png') }}" width="150px" alt="">
                                    </a>
                                </p>
                                <p>
                                    <a href="https://moit.gov.vn/" class="text-reset" target="_blank">
                                        <img src="{{ asset('assets/images1/banners/bocongthuong.webp') }}" width="150px" alt="">
                                    </a>
                                </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-4 col-lg-3 col-xl-3 col-6 mx-auto mb-md-0 mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">
                                    Liên hệ
                                </h6>
                                <p><i class="fas fa-home mr-2"></i> Bac Lieu, NY 10012, Viet Nam</p>
                                <p>
                                    <i class="fas fa-envelope mr-2"></i>
                                    truongquocduy.mo@gmail.com
                                </p>
                                <p><i class="fas fa-print mr-2"></i> + 01 234 567 89</p>
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->
                    </div>
                </section>
                <!-- Section: Links  -->

                <!-- Copyright -->
                <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                    © 2022: Created Truong Quoc Duy
                </div>
                <!-- Copyright -->
            </footer>
            <!-- Footer -->
        </div>
    </div>
</body>
<script src="https://unpkg.com/vue-toastr/dist/vue-toastr.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('script')
</html>