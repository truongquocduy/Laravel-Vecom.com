@extends('front.layout.layout')
@section('content')
<div class="container-fluid" style="margin-top:120px;">
    <div class="row">
        <div class="col-lg-12 col-12 p-0">
            <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                    <li data-target="#demo" data-slide-to="3"></li>
                    <li data-target="#demo" data-slide-to="4"></li>
                    <li data-target="#demo" data-slide-to="5"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/banners/banner1.webp') }}" class="w-100" alt="Los Angeles" style="max-height: 450px">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/banners/banner2.png') }}" class="w-100" alt="Los Angeles" style="max-height: 450px">
                    </div>
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/images/banners/banner3.png') }}" class="w-100" alt="Los Angeles" style="max-height: 450px">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/banners/banner4.png') }}" class="w-100" alt="Los Angeles" style="max-height: 450px">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/banners/banner5.png') }}" class="w-100" alt="Los Angeles" style="max-height: 450px">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/banners/banner6.png') }}" class="w-100" alt="Los Angeles" style="max-height: 450px">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>

            </div>
        </div>
        <div class="col-lg-12" style="position: absolute;height: 700px;"></div>
    </div>
    <div class="row">
        <div class="col-lg-12" style="display: flex;">
            <a class="navbar-brand mt-2" href="#">
                <h2>Xu hướng</h2>
            </a>
            <ul class="mt-2">
                <li class="nav-item">
                    <button class="btn"><a class="nav-link a--menu" href="#">Kem</a></button>
                    <button class="btn"><a class="nav-link a--menu " href="./product.html">Tẩy Trang</a></button>
                    <button class="btn"><a class="nav-link a--menu " href="./product.html">Sữa rửa mặt</a></button>
                    <button class="btn"><a class="nav-link a--menu " href="./product.html">Sirum</a></button>
                </li>
            </ul>
            <ul class="navbar-nav mt-2">
                <button class="btn"><a class="nav-link a--menu" href="#">----- Xem Tất cả</a></button>
            </ul>
        </div>
    </div>
    <div class="row pl-3 pr-3">
        <div class="col-lg-2 p-0 products col-6">
            <img src="{{ asset('assets/images/products/sp4_1.png') }}" width="100%" alt="">
            <img src="{{ asset('assets/images/products/sp4_2.png') }}" width="100%" alt="">
            <div class="products-content" style="position: relative;background-color: white;">
                <div class="btn-products" ><img src="{{ asset('assets/images/icons/eye-solid.svg') }}" alt=""
                    style="width: 24px;opacity: 0.8;"></div>
                <!-- <a class="btn-products2">
                    <img src="assets/images/icons/eye-solid.svg" alt="" style="width: 25px;opacity: 0.8;">
                </a> -->
                <p class="product-title text-dark">Sữa rửa mặt nam - nữ</p>
                <p class="product-price text-dark">120,000 VNĐ</p>
            </div>
        </div>
        <div class="col-lg-2 p-0 products col-6">
            <img src="{{ asset('assets/images/products/sp4_1.png') }}" width="100%" alt="">
            <img src="{{ asset('assets/images/products/sp4_2.png') }}" width="100%" alt="">
            <div class="products-content" style="position: relative;background-color: white;">
                <div class="btn-products" ><img src="{{ asset('assets/images/icons/eye-solid.svg') }}" alt=""
                    style="width: 24px;opacity: 0.8;"></div>
                <!-- <a class="btn-products2">
                    <img src="assets/images/icons/eye-solid.svg" alt="" style="width: 25px;opacity: 0.8;">
                </a> -->
                <p class="product-title text-dark">Sữa rửa mặt nam - nữ</p>
                <p class="product-price text-dark">120,000 VNĐ</p>
            </div>
        </div>
        <div class="col-lg-2 p-0 products col-6">
            <img src="{{ asset('assets/images/products/sp4_1.png') }}" width="100%" alt="">
            <img src="{{ asset('assets/images/products/sp4_2.png') }}" width="100%" alt="">
            <div class="products-content" style="position: relative;background-color: white;">
                <div class="btn-products" ><img src="{{ asset('assets/images/icons/eye-solid.svg') }}" alt=""
                    style="width: 24px;opacity: 0.8;"></div>
                <!-- <a class="btn-products2">
                    <img src="assets/images/icons/eye-solid.svg" alt="" style="width: 25px;opacity: 0.8;">
                </a> -->
                <p class="product-title text-dark">Sữa rửa mặt nam - nữ</p>
                <p class="product-price text-dark">120,000 VNĐ</p>
            </div>
        </div>
        <div class="col-lg-2 p-0 products col-6">
            <img src="{{ asset('assets/images/products/sp4_1.png') }}" width="100%" alt="">
            <img src="{{ asset('assets/images/products/sp4_2.png') }}" width="100%" alt="">
            <div class="products-content" style="position: relative;background-color: white;">
                <div class="btn-products" ><img src="{{ asset('assets/images/icons/eye-solid.svg') }}" alt=""
                    style="width: 24px;opacity: 0.8;"></div>
                <!-- <a class="btn-products2">
                    <img src="assets/images/icons/eye-solid.svg" alt="" style="width: 25px;opacity: 0.8;">
                </a> -->
                <p class="product-title text-dark">Sữa rửa mặt nam - nữ</p>
                <p class="product-price text-dark">120,000 VNĐ</p>
            </div>
        </div>
        <div class="col-lg-2 p-0 products col-6">
            <img src="{{ asset('assets/images/products/sp4_1.png') }}" width="100%" alt="">
            <img src="{{ asset('assets/images/products/sp4_2.png') }}" width="100%" alt="">
            <div class="products-content" style="position: relative;background-color: white;">
                <div class="btn-products" ><img src="{{ asset('assets/images/icons/eye-solid.svg') }}" alt=""
                    style="width: 24px;opacity: 0.8;"></div>
                <!-- <a class="btn-products2">
                    <img src="assets/images/icons/eye-solid.svg" alt="" style="width: 25px;opacity: 0.8;">
                </a> -->
                <p class="product-title text-dark">Sữa rửa mặt nam - nữ</p>
                <p class="product-price text-dark">120,000 VNĐ</p>
            </div>
        </div>
        <div class="col-lg-2 p-0 products col-6">
            <img src="{{ asset('assets/images/products/sp4_1.png') }}" width="100%" alt="">
            <img src="{{ asset('assets/images/products/sp4_2.png') }}" width="100%" alt="">
            <div class="products-content" style="position: relative;background-color: white;">
                <div class="btn-products" ><img src="{{ asset('assets/images/icons/eye-solid.svg') }}" alt=""
                    style="width: 24px;opacity: 0.8;"></div>
                <!-- <a class="btn-products2">
                    <img src="assets/images/icons/eye-solid.svg" alt="" style="width: 25px;opacity: 0.8;">
                </a> -->
                <p class="product-title text-dark">Sữa rửa mặt nam - nữ</p>
                <p class="product-price text-dark">120,000 VNĐ</p>
            </div>
        </div>
    </div>
</div>
@endsection