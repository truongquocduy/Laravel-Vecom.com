@extends('front.layout.layout')
@section('content')
<div class="row mb-5">
    <div class="col-lg-8 mx-auto mt-4">
        <div class="row">
            <div class="col-lg-7">
                <img src="{{ asset('assets/images1/banners/login.webp') }}" class="w-100" alt="">
            </div>
            <div class="col-lg-5" v-if="isShowLogin">
                <span v-show="resultLogin" class="bg-primary p-2 text-light pl-5 pr-5">Đăng nhập thành công</span>
                <span v-show="!resultLogin && resultLoginEnter" class="bg-warning p-2 text-light pl-5 pr-5">Đăng nhập thất bại</span>
                <h3 class="mt-4"><strong>ĐĂNG NHẬP</strong></h3>
                <form @submit="login($event)">
                    <div class="form-group">
                        <input type="email" class="form-control p-3" v-model="Lemail" placeholder="Email">
                    </div>
                    <div class="form-group mt-2">
                        <input type="password" class="form-control p-3" v-model="Lpassword" placeholder="Mật khẩu">
                    </div>
                    <div class="form-group form-check mt-2">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Remember me
                        </label>
                        <a href="" class="float-end">Quên mật khẩu</a>
                    </div>
                    <button type="submit" class="btn btn-success p-3 w-100 mt-4">Đăng nhập</button>
                </form>
                <hr>
                <button type="button" class="btn text-primary" @click="isShowLogin=!isShowLogin">Chưa có tài khoản, nhấn vào đây !!!</button>
                <!-- <button type="button" class="btn text-primary">Kích hoạt tài khoản !!!</button> -->
                <!-- <div class="login-reference mt-3 pt-3" style="border-top: 2px solid gray">
                    <button type="button" class="btn btn-primary p-2 w-100">Đăng nhập bằng Facebook</button>
                    <button type="button" class="btn btn-outline-primary p-2 w-100  mt-2">Đăng nhập bằng Google</button>
                </div> -->
            </div>
            <div class="col-lg-5 pr-5" v-if="!isShowLogin">
                <span v-if="resultRegister" class="bg-primary p-2 text-light pl-5 pr-5">Tạo tài khoản thành công - Vui lòng kiểm trả Email</span>
                <h3 class="mt-4"><strong>ĐĂNG KÝ THÀNH VIÊN</strong></h3>
                <form>
                    <div class="form-group mt-2" style="display:flex;">
                        <input type="text" class="form-control p-3" placeholder="Họ Tên" v-model="Rname">
                        <span  v-show="Rvalidate.name">
                            <i class="fa-solid fa-check float-right ml-2 mt-2 text-primary" style="font-size:24px;"></i>
                        </span>
                        <span  v-show="!Rvalidate.name && Rvalidate.nameChanged">
                            <i class="fa-solid fa-exclamation  float-right ml-2 mt-2 text-danger" style="font-size:24px"></i>
                        </span>
                    </div>
                    <div class="form-group mt-2" style="display:flex;">
                        <input type="email" class="form-control p-3" placeholder="Email" v-model="Remail" @change="checkEmail()">
                        <span  v-show="Rvalidate.email">
                            <i class="fa-solid fa-check float-right ml-2 mt-2 text-primary" style="font-size:24px"></i>
                        </span>
                        <span  v-show="!Rvalidate.email && Rvalidate.emailChanged">
                            <i class="fa-solid fa-exclamation  float-right ml-2 mt-2 text-danger" style="font-size:24px"></i>
                        </span>
                    </div>
                    <div class="form-group mt-2" style="display:flex;">
                        <input type="password" class="form-control p-3" placeholder="Mật khẩu" v-model="Rpassword">
                        <span  v-show="Rvalidate.password">
                            <i class="fa-solid fa-check float-right ml-2 mt-2 text-primary" style="font-size:24px"></i>
                        </span>
                        <span  v-show="!Rvalidate.password && Rvalidate.passwordChanged">
                            <i class="fa-solid fa-exclamation  float-right ml-2 mt-2 text-danger" style="font-size:24px"></i>
                        </span>
                    </div>
                    <div class="form-group mt-2" style="display:flex;">
                        <input type="password" class="form-control p-3" placeholder="Nhập lại mật khẩu" v-model="RpasswordCheck" @change="RpasswordcheckMethod()">
                        <span  v-show="Rvalidate.passwordcheck">
                            <i class="fa-solid fa-check float-right ml-2 mt-2 text-primary" style="font-size:24px"></i>
                        </span>
                        <span  v-show="!Rvalidate.passwordcheck && Rvalidate.passwordcheckChanged">
                            <i class="fa-solid fa-exclamation  float-right ml-2 mt-2 text-danger" style="font-size:24px"></i>
                        </span>
                    </div>
                    <button type="button" class="btn btn-success p-3 w-100 mt-4" @click="register()">Tạo tài khoản</button>
                </form>
                <hr>
                <button type="button" class="btn text-primary" @click="isShowLogin=!isShowLogin">Đăng nhập tại đây !!!</button>
                <!-- <div class="login-reference mt-3 pt-3" style="border-top: 2px solid gray">
                    <button type="button" class="btn btn-primary p-2 w-100">Đăng nhập bằng Facebook</button>
                    <button type="button" class="btn btn-outline-primary p-2 w-100  mt-2">Đăng nhập bằng Google</button>
                </div> -->
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
            isShowLogin: true,
            Rname: "",
            Remail: "",
            Rpassword: "",
            RpasswordCheck: "",
            Rvalidate: {
                name: false,
                nameChanged:false,
                email: false,
                emailChanged: false,
                password: false,
                passwordChanged: false,
                passwordcheck: false,
                passwordcheckChanged: false,
            },
            resultRegister: false,
            resultLogin:false,
            resultLoginEnter:false,

            Lemail: "",
            Lpassword: ""
        },
        methods:{
            login: function(event){
                if(event) {
                    event.preventDefault()
                }
                axios.post("{{ route('front.user.login') }}" , null, {
                    params: {
                        email: this.Lemail,
                        password: this.Lpassword
                    }
                })
                .then(response =>{
                        if(response.data.status == "000") {
                            this.resultLogin = true
                            location.reload();
                        }
                        else{
                            if(response.data.status == "002") {
                                toastr.warning("Cảnh báo", "Vui lòng kích hoạt tài khoản !!!")
                            }
                            else{
                                this.resultLoginEnter = true
                                this.resultLogin = false
                            }
                        }
                    }
                )
                this.Lemail = ""
                this.Lpassword = ""
            },
            checkEmail: function(){
                if(this.Remail == ""){
                    this.Rvalidate.emailChanged = true
                    this.Rvalidate.email = false
                    return
                }
                axios.get("{{ route('front.user.check.email') }}/" + this.Remail)
                    .then(response =>{
                            this.Rvalidate.emailChanged = true
                            if(response.data.status == "000") {
                                this.Rvalidate.email = true
                            }
                            else{
                                this.Rvalidate.email = false
                            }
                        }
                    )
            },
            RpasswordcheckMethod: function (){
                this.Rvalidate.passwordcheckChanged = true
                if(this.Rpassword == this.RpasswordCheck){
                    this.Rvalidate.passwordcheck = true
                }
                else{
                    this.Rvalidate.passwordcheck = false
                }
            },
            register: function() {
                axios.post("{{ route('front.user.register') }}" , null, {
                    params: {
                        name: this.Rname,
                        email: this.Remail,
                        password: this.Rpassword
                    }
                })
                    .then(response =>{
                            if(response.data.status == "000") {
                                this.resultRegister = true
                                setTimeout(() => {
                                    this.resultRegister = false
                                }, 3000);
                            }
                        }
                    )
            }
        },
        watch: {
            Rname: function(){
                this.Rvalidate.nameChanged = true
                if(this.Rname != ""){
                    this.Rvalidate.name = true
                }
                else{
                    this.Rvalidate.name = false
                }
            },
            Rpassword: function(){
                this.Rvalidate.passwordChanged = true
                if(this.Rpassword != ""){
                    this.Rvalidate.password = true
                }
                else{
                    this.Rvalidate.password = false
                }
                if(this.Rvalidate.passwordcheckChanged)
                this.RpasswordcheckMethod()
            },
        }
    })
</script>
@endsection