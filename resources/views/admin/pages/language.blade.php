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
<span>Admin > Language Settings</span>
<form action="{{ route('admin.language') }}" method="POST">
    @csrf
    <div class="row m-3 p-3" style="background-color: #2a2e3f; border-radius: 6px;">
        <div class="col-lg-12 mb-3">
            <h3 class="text-center">FRONT END LANGUAGES</h3>
        </div>
        <h4 class="title-lang">
            <span></span>
            header
        </h4>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Giỏ hàng )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang001" value="{{ $listLanguagues['lang001'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Đăng nhập )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang002" value="{{ $listLanguagues['lang002'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Từ khóa tìm kiếm )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang003" value="{{ $listLanguagues['lang003'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <h4 class="title-lang">
            <span></span>
            Homepage
        </h4>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Slogan Banner )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang004" value="{{ $listLanguagues['lang004'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Slogan Banner Pharagraph )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang005" value="{{ $listLanguagues['lang005'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Section 1 Title )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang006" value="{{ $listLanguagues['lang006'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Section 1 Pharagraph )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang007" value="{{ $listLanguagues['lang007'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Section 2 Title )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang008" value="{{ $listLanguagues['lang008'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Section 2 Pharagraph )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang009" value="{{ $listLanguagues['lang009'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Section 3 Title )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang010" value="{{ $listLanguagues['lang010'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Section 3 Pharagraph )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang011" value="{{ $listLanguagues['lang011'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Section 4 Title )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang012" value="{{ $listLanguagues['lang012'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Section 4 Title -B )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang013" value="{{ $listLanguagues['lang013'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Section 4 Pharagraph )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang014" value="{{ $listLanguagues['lang014'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Section 4 Button )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang015" value="{{ $listLanguagues['lang015'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Có thể bạn thích )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang016" value="{{ $listLanguagues['lang016'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Mặt hàng giảm giá )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang017" value="{{ $listLanguagues['lang017'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Mặt hàng nổi bật )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang018" value="{{ $listLanguagues['lang018'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Xem thêm )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang019" value="{{ $listLanguagues['lang019'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Add to cart )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang020" value="{{ $listLanguagues['lang020'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Show Detail )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang021" value="{{ $listLanguagues['lang021'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <h4 class="title-lang">
            <span></span>
            Xu hướng
        </h4>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Title Page )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang022" value="{{ $listLanguagues['lang022'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Tìm kiếm sản phẩm )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang023" value="{{ $listLanguagues['lang023'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Lọc )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang024" value="{{ $listLanguagues['lang024'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Danh mục sản phẩm )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang025" value="{{ $listLanguagues['lang025'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Lọc theo giá )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang026" value="{{ $listLanguagues['lang026'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Mua nhiều nhất )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang027" value="{{ $listLanguagues['lang027'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <h4 class="title-lang">
            <span></span>
            Footer
        </h4>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Thông tin 1 )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang028" value="{{ $listLanguagues['lang028'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Thông tin 2 )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang029" value="{{ $listLanguagues['lang029'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Bài viết )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang030" value="{{ $listLanguagues['lang030'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Liên kết )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang031" value="{{ $listLanguagues['lang031'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Chúng tôi )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang032" value="{{ $listLanguagues['lang032'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 mb-2">
            <table class="w-100">
                <tr>
                    <td>( Copyringt )*</td>
                    <td>
                        <input type="text" class="form-control w-100 rounded-0 text-light" placeholder="Vui lòng nhập !!!" name="lang033" value="{{ $listLanguagues['lang033'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-12">
            <button class="btn btn-success mt-3">
                CHẤP NHẬN THAY ĐỔI
            </button>
        </div>
    </div>
</form>
@endsection