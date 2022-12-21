@extends('front.layout.layout')
@section('content')
<div class="container-fluid" style="margin-top:120px;">
    <div class="row bg-dark p-5"
        style="background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url({{ asset('assets/images/banners/bannerNam.jpg') }});background-size: 100%;">
        <div class="col-lg-12 p-5 text-center text-light">
            <h3>SẢN PHẨM</h3>
            <p>Trang chủ * Sản phẩm</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 p-5">
            <select class="custom-select" style="float: right;width: 300px;" name="" id="hienthi">
                <option value="macdinh">Thứ tự mặc định</option>
                <option value="moinhat">Mới nhất</option>

            </select>
            <span class="mr-3 mt-2" style="float: right;">Hiện thị một kết quả duy nhất</span>
        </div>
        <div class="col-lg-3 p-5">
            <h6>DANH MỤC</h6>
            <ul class="w-100 p-4 ul_menu" style="list-style: none;border: 1px solid #ddd; padding: 0;border-radius: 5px;">
                <li class="p-3">Kem</li>
                <hr style="margin: 0;">
                <li class="p-3">Tẩy trang</li>
                <hr style="margin: 0;">
                <li class="p-3">Sữa rửa mặt</li>
                <hr style="margin: 0;">
                <li class="p-3">Sirum </li>
                <hr style="margin: 0;">
                <li class="p-3">Tất cả</li>
            </ul>
        </div>
        <div class="col-lg-9">
            <div class="row">
                @if(Request::get('search'))
                <div class="col-lg-12 p-0 pt-3 pb-3">
                    <h3><i>Kết quả tìm kiếm: {{ Request::get('search') }}</i></h3>
                </div>
                @endif
                @if(count($products) == 0)
                <div class="col-lg-12">
                    <h3 class="text-center">
                        Sản phẩm không tồn tại !!!
                    </h3>
                </div>
                @endif
                @foreach($products as $product)
                <div class="col-lg-3 col-6 p-0 products">
                    <img src="{{ asset('assets/images/products/' . $product->image) }}" width="100%" alt="">
                    <img src="{{ asset('assets/images/products/' . $product->thumbnails) }}" width="100%" alt="">
                    <div class="products-content" style="position: relative;background-color: white;">
                        <a class="btn-products" href="{{ route('front.product.detail',['slug'=>$product->slug]) }}"><img src="{{ asset('assets/images/icons/eye-solid.svg') }}"
                                alt="" style="width: 25px;opacity: 0.8;"></a>
                        <p class="product-title text-dark">{{ $product->name }}</p>
                        <p class="product-price text-dark">{{ number_format($product->price) }} VNĐ</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection