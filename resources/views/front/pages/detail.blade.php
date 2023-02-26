@extends('front.layout.layout')
@section('content')
<div class="row justify-content-center pt-5 pb-5 background-detail">
    <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-10" style="display: flex;">
                <h4><strong>Shop</strong></h4>
            </div>
            <div class="col-lg-2" style="display: flex;">
                <a href="#" class="len-detail">Home</a>
                <span class="ms-2 me-2">></span>
                <a href="#" class="len-detail">Shop</a>
                <span class="ms-2 me-2">></span>
                <a href="#" class="len-detail">Detail</a>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center mt-5">
    <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-4">
                <img src="{{ asset('assets/images/products/' . $productTarget->image) }}" width="100%" alt="">
                <div class="thumbnail-area w-100 mt-2">
                    <img src="{{ asset('assets/images/products/' . $productTarget->image) }}" width="24%" alt="">
                    @foreach($productTarget->getThumbnail() as $item)
                    <img src="{{ asset('assets/images/products/' . $item) }}" width="24%" alt="">
                    @endforeach
                </div>
            </div>
            <div class="col-lg-8 ps-4   ">
                <h3 class="product-detail-title">{{ $productTarget->name }}</h3>
                <h5 class="product-price mt-2">
                    {{ number_format($productTarget->price/1000)  }} K

                    <strike>
                        @if($productTarget->price != $productTarget->cost) 
                        {{ number_format($productTarget->cost/1000) }} K 
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
                <p class="mt-4 product-intro">
                    {!! $productTarget->intro !!}
                </p>
                <div class="btn-change-quality-area mt-4">
                    <button class="btn btn-outline-secondary rounded-0" @click="changeQuality('down')">
                        <i class="fa-solid fa-minus"></i>
                    </button>
                    <span>
                        @{{ selectQuality }}
                    </span>
                    <button class="btn btn-outline-secondary rounded-0" @click="changeQuality('up')">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
                <div class="action-area mt-4">
                    <button class="btn btn-buy rounded-0 mb-2">MUA NGAY</button>
                    <button class="btn btn-buy rounded-0 mb-2" @click="addCart('{{ $productTarget->id }}')">THÊM VÀO GIỎ HÀNG</button>
                </div>
                <div class="product-note mt-4">
                    Doanh mục: <a href="#">Jacket</a>
                    <font>,</font><a href="#">Jacket</a>
                </div>
                <div class="product-note mt-2">
                    Tags: <a href="#">Men</a>
                </div>
                <div class="product-note mt-2">
                    Share:
                    <div class="product-detail-social mt-3">
                        <span class="s-facebook">
                            <i class="fa-brands fa-facebook"></i>
                        </span>
                        <span class="s-twitter">
                            <i class="fa-brands fa-twitter"></i>
                        </span>
                        <span class="s-google">
                            <i class="fa-brands fa-google"></i>
                        </span>
                        <span class="s-pinterest">
                            <i class="fa-brands fa-pinterest"></i>
                        </span>
                        <span class="s-invision">
                            <i class="fa-brands fa-invision"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#home">Mô tả</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu1">Đánh giá</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane container active ps-0 pt-5" id="home">
                    <p>
                        {!! $productTarget->details !!}
                    </p>  
                </div>
                <div class="tab-pane container fade ps-0 pt-5" id="menu1">
                    <div class="row p-3">
                        <div class="col-lg-12 comment-item p-3">
                            <img src="{{ asset('assets/images/logo-icons/comment.jpg') }}" width="60px" style="float:left;" alt="">
                            <div class="ms-3 w-75" style="float:left;">
                                <strong>Truong Quoc Duy <i class="fa-solid fa-circle-check text-primary"></i></strong>
                                <span class="date-comment">- 21 Tháng 2, 2023</span>
                                <div class="product-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <p>
                                    You can never have enough of a classic, this LBD features a textured knit pattern and adjustable shoulder straps. Aenean luctus vitae felis sed euismod. Integer ornare convallis volutpat. Donec quis erat elementum, auctor erat ac, volutpat dolor.
                                </p>
                                <div class="w-100">
                                    <!-- <span class="btn">
                                        <i class="fa-solid fa-pen-to-square me-1"></i>
                                        Trả lời
                                    </span> -->
                                    <span class="btn">
                                        <i class="fa-solid fa-pen-to-square me-1"></i>
                                        Chỉnh sửa
                                    </span>
                                    <span class="btn">
                                        <i class="fa-solid fa-trash me-1"></i>
                                        Xóa đánh giá
                                    </span>
                                </div>
                            </div>
                            
                            
                        </div>
                        <div class="col-lg-12 comment-item p-3">
                            <img src="{{ asset('assets/images/logo-icons/comment.jpg') }}" width="60px" style="float:left;" alt="">
                            <div class="ms-3 w-75" style="float:left;">
                                <strong>Truong Quoc Duy <i class="fa-solid fa-circle-check text-primary"></i></strong>
                                <span class="date-comment">- 21 Tháng 2, 2023</span>
                                <div class="product-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <p>
                                    You can never have enough of a classic, this LBD features a textured knit pattern and adjustable shoulder straps. Aenean luctus vitae felis sed euismod. Integer ornare convallis volutpat. Donec quis erat elementum, auctor erat ac, volutpat dolor.
                                </p>
                                <div class="w-100">
                                    <!-- <span class="btn">
                                        <i class="fa-solid fa-pen-to-square me-1"></i>
                                        Trả lời
                                    </span> -->
                                    <span class="btn">
                                        <i class="fa-solid fa-pen-to-square me-1"></i>
                                        Chỉnh sửa
                                    </span>
                                    <span class="btn">
                                        <i class="fa-solid fa-trash me-1"></i>
                                        Xóa đánh giá
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <span class="btn" id="write-comment">
                                <i class="fa-solid fa-pen-to-square me-1"></i>
                                Viết đánh giá
                            </span>
                        </div>
                        <div class="col-lg-12 p-3 comment-edit">
                            <form action="#" @submit="rating($event)">
                                <div class="mb-2 star-number-area">
                                    <span class="rating-star" data-rating="1" onclick="selectRatingStar(this)"><i class="fa-solid fa-star" ></i></span>
                                    <span class="rating-star" data-rating="2" onclick="selectRatingStar(this)"><i class="fa-solid fa-star" ></i></span>
                                    <span class="rating-star" data-rating="3" onclick="selectRatingStar(this)"><i class="fa-solid fa-star" ></i></span>
                                    <span class="rating-star" data-rating="4" onclick="selectRatingStar(this)"><i class="fa-solid fa-star" ></i></span>
                                    <span class="rating-star" data-rating="5" onclick="selectRatingStar(this)"><i class="fa-solid fa-star" ></i></span>
                                </div>
                                <label for="comment">Đánh giá của bạn:</label>
                                <textarea class="form-control" rows="3" id="comment" name="content"></textarea>
                                <input type="hidden" name="star" id="star-number-hidden" value="0">
                                <button class="btn rounded-0 mt-3 ps-3 pe-3 text-light" style="background-color: var(--background-2);">GỬI</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12 mb-5">
                <h3 class="mb-4"><font style="font-weight: 1000;">Có thể</font> bạn thích . . .</h3>
                <div class="owl-carousel owl-carousel-detail owl-theme">
                    <div class="item">
                        <div class="product">
                            <div class="product-image">
                                <img src="{{ asset('assets/images/products/product1_a.jpg') }}" width="100%" alt="">
                                <img src="{{ asset('assets/images/products/product1_b.jpg') }}" width="100%" alt="">
                            </div>
                            <div class="p-3">
                                <h5 class="product-title">Hoodie Jacket</h5>
                                <div class="product-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <h5 class="product-price mt-2">
                                    235K
                                </h5>
                                <div class="product-action pt-3">
                                    <a href="#">
                                        <i class="fa-solid fa-cart-arrow-down"></i>
                                        Add to cart
                                    </a>
                                    <a href="javascript:">
                                        <i class="fa-solid fa-book-open-reader"></i>
                                        Show Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product">
                            <div class="product-image">
                                <img src="{{ asset('assets/images/products/product1_a.jpg') }}" width="100%" alt="">
                                <img src="{{ asset('assets/images/products/product1_b.jpg') }}" width="100%" alt="">
                            </div>
                            <div class="p-3">
                                <h5 class="product-title">Hoodie Jacket</h5>
                                <div class="product-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <h5 class="product-price mt-2">
                                    235K
                                </h5>
                                <div class="product-action pt-3">
                                    <a href="#">
                                        <i class="fa-solid fa-cart-arrow-down"></i>
                                        Add to cart
                                    </a>
                                    <a href="javascript:">
                                        <i class="fa-solid fa-book-open-reader"></i>
                                        Show Detail
                                    </a>
                                </div>
                            </div>
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
    Vue.config.ignoredElements = [/^ion-/]
    var app1 = new Vue({
        el: '#app',
        data: {
            selectQuality: 1,
            strComment: "",
            btnComment:false,
            listComments: []
        },
        methods:{
            changeQuality: function(method){
                if(method == "up"){
                    if(this.selectQuality + 1 <= '{{ $productTarget->instock }}') {
                        this.selectQuality ++
                    }
                    else{
                        toastr.warning("Cảnh báo", "Không đủ số lượng sản phẩm");

                    }
                }
                else{
                    if(this.selectQuality - 1 != 0) {
                        this.selectQuality --
                    }
                    else{
                        toastr.warning("Cảnh báo", "Không thể tiếp tục giảm");
                    }
                }
            },
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
            },
            addComment: function(product_id,event) {
                if(event) {
                    event.preventDefault()
                }
                if(this.strComment != ""){
                    axios.post("{{ route('front.product.comment') }}",null,{
                        params: {
                            product_id: product_id,
                            ojb_comment: {
                                content: this.strComment,
                                images: []
                            }
                        }
                    })
                    .then(response =>{
                            if(response.data.status == "000"){
                                this.listComments = response.data.data
                                this.strComment = ""
                            }
                            else{
                                toastr.error("Lỗi", "Không tải được bình luận")
                            }
                        }
                    )
                }
                else{
                    toastr.warning("Cảnh báo", "Vui lòng nhập bình luận")
                }
            },
            rating: function(event) {
                if(event) {
                    event.preventDefault()
                }
                if(event.target.star.value == 0) {
                    $(".star-number-area").addClass('star-number-animation')
                    toastr.warning("Cảnh báo", "Vui lòng chọn số sao đánh giá")
                    setTimeout(() => {
                        $(".star-number-area").removeClass('star-number-animation')
                    }, 3000);
                    return
                }
                if(event.target.content.value == "") {
                    toastr.warning("Cảnh báo", "Vui lòng viết đánh giá")
                    return

                }
                console.log(event.target.star.value)
                
            }

            
        },
        watch: {
            strComment: function() {
                if(this.strComment != ""){
                    this.btnComment = true
                }
                else{
                    this.btnComment = false
                }
            }
        },
        mounted:function(){
            axios.get("{{ route('front.product.comment') }}/" + '{{ $productTarget->id }}')
            .then(response =>{
                    if(response.data.status == "000"){
                        this.listComments = response.data.data
                    }
                    else{
                        toastr.error("Lỗi", "Không tải được bình luận")
                    }
                }
            )
        }
    })
</script>
@endsection