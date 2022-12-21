@extends('front.layout.layout')
@section('content')
<div class="container-fluid" style="margin-top:120px;" id="app">
    <div class="row bg-dark p-5" style="background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url({{ asset('assets/images/banners/bannerNam.jpg') }});background-size: 100%;height: 500px;">
        <div class="col-lg-12 p-5 text-center text-light" >
            <h3>Sản phẩm</h3>
            <p>Trang chủ * Sản phẩm * {{ $productTarget->name }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 mx-auto" style="margin-top: -200px;background-color: white;">
            <div class="row pt-3">
                <div class="col-lg-5 p-5">
                    <img src="{{ asset('assets/images/products/' . $productTarget->image) }}" alt="" class="w-100">

                    <div class="row p-3">
                        <div class="col-lg-3 col-3 p-0">
                            <img src="{{ asset('assets/images/products/' . $productTarget->image) }}" alt="" class="w-100">
                        </div>
                        <div class="col-lg-3 col-3 p-0">
                            <img src="{{ asset('assets/images/products/' . $productTarget->thumbnails) }}" alt="" class="w-100">
                        </div>
                        <div class="col-lg-3 col-3 p-0">
                            <img src="{{ asset('assets/images/products/' . $productTarget->thumbnails) }}" alt="" class="w-100">
                        </div>
                        <div class="col-lg-3 col-3 p-0">
                            <img src="{{ asset('assets/images/products/' . $productTarget->thumbnails) }}" alt="" class="w-100">
                        </div>
                    </div>

                </div>
                <div class="col-lg-7 p-5">
                    <h3>
                        {{ $productTarget->name }}
                    </h3>
                    <h4 class="mt-4" style="font-weight: 400;">
                        <strong>{{ number_format($productTarget->price) }}  VNĐ</strong>
                    </h4>
                    <p class="mt-4" style="font-weight: 400;">
                        TÌNH TRẠNG: 
                        @if($productTarget->instock > 0)
                            <span class="ms-3 text-success">CÒN HÀNG <img class="mb-1" src="{{ asset('assets/images/icons/checkbox-outline.svg') }}" width="16px" alt=""></span>
                        @else
                            <span class="ms-3 text-danger">HẾT HÀNG <i class="fa-solid fa-circle-exclamation"></i></span>
                        @endif
                    </p>
                    
                    <p class="mt-4" style="font-weight: 400;">
                        SỐ LƯỢNG: {{ $productTarget->instock }}
                    </p>
                    <button class="btn btn-primary mr-2" @click="changeQuality('down')"><strong>-</strong></button>
                    <button class="btn btn-secondary" disabled><strong>@{{ selectQuality }}</strong></button>
                    <button class="btn btn-primary ml-2" @click="changeQuality('up')"><strong>+</strong></button>

                    <p class="mt-4" style="font-weight: 400;">
                        {{ $productTarget->intro }}
                    </p>

                    <button class="btn text-light p-3 w-100 mt-5" style="background-color: #535353;border-radius: unset;" @click="addCart('{{ $productTarget->id }}')">THÊM VÀO GIỎ HÀNG</button>
                    <button class="btn btn-outline-success p-3 w-100 mt-2" style="border-radius: unset;">THÊM VÀO MỤC YÊU THÍCH</button>

                    <p class="mt-4" style="font-weight: 400;line-height: 40px;">
                        GỌI ĐỂ ĐẶT HÀNG: <br>
                        0369082061
                    </p>

                    <p class="mt-4" style="font-weight: 400;line-height: 40px;">
                        <img src="{{ asset('assets/images/icons/share-social-outline.svg') }}" width="20px" alt="">
                        <span class="ml-2" style="font-weight: 100;font-size: 15px;">Share</span>
                        <img class="ml-2" src="{{ asset('assets/images/icons/logo-facebook.svg') }}" width="20px" alt="">
                        <img class="ml-2" src="{{ asset('assets/images/icons/logo-youtube.svg') }}" width="20px" alt="">
                        <img class="ml-2" src="{{ asset('assets/images/icons/logo-twitter.svg') }}" width="20px" alt="">
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-5" style="background-color: #f5f3ee;">
        
        <div class="col-lg-10 mx-auto">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#home">Thông tin sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#menu1">Chất liệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#menu2">Bình luận</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#menu3">Đánh giá</a>
                </li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane container active" id="home">
                    <div class="row pt-5">
                        <div class="col-lg-12" style="min-height: 300px;">
                            <h2 style="font-weight: 400;">THÔNG TIN SẢN PHẨM</h2>
                            <p class="mt-2" style="line-height:40px;">
                                {!! $productTarget->details !!}
                            </p>
                            <!-- <iframe width="50%" height="300" src="https://www.youtube.com/embed/dRrAexT9it4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                        </div>
                    </div>
                </div>
                <div class="tab-pane container fade" id="menu1">
                    <div class="row pt-5">
                        <div class="col-lg-12" style="min-height: 300px;">
                            <h2 style="font-weight: 400;">CHẤT LIỆU</h2>
                            <p class="mt-2" style="line-height:40px;">
                                {!! $productTarget->material !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane container fade" id="menu2">
                    <div class="row pt-5">
                        <div class="col-lg-12" style="min-height: 300px;">
                            <h2 style="font-weight: 400;">ĐÁNH GIÁ SẢN PHẨM</h2>
                            <div class="row mt-4">
                                <div v-for="item in listComments" class="col-lg-12 bg-light mb-3 ml-3 p-3" style="display:flex;">
                                    <img src="{{ asset('assets/images/users/duy.jpg') }}" class="rounded" width="80px" height="80px" alt="">
                                    <div class="ml-3">
                                        <p><i>
                                            @{{ item.content  }}
                                        </i></p> 
                                        <p><i>
                                            @{{ item.user_name }}
                                            <span class="ml-3"> @{{ item.create_At }}</span>
                                            <span class="ml-3">
                                                <a href="#"><i class="fa-solid fa-heart"></i> Yêu thích</a>
                                                <a href="#" class="text-danger ml-3"><i class="fa-solid fa-flag"></i> Báo cáo</a>
                                            </span>
                                        </i></p>
                                    </div>
                                </div>
                                <div v-show="listComments.length == 0" class="col-lg-12 text-center p-3">
                                    <h4>Chưa có bình luận !!!</h4>
                                </div>
                                @if(Auth::check())
                                    <div class="col-lg-12">
                                        <form @submit="addComment('{{ $productTarget->id }}',$event)">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" id="comment" placeholder="Viết bình luận của bạn" v-model="strComment"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary float-right pl-4 pr-4" :disabled="!btnComment">Bình luận</button>
                                            <button type="button" class="btn btn-outline-success float-right pl-4 pr-4 mr-3"><i class="fa-solid fa-image"></i> Kèm hình ảnh</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane container fade" id="menu3">
                    <div class="row pt-5">
                        <div class="col-lg-12" style="min-height: 300px;">
                            <h2 style="font-weight: 400;">ĐÁNH GIÁ SẢN PHẨM</h2>
                            <p class="mt-2">Sản phẩm đang được cập nhật thông tin</p>
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
                        console.log(this.listComments)
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