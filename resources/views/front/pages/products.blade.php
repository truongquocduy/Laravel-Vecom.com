@extends('front.layout.layout')
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/front/panigation.css') }}">
@endsection
@section('content')
<div class="row justify-content-center mt-5 mb-5">
    <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-12" style="display: flex;">
                <h4><strong>{{ languages('lang022') }}</strong></h4>
            </div>
            <div class="col-lg-3 pt-3 pb-3">
                <form action="#">
                    <div class="input-group">
                        <input type="text" class="form-control rounded-0" placeholder="{{ languages('lang023') }}">
                        <span class="input-group-text search-span">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                    </div>
                </form>
                <h5 class="title-category mt-4">
                    <span></span>
                    {{ languages('lang025') }}
                </h5>
                <ul class="list-category-product mt-2">
                    @php 
                        $category_tmp = "";
                    @endphp
                    @foreach($listCategory as $category)
                        @if($category->name != $category_tmp)
                        <li>
                            {{ $category->name }}
                            <i class="fa-solid fa-turn-down button-down"></i>

                        </li>
                        <li class="list-category-down">
                            @foreach($listCategory as $subcategory)
                            <a href="{{ route('front.product.index').'?f=' . $subcategory->sub_slug }}">{{ ($category->name === $subcategory->name) ? $subcategory->subname : '' }}</a>
                            @endforeach
                        </li>
                        @endif

                        @php 
                            $category_tmp = $category->name;
                        @endphp
                    @endforeach
                    <!-- <li>
                        Women
                        <i class="fa-solid fa-turn-down button-down"></i>
                    </li>
                    <li class="list-category-down">
                        <a href="">Top wear</a>
                        <a href="">Bottom wear</a>
                    </li> -->
                </ul>
                <h5 class="title-category mt-4">
                    <span></span>
                    {{ languages('lang026') }}
                </h5>
                <input type="range" class="form-range" min="0" max="100">
                <button class="btn btn-secondary">{{ languages('lang024') }}</button>
                <span style="float:right;margin-right: 30px;margin-top: 10px;"><strong>1k -500k</strong></span>
                <h5 class="title-category mt-4">
                    <span></span>
                    {{ languages('lang027') }}
                </h5>
                <div class="row">
                    @foreach($listBuyMost as $product)
                    <div class="col-lg-12 p-3">
                        <a href="{{ route('front.product.detail',['slug'=>$product->slug]) }}" class="product-card-mini">
                            <img src="{{ asset('assets/images/products/' . $product->image) }}" class="w-25" alt="">
                            <div class="product-card-mini-content ps-3">
                                <h5>{{ $product->name }}</h5>
                                <h5 class="product-price mt-2">
                                    {{ number_format($product->price/1000) }} K 
                                    <strike>
                                        @if($product->price != $product->cost) 
                                        {{ number_format($product->cost/1000) }} K 
                                        @endif
                                    </strike>
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
                    @endforeach
                </div>
            </div>
            <div class="col-lg-9 pt-3 pb-3">
                <div class="row">
                    <div class="col-lg-12 filter-bar">
                        <select class="form-select select-product-filter">
                            <option>Chọn: Mặc định</option>
                        </select>
                        <button class="btn btn-secondary ms-3 me-3">{{ languages('lang024') }}</button>
                        <select class="form-select select-product-filter">
                            <option>Chọn: Mặc định</option>
                        </select>
                    </div>
                    @if(Request::get('search'))
                    <h3 class="mt-3 text-end">Kết quả tìm kiếm: {{ Request::get('search') }}</h3>
                    @endif
                    @foreach($products as $product)
                    <div class="col-lg-4 col-6 p-3">
                        <div class="product">
                            <div class="product-image">
                                <img src="{{ asset('assets/images/products/' . $product->image) }}" width="100%" alt="">
                                <img src="{{ asset('assets/images/products/' . $product->getImage2()) }}" width="100%" alt="">
                            </div>
                            <div class="p-3">
                                <h5 class="product-title">{{ $product->name }}</h5>
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
                                        @if($product->price != $product->cost) 
                                        {{ number_format($product->cost/1000) }} K 
                                        @endif
                                    </strike>
                                </h5>
                                <div class="product-action pt-3">
                                    <a href="javascript:">
                                        <i class="fa-solid fa-cart-arrow-down"></i>
                                        Add to cart
                                    </a>
                                    <a href="{{ route('front.product.detail',['slug'=>$product->slug]) }}">
                                        <i class="fa-solid fa-book-open-reader"></i>
                                        Show Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @if(count($products) == 0)
                    <div class="col-lg-12">
                        <h3 class="text-center">Không có sản phẩm</h3>
                    </div>
                    @endif
                </div>
                <div class="row container-panigation justify-content-end">
                    <div class="col-lg-6">
                        <div class="panigation">
                            <ul class="more">
                                @for($i = 1; $i <= $products->lastPage(); $i++ )
                                <li><a href="{{ $products->url($i) }}" style="color:inherit;text-decoration:none;">{{ $i }}</a></li>
                                @endfor
                            </ul>
                            <ul class="primary">
                                <li>
                                    <a href="{{ ($products->currentPage() != 1) ? $products->url($products->currentPage() - 1) : $products->url(1) }}" style="color:inherit;text-decoration:none;"><i class="fa-solid fa-chevron-left"></i></a>
                                </li>
                                <li class="active"><a href="{{ $products->url($products->currentPage()) }}" style="color:inherit;text-decoration:none;">{{ $products->currentPage() }}</a></li>
                                <li class="more-active">. . .</li>
                                <li><a href="{{ $products->url($products->lastPage()) }}" style="color:inherit;text-decoration:none;">{{ $products->lastPage() }}</a></li>
                                <li>
                                    <a href="{{ ($products->currentPage() != $products->lastPage()) ? $products->url($products->currentPage() + 1) : $products->url($products->currentPage()) }}" style="color:inherit;text-decoration:none;">
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    let quality = $(".more li").length
    let aboutSpace = $(".more li").outerWidth() + 4
    let openPanigation = true
    function supportCSS() {
        if (quality % 2 == 0) {
            $(".more").css("left", - aboutSpace/2)
        }
        let itemCenter = parseInt(quality/2 + 1);
        for (let i = 1; i < itemCenter; i++) {
            $(".more li:nth-child(" + (itemCenter - i) +")").css("left", aboutSpace * i)
            $(".more li:nth-child(" + (itemCenter + i) +")").css("right", aboutSpace * i)
            $(".more li:nth-child(" + (itemCenter + i) +")").css("z-index", "-1")
        }
    }
    supportCSS()
    let itemCenter = parseInt(quality/2 + 1);
    $(".more-active").click(
        function(){
            if(openPanigation){
                $(".more-active").html('<i class="fa-solid fa-xmark"></i>')
                $(".panigation > ul.more").css("visibility", "visible")
                $( ".panigation > ul.more" ).animate({
                    top: "0px"
                }, 500, function() {
                    setTimeout(() => {
                        for (let i = 1; i < itemCenter; i++) {
                            $(".more li:nth-child(" + (itemCenter - i) +")").animate({
                                left: 0
                            })
                            $(".more li:nth-child(" + (itemCenter + i) +")").animate({
                                right: 0
                            })
                            $(".more li:nth-child(" + (itemCenter + i) +")").css("z-index", "1")
                        }
                        openPanigation = false
                    }, 40);
                });
            }
            else{
                $(".more-active").html('. . .')
                setTimeout(() => {
                    for (let i = 1; i < itemCenter; i++) {
                        $(".more li:nth-child(" + (itemCenter - i) +")").animate({
                            left: aboutSpace * i
                        })
                        $(".more li:nth-child(" + (itemCenter + i) +")").animate({
                            right: aboutSpace * i
                        }, function(){
                            $(".more li:nth-child(" + (itemCenter + i) +")").css("z-index", "-1")
                        })
                    }
                }, 40);
                setTimeout(() => {
                    $( ".panigation > ul.more" ).animate({
                        top: "58px"
                    }, 80 * 10, function(){
                        $(".panigation > ul.more").css("visibility", "hidden")
                        openPanigation = true
                    })
                },80)
            }
        },
    )
</script>
@endsection