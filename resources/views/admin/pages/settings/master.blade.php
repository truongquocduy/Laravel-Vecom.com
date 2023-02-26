@extends('admin.layout.layout')
@section('styles')
<style>
    table tr td {
        min-width: 50% !important;
    }
    table tr td input {
        background-color: unset !important;
    }
    .title-lang{
        text-transform: uppercase;
    }
    .title-lang span{
        width: 30px;
        height: 30px;
        background-color: #1abc9c;
        display: inline-block;
        position: relative;
        top: 6px;
    }
</style>
@endsection
@section('content')
<span>Admin > Settings > Master</span>
<form action="{{ route('admin.setting.master') }}" method="POST" enctype='multipart/form-data'>
    @csrf
    <div class="row m-3 p-3" style="background-color: #2a2e3f; border-radius: 6px;">
        <div class="col-lg-12 mb-3">
            <h3 class="text-center">MASTER SETTINGS</h3>
        </div>
        <h4 class="title-lang">
            <span></span>
            Master
        </h4>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( {{ $settingMaster[0]->name }} )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="{{ $settingMaster[0]->title }}" value="{{ $settingMaster[0]->value }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( {{ $settingMaster[1]->name }} )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="{{ $settingMaster[1]->title }}" value="{{ $settingMaster[1]->value }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( {{ $settingMaster[2]->name }} )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="{{ $settingMaster[2]->title }}" value="{{ $settingMaster[2]->value }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( {{ $settingMaster[3]->name }} )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="{{ $settingMaster[3]->title }}" value="{{ $settingMaster[3]->value }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( {{ $settingMaster[4]->name }} )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="{{ $settingMaster[4]->title }}" value="{{ $settingMaster[4]->value }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( {{ $settingMaster[5]->name }} )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="{{ $settingMaster[5]->title }}" value="{{ $settingMaster[5]->value }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( {{ $settingMaster[6]->name }} )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="{{ $settingMaster[6]->title }}" value="{{ $settingMaster[6]->value }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( {{ $settingMaster[7]->name }} )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="{{ $settingMaster[7]->title }}" value="{{ $settingMaster[7]->value }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( {{ $settingMaster[8]->name }} )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="{{ $settingMaster[8]->title }}" value="{{ $settingMaster[8]->value }}">
                    </td>
                </tr>
            </table>
        </div>
        <h4 class="title-lang">
            <span></span>
            logo
        </h4>
        <div class="col-lg-4 mb-2 mt-5">
            <div class="card  bg-dark p-4">
                <img id="{{ $settingMaster[9]->title }}" class="card-img-top" src="{{ asset('assets/images/logo-icons/' . $settingMaster[9]->value) }}" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">{{ $settingMaster[9]->name }}</h4>
                    <input class="mt-2" type="file" name="{{ $settingMaster[9]->title }}" id="" onchange="readURL(this,'{{ $settingMaster[9]->title }}')" accept="image/png, image/jpg, image/jpeg">
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-2 mt-5">
            <div class="card  bg-dark p-4">
                <img id="{{ $settingMaster[10]->title }}" class="card-img-top" src="{{ asset('assets/images/logo-icons/'. $settingMaster[10]->value) }}" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">{{ $settingMaster[10]->name }}</h4>
                    <input class="mt-2" type="file" name="{{ $settingMaster[10]->title }}" id="" onchange="readURL(this,'{{ $settingMaster[10]->title }}')" accept="image/png, image/jpg, image/jpeg">
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-2 mt-5">
            <div class="card  bg-dark p-4">
                <img id="{{ $settingMaster[11]->title }}" class="card-img-top" src="{{ asset('assets/images/logo-icons/'. $settingMaster[11]->value) }}" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">{{ $settingMaster[11]->name }}</h4>
                    <input class="mt-2" type="file" name="{{ $settingMaster[11]->title }}" id="" onchange="readURL(this,'{{ $settingMaster[11]->title }}')" accept="image/png, image/jpg, image/jpeg">
                </div>
            </div>
        </div>
        <h4 class="title-lang">
            <span></span>
            Mail
        </h4>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( {{ $settingMaster[12]->name }} )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="{{ $settingMaster[12]->title }}" value="{{ $settingMaster[12]->value }}" >
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( {{ $settingMaster[13]->name }} )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="{{ $settingMaster[13]->title }}" value="{{ $settingMaster[13]->value }}" >
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( {{ $settingMaster[14]->name }} )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="{{ $settingMaster[14]->title }}" value="{{ $settingMaster[14]->value }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( {{ $settingMaster[15]->name }} )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="{{ $settingMaster[15]->title }}" value="{{ $settingMaster[15]->value }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( {{ $settingMaster[16]->name }} )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="{{ $settingMaster[16]->title }}" value="{{ $settingMaster[16]->value }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( {{ $settingMaster[17]->name }} )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="{{ $settingMaster[17]->title }}" value="{{ $settingMaster[17]->value }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( {{ $settingMaster[18]->name }} )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="{{ $settingMaster[18]->title }}" value="{{ $settingMaster[18]->value }}">
                    </td>
                </tr>
            </table>
        </div>
        <!-- <div class="col-lg-12 mb-2 mt-5">
            <table class="w-100">
                <tr>
                    <td>
                        ( Logo Footer )* <br>
                        <input class="mt-2" type="file" name="" id="">
                    </td>
                    <td>
                        <img src="{{ asset('assets/images/logo-icons/logo3.png') }}" alt="" width="300px">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-12 mb-2 mt-5">
            <table class="w-100">
                <tr>
                    <td>
                        ( Loader Image )* <br>
                        <input class="mt-2" type="file" name="" id="">
                    </td>
                    <td>
                        <img src="{{ asset('assets/images/logo-icons/loader.gif') }}" alt="" width="300px">
                    </td>
                </tr>
            </table>
        </div> -->
        <div class="col-lg-12">
            <button class="btn btn-success mt-3">
                CHẤP NHẬN THAY ĐỔI
            </button>
        </div>
    </div>
</form>
@endsection
@section('scripts')
<script>
    function readURL(input,toID) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#'+toID + input.id).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endsection