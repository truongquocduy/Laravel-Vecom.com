@extends('front.layout.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 p-0">
        <div class="owl-carousel owl-carousel-banner owl-theme">
            @foreach($listSlider as $slider)
            <div class="item">
                <img src="{{ asset('assets/images/banners/' . $slider->value) }}" alt="">
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-10 col-10 slider-custom-1 mt-5 text-light p-4">
        <div class="slider-custom-1-child p-5 text-center">
            <h4>{{ languages('lang004') }}</h4>
            <p>{{ languages('lang005') }}</p>
        </div>
    </div>
</div>
<div class="row justify-content-center mt-5 product-area">
    <div class="col-lg-10">
        <h4 class="title-product-area">
            <span></span>
            {{ languages('lang006') }}
            <a href="{{ route('front.product.index') . '?s=trends' }}"class="product-view-more mt-3">{{ languages('lang019') }}</a>
        </h4>
        <p>{{ languages('lang007') }}</p>
        <div class="row">
            @foreach($trend_products as $product)
            <div class="col-lg-3 col-6 p-3">
                <div class="product">
                    <div class="product-image">
                        <img src="{{ asset('assets/images/products/' . $product->image) }}" width="100%" alt="">
                        <img src="{{ asset('assets/images/products/' . $product->getImage2()) }}" width="100%" alt="">
                    </div>
                    <div class="p-3">
                        <h5 class="product-title" data-bs-toggle="tooltip" title="{{ $product->name }}">{{ $product->name }}</h5>
                        <div class="product-rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h5 class="product-price mt-2">
                            {{ number_format($product->price/1000) }} K
                        </h5>
                        <div class="product-action pt-3">
                            <a href="javascript:" @click="addCart('{{ $product->id }}')">
                                <i class="fa-solid fa-cart-arrow-down"></i>
                                {{ languages('lang020') }}
                            </a>
                            <a href="{{ route('front.product.detail',['slug'=>$product->slug]) }}">
                                <i class="fa-solid fa-book-open-reader"></i>
                                {{ languages('lang021') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="row justify-content-center mt-4">
    <div class="col-lg-10 pt-5 border-top">
        <table>
            <tr>
                <td rowspan="2" class="p-3">
                    <img src="{{ asset('assets/images/banners/'. $listSBanner[0]->value) }}" class="w-100 slider-hover" alt="">
                </td>
                <td>
                    <img src="{{ asset('assets/images/banners/' . $listSBanner[1]->value) }}" class="w-100 slider-hover" alt="">

                </td>
            </tr>
            <tr>
                <td>
                    <img src="{{ asset('assets/images/banners/' . $listSBanner[2]->value) }}" class="w-100 slider-hover" alt="">
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="row justify-content-center mt-5 product-area">
    <div class="col-lg-10">
        <h4 class="title-product-area">
            <span></span>
            {{ languages('lang008') }}
            <a href="{{ route('front.product.index') . '?s=discounts' }}"class="product-view-more mt-3">{{ languages('lang019') }}</a>
        </h4>
        <p>{{ languages('lang009') }}</p>
        <div class="row">
            @foreach($discount_products as $product)
            <div class="col-lg-3 col-6 p-3">
                <div class="product">
                    <div class="product-image">
                        <img src="{{ asset('assets/images/products/' . $product->image) }}" width="100%" alt="">
                        <img src="{{ asset('assets/images/products/' . $product->getImage2()) }}" width="100%" alt="">
                    </div>
                    <div class="p-3">
                        <h5 class="product-title" data-bs-toggle="tooltip" title="{{ $product->name }}">{{ $product->name }}</h5>
                        <div class="product-rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h5 class="product-price mt-2">
                            {{ number_format($product->price/1000) }} K
                            <strike>
                                {{ number_format($product->cost/1000) }} K 
                            </strike>
                        </h5>
                        <div class="product-action pt-3">
                            <a href="javascript:" @click="addCart('{{ $product->id }}')">
                                <i class="fa-solid fa-cart-arrow-down"></i>
                                {{ languages('lang020') }}
                            </a>
                            <a href="{{ route('front.product.detail',['slug'=>$product->slug]) }}">
                                <i class="fa-solid fa-book-open-reader"></i>
                                {{ languages('lang021') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="row backgroud1 justify-content-center mt-5" style="background: {{ (isset($listSBanner[3])) ? asset('assets/images/banner/' . $listSBanner[3]->value) : 'black' }}">
    <div class="col-lg-10 p-5">
        <h1 class="backgroud1-title1">{{ languages('lang012') }}</h1>
        <span class="backgroud1-title2">{{ languages('lang013') }}</span>
        <h6 class="mt-3">
            {{ languages('lang014') }}
        </h6>
        <button class="btn btn-outline-light">{{ languages('lang015') }}</button>
    </div>
</div>
<div class="row justify-content-center mt-5 product-area">
    <div class="col-lg-10">
        <h4 class="title-product-area">
            <span></span>
            {{ languages('lang010') }}
            <a href="#"class="product-view-more mt-3">{{ languages('lang019') }}</a>
        </h4>
        <p>{{ languages('lang011') }}</p>
        <div class="row">
            <div class="col-lg-6 p-4">
                <div class="blog-card">
                    <img src="{{ asset('assets/images/blogs/blog1.jpg') }}" class="w-50" alt="">
                    <div class="blog-card-date">
                        <h5 class="m-0">14</h5>
                        <h6>FEB</h6>
                    </div>
                    <div class="blog-card-content ps-3">
                        <a href="#"><h4>A Random Walk</h4></a>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed varius ultricies metus. Donec ac ex porta libero venenatis sodales.
                        </p>
                        <span><i class="fa-solid fa-comment me-2"></i>A Random Walk</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-4">
                <div class="blog-card">
                    <img src="{{ asset('assets/images/blogs/blog1.jpg') }}" class="w-50" alt="">
                    <div class="blog-card-date">
                        <h5 class="m-0">14</h5>
                        <h6>FEB</h6>
                    </div>
                    <div class="blog-card-content ps-3">
                        <a href="#"><h4>A Random Walk</h4></a>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed varius ultricies metus. Donec ac ex porta libero venenatis sodales.
                        </p>
                        <span><i class="fa-solid fa-comment me-2"></i>A Random Walk</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-4">
                <div class="blog-card">
                    <img src="{{ asset('assets/images/blogs/blog1.jpg') }}" class="w-50" alt="">
                    <div class="blog-card-date">
                        <h5 class="m-0">14</h5>
                        <h6>FEB</h6>
                    </div>
                    <div class="blog-card-content ps-3">
                        <a href="#"><h4>A Random Walk</h4></a>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed varius ultricies metus. Donec ac ex porta libero venenatis sodales.
                        </p>
                        <span><i class="fa-solid fa-comment me-2"></i>A Random Walk</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-4">
                <div class="blog-card">
                    <img src="{{ asset('assets/images/blogs/blog1.jpg') }}" class="w-50" alt="">
                    <div class="blog-card-date">
                        <h5 class="m-0">14</h5>
                        <h6>FEB</h6>
                    </div>
                    <div class="blog-card-content ps-3">
                        <a href="#"><h4>A Random Walk</h4></a>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed varius ultricies metus. Donec ac ex porta libero venenatis sodales.
                        </p>
                        <span><i class="fa-solid fa-comment me-2"></i>A Random Walk</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center mt-5 product-area">
    <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-4 p-3">
                <h4 class="title-product-area">
                    <span></span>
                    {{ languages('lang016') }}
                </h4>
                <div class="row mt-4">
                    <div class="col-lg-12 p-3">
                        <a href="#" class="product-card-mini">
                            <img src="{{ asset('assets/images/products/product1_a.jpg') }}" class="w-25" alt="">
                            <div class="product-card-mini-content ps-3">
                                <h5>Hoodie Jacket</h5>
                                <h5 class="product-price mt-2">
                                    235K
                                </h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-12 p-3">
                        <a href="#" class="product-card-mini">
                            <img src="{{ asset('assets/images/products/product1_a.jpg') }}" class="w-25" alt="">
                            <div class="product-card-mini-content ps-3">
                                <h5>Hoodie Jacket</h5>
                                <h5 class="product-price mt-2">
                                    235K
                                </h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-12 p-3">
                        <a href="#" class="product-card-mini">
                            <img src="{{ asset('assets/images/products/product1_a.jpg') }}" class="w-25" alt="">
                            <div class="product-card-mini-content ps-3">
                                <h5>Hoodie Jacket</h5>
                                <h5 class="product-price mt-2">
                                    235K
                                </h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-12 p-3">
                        <a href="#" class="product-card-mini">
                            <img src="{{ asset('assets/images/products/product1_a.jpg') }}" class="w-25" alt="">
                            <div class="product-card-mini-content ps-3">
                                <h5>Hoodie Jacket</h5>
                                <h5 class="product-price mt-2">
                                    235K
                                </h5>
                            </div>
                        </a>
                    </div>
                </div>
                <a href="#"class="product-view-more mt-3" style="float: unset;">{{ languages('lang019') }}</a>
            </div>
            <div class="col-lg-4 p-3">
                <h4 class="title-product-area">
                    <span></span>
                    {{ languages('lang017') }}
                </h4>
                <div class="row mt-4">
                    <div class="col-lg-12 p-3">
                        <a href="#" class="product-card-mini">
                            <img src="{{ asset('assets/images/products/product1_a.jpg') }}" class="w-25" alt="">
                            <div class="product-card-mini-content ps-3">
                                <h5>Hoodie Jacket</h5>
                                <h5 class="product-price mt-2">
                                    <strike>12K</strike> 235K
                                </h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-12 p-3">
                        <a href="#" class="product-card-mini">
                            <img src="{{ asset('assets/images/products/product1_a.jpg') }}" class="w-25" alt="">
                            <div class="product-card-mini-content ps-3">
                                <h5>Hoodie Jacket</h5>
                                <h5 class="product-price mt-2">
                                    <strike>12K</strike> 235K
                                </h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-12 p-3">
                        <a href="#" class="product-card-mini">
                            <img src="{{ asset('assets/images/products/product1_a.jpg') }}" class="w-25" alt="">
                            <div class="product-card-mini-content ps-3">
                                <h5>Hoodie Jacket</h5>
                                <h5 class="product-price mt-2">
                                    <strike>12K</strike> 235K
                                </h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-12 p-3">
                        <a href="#" class="product-card-mini">
                            <img src="{{ asset('assets/images/products/product1_a.jpg') }}" class="w-25" alt="">
                            <div class="product-card-mini-content ps-3">
                                <h5>Hoodie Jacket</h5>
                                <h5 class="product-price mt-2">
                                    <strike>12K</strike> 235K
                                </h5>
                            </div>
                        </a>
                    </div>
                </div>
                <a href="#"class="product-view-more mt-3" style="float: unset;">{{ languages('lang019') }}</a>
            </div>
            <div class="col-lg-4 p-3">
                <h4 class="title-product-area">
                    <span></span>
                    {{ languages('lang018') }}
                </h4>
                <div class="row mt-4">
                    <div class="col-lg-12 p-3">
                        <a href="#" class="product-card-mini">
                            <img src="{{ asset('assets/images/products/product1_a.jpg') }}" class="w-25" alt="">
                            <div class="product-card-mini-content ps-3">
                                <h5>Hoodie Jacket</h5>
                                <h5 class="product-price mt-2">
                                    235K
                                </h5>
                                <div class="product-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-12 p-3">
                        <a href="#" class="product-card-mini">
                            <img src="{{ asset('assets/images/products/product1_a.jpg') }}" class="w-25" alt="">
                            <div class="product-card-mini-content ps-3">
                                <h5>Hoodie Jacket</h5>
                                <h5 class="product-price mt-2">
                                    235K
                                </h5>
                                <div class="product-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-12 p-3">
                        <a href="#" class="product-card-mini">
                            <img src="{{ asset('assets/images/products/product1_a.jpg') }}" class="w-25" alt="">
                            <div class="product-card-mini-content ps-3">
                                <h5>Hoodie Jacket</h5>
                                <h5 class="product-price mt-2">
                                    235K
                                </h5>
                                <div class="product-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-12 p-3">
                        <a href="#" class="product-card-mini">
                            <img src="{{ asset('assets/images/products/product1_a.jpg') }}" class="w-25" alt="">
                            <div class="product-card-mini-content ps-3">
                                <h5>Hoodie Jacket</h5>
                                <h5 class="product-price mt-2">
                                    235K
                                </h5>
                                <div class="product-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <a href="#"class="product-view-more mt-3" style="float: unset;">{{ languages('lang019') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    Vue.config.ignoredElements = [/^ion-/]
    var app1 = new Vue({
        el: '#app',
        data: {
            selectQuality: 1
        },
        methods:{
            addCart: function(productID) {
                axios.post("{{ route('front.cart.add') }}",null,{
                    params: {
                        product_id: productID,
                        quality: this.selectQuality
                    }
                })
                    .then(response =>{
                            if(response.data.status == "001") {
                                window.location.href = "{{ route('front.user.login') }}"
                                return
                            }
                            if(response.data.status == "000") {
                                toastr.success("Thành công", "Đã thêm sản phẩm vào giỏ");
                            }
                            else{
                                toastr.warning("Cảnh báo", response.data.message);
                            }
                            
                        }
                    )
            }
        }
    })
</script>
@endsection