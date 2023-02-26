
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
    <link rel="stylesheet" type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/front/main.css') }}">
    @yield('styles')
    <style>
        /* login admin */
        .admin-background {
            background-color: var(--background-1);
            margin-top: 6%;
            border-radius: 8px;
        }
    </style>
    <title>Vecom.shop sàn thương mại điện tử lớn nhất Châu Á</title>
</head>
<body>
    <div class="loader">
        <img src="{{ asset('assets/images/logo-icons/loader.gif') }}" class="w-100" alt="">
    </div>
    <div class="container-fluid" id="app">
        <div class="row">
            <div class="col-lg-6 col-10 admin-background text-light mx-auto p-5">
                <h3 class="text-center">LOGIN ADMIN</h3>
                <div class="row justify-content-center">
                    <div class="col-lg-6 mt-3">
                        <form action="{{ route('admin.login') }}" method="POST">
                            @csrf
                            <div class="mb-3 mt-3">
                                <input type="email" class="form-control p-3 rounded-0" id="email" placeholder="Enter email"
                                    name="email">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control p-3 rounded-0" id="pwd" placeholder="Enter password"
                                    name="password">
                            </div>
                            <button type="submit" class="btn btn-primary rounded-0 ps-5 pe-5 p-3">ĐĂNG NHẬP</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('assets/js/responsive.js') }}"></script>
<script src="https://unpkg.com/vue-toastr/dist/vue-toastr.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('script')
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    $(window).on("load",function () {
        $(".loader").css("display","none")
        $("#app").css("display","block")
    });
</script>
</html>