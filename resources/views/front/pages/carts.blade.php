@extends('front.layout.layout')
@section('content')
<div class="container-fluid" style="margin-top:120px;"  id="app">
    <!-- <img *ngIf="isLoader" class="loader-image" [src]="'assets/images/products/loader.gif'" alt=""> -->
    <div class="row justify-content-center">
        <div class="col-lg-7 p-3">
            <h4>Chi tiết giỏ hàng</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>Tên hàng</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in listCarts">
                        <td><img :src="'{{ asset('assets/images/products') }}/' + item.image" width="80px" alt=""
                                style="border-radius: 10px;"></td>
                        <td style="vertical-align: middle;"><a class="text-dark" :href="'{{ route('front.product.detail') }}/' + item.slug">@{{ item.name }}</a></td>
                        <td style="vertical-align: middle;">@{{ item.price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') }} VNĐ</td>
                        <td style="vertical-align: middle;width: 150px;">
                            <button class="btn btn-primary mr-2" @click="changeQuality(item.id,'down')"><strong>-</strong></button>
                            <button class="btn btn-secondary" disabled><strong>@{{ item.quality }}</strong></button>
                            <button class="btn btn-primary ml-2" @click="changeQuality(item.id,'up')"><strong>+</strong></button>
                        </td>
                        <td style="vertical-align: middle;">@{{ (item.price * item.quality).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') }} VNĐ</td>
                        <td style="vertical-align: middle;"  @click="removeItem(item.id)"><i class="fa-solid fa-trash"
                                data-toggle="tooltip" title="Xóa sản phẩm này!" style="cursor: pointer;"></i></td>
                    </tr>
                    <tr v-show="listCarts.length == 0">
                        <td colspan="6" class="text-center">
                            <h4>Giỏ hàng trống !!!</h4>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-3 p-3" style="border-left: 1px solid rgb(229, 221, 221);">
            <h4>Địa chỉ nhận hàng</h4>
            <div v-for="item in listAddress" class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input mt-2" name="address" :checked="item.status">
                    <p class="m-0">@{{ item.detail }}
                        <code v-show="item.status" class="ml-2 bg-primary text-light pl-2 pr-2">mặc định</code>
                        <code v-show="!item.status" class="ml-2 bg-warning pl-2 pr-2 text-light" style="cursor: pointer;">chọn làm mặc định</code>
                        <code>
                            <i class="fa-solid fa-trash ml-2" data-toggle="tooltip" title="Xóa địa chỉ này!" style="cursor: pointer;"></i>
                        </code>
                    </p>
                    <code>SDT: @{{ item.phone}}</code>
                </label>
            </div>
            <button class="btn text-primary" data-toggle="modal" data-target="#editAddress">Thêm địa chỉ mới</button>
            <!-- <button *ngIf="!showAddress" class="btn p-0"><a class="nav-link p-0" href="#" data-toggle="modal"
                data-target="#myModal">Nhấn vào đây để đăng nhập</a></button> -->
            <hr>
            <h4>Phương thức vận chuyển</h4>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input mt-2" name="transit" v-model="transitFee" value="25000" checked>
                    <p>Giao hàng tiết kiệm <img src="{{ asset('assets/images/icons/giaotietkiem.webp') }}" width="50px" alt=""></p>
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="40000" v-model="transitFee" name="transit">
                    <p>Giao hàng nhanh <img src="{{ asset('assets/images/icons/giaohangnhanh.webp') }}" width="50px" alt=""></p>
                </label>
            </div>
            <hr>
            <h4>Phương thức thanh toán</h4>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="paymentMethod" checked>
                    <p>Thanh toán tiền mặt (COD)</p>
                </label>
            </div>
            <hr>
            <h6>Giá sản phẩm: @{{ getTotal.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') }} VNĐ</h6>
            <h6>Phí vận chuyển: @{{ transitFee.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') }} VNĐ</h6>
            <h4>Tổng thanh toán: @{{ (getTotal*1 + transitFee*1).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') }} VNĐ</h4>
            <button class="btn btn-outline-success mt-3 w-100">Thanh toán</button>
        </div>
    </div>
    <div class="modal fade" id="editAddress">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <h4>Thêm địa chỉ mới</h4>
                    <form @submit="newAddress($event)">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <select class="form-control" v-model="province_id" name="province_id" @change="getDistrict()">
                                        <option value="0" selected disabled>Chọn Tỉnh/Thành phố</option>
                                        <option v-for="item in listProvince" :value="item.province_id"> @{{ item.name }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" v-model="district_id" name="district_id" @change="getWard()">
                                        <option value="0" selected disabled>Chọn Quận/Huyện</option>
                                        <option v-for="item in listDistrict" :value="item.district_id">@{{ item.name }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" v-model="ward_id" name="ward_id">
                                        <option value="0" selected disabled>Chọn Phường/Xã</option>
                                        <option v-for="item in listWard" :value="item.wards_id">@{{ item.name }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" v-model="address" id="diachi" placeholder="Số nhà"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <input type="text" class="form-control" v-model="phone" placeholder="Số điện thoại">
                                </div>
                                <div class="form-group">
                                    <label for="note">Ghi chú:</label>
                                    <textarea class="form-control" rows="5" id="note" v-model="note"></textarea>
                                </div>
                                <button class="btn btn-outline-success w-100 p-3">Thêm địa chỉ</button>
                            </div>
                        </div>
                    </form>
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
            province_id: 0,
            district_id: 0,
            ward_id: 0,
            address: "",
            phone: "",
            note: "",
            listProvince: [],
            listDistrict: [],
            listWard: [],
            listCarts: [],
            transitFee: 25000,
            listAddress: []
        },
        methods:{
            getDistrict:function(){
                this.district_id = 0
                axios.get("{{ route('front.address.district') }}/" + this.province_id)
                    .then(response =>{
                            this.listDistrict = response.data[0].data
                            console.log(this.listDistrict)
                        }
                    )
            },
            getWard:function(){
                this.ward_id = 0
                axios.get("{{ route('front.address.ward') }}/" + this.district_id)
                    .then(response =>{
                            this.listWard = response.data[0].data
                            console.log(this.listWard)
                        }
                    )
            },
            getCarts: function(){
                axios.get("{{ route('front.cart.get') }}")
                .then(response =>{
                        this.listCarts = response.data
                    }
                )
            },
            changeQuality: function(product_id,method) {
                var existProduct = this.listCarts.findIndex((item)=>{
                    return item.id == product_id
                })
                if(existProduct != -1){
                    if(method == "up"){
                        if(this.listCarts[existProduct].instock >= this.listCarts[existProduct].quality*1 + 1){
                            axios.post("{{ route('front.cart.quality') }}", null, {
                                params: {
                                    product_id,
                                    method
                                }
                            })
                            .then(response =>{
                                    this.getCarts()
                                }
                            )
                        }
                        else{
                            toastr.warning("Cảnh báo", "Không đủ số lượng");
                        }
                    }
                    else{
                        if(this.listCarts[existProduct].quality > 1){
                            axios.post("{{ route('front.cart.quality') }}", null, {
                                params: {
                                    product_id,
                                    method
                                }
                            })
                            .then(response =>{
                                    this.getCarts()
                                }
                            )
                        }
                        else{
                            toastr.warning("Cảnh báo", "Không thể tiếp tục giảm");
                        }
                    }
                }
                else{
                    toastr.error("Lỗi", "Hệ thống lỗi");
                }
            },
            removeItem: function(product_id){
                var existProduct = this.listCarts.findIndex((item)=>{
                    return item.id == product_id
                })
                if(existProduct != -1){
                    axios.get("{{ route('front.cart.remove') }}/" + product_id)
                    .then(response =>{
                            this.getCarts()
                        }
                    )
                }
                else{
                    toastr.error("Lỗi", "Hệ thống lỗi");
                }
            },
            newAddress: function(event) {
                if(event) {
                    event.preventDefault()
                }
                if(this.province_id == 0) {
                    toastr.warning("Cảnh báo", "Vui lòng chọn tỉnh thành")
                    return
                }
                if(this.district_id == 0) {
                    toastr.warning("Cảnh báo", "Vui lòng chọn quận huyện")
                    return
                }
                if(this.ward_id == 0) {
                    toastr.warning("Cảnh báo", "Vui lòng chọn phường xã")
                    return
                }
                if(this.address == "") {
                    toastr.warning("Cảnh báo", "Vui lòng nhập số nhà")
                    return
                }
                if(this.phone == "") {
                    toastr.warning("Cảnh báo", "Vui lòng nhập số điện thoại")
                    return
                }
                axios.post("{{ route('front.user.address') }}", null, {
                    params: {
                        province_id: this.province_id,
                        district_id: this.district_id,
                        ward_id: this.ward_id,
                        address: this.address,
                        phone: this.phone,
                        note: this.note
                    }
                })
                    .then(response =>{
                            if(response.data.status == "000") {
                                toastr.success("Thành công", "Hoàn tất thêm địa chỉ")
                                this.listAddress = response.data.data
                                this.province_id = 0
                                this.district_id = 0
                                this.ward_id = 0
                                this.address = ""
                                this.phone = ""
                                this.note = ""
                                $('#editAddress').modal('hide')
                            }
                            else{
                                toastr.error("Lỗi", "Hệ thống lỗi !!!")
                            }
                        }
                    )


            },
            getMyAddress: function() {
                axios.get("{{ route('front.user.address') }}")
                .then(response =>{
                        this.listAddress = response.data.data
                    }
                )
            }
            
        },
        computed: {
            getTotal: function(){
                var result = 0
                this.listCarts.forEach((item)=>{
                    result += item.price*item.quality
                })
                return result
            }
        },
        mounted:function(){
            this.getCarts()
            this.getMyAddress()
            axios.get("{{ route('front.address.province') }}")
                .then(response =>{
                        this.listProvince = response.data[0].data
                    }
                )
        }
    })
</script>
@endsection