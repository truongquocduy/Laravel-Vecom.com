@extends('admin.layout.layout')
@section('styles')
<style>
    table tr td {
        min-width: 50% !important;
        vertical-align: middle;
    }
    table tr td input, input.bg-remove{
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
<div class="row m-3 p-3" style="background-color: #2a2e3f; border-radius: 6px;">
    <div class="col-lg-12 mb-3">
        <h3 class="">HOMEPAGE SETTINGS</h3>
    </div>
    <h4 class="title-lang">
        <span></span>
        Sliders
    </h4>
    <div class="col-lg-8 mt-4">
        <div class="table-responsive">
            <table id="myTable1" class="table text-light table-hover w-100" style="background-color: #2a2e3f;">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-4 mt-4" id="slider-edit" style="border-left: 2px solid gray">
        <h4 class="title-lang">
            Chọn đối tượng để sửa !!!
        </h4>
    </div>
</div>

<div class="row m-3 p-3 mt-5" style="background-color: #2a2e3f; border-radius: 6px;">
    <h4 class="title-lang">
        <span></span>
        Sliders
    </h4>
    <div class="col-lg-8 mt-4">
        <div class="table-responsive">
            <table class="table text-light table-hover w-100" style="background-color: #2a2e3f;">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listBanners as $banner)
                    <tr>
                        <td>
                            <img src="{{ asset('assets/images/banners/' . $banner->value) }}" width="300px" alt="">
                        </td>
                        <td>
                            {{ $banner->name }}
                        </td>
                        <td>
                            @if($banner->status == 1) 
                                <span class="badge bg-primary">Actived</span>
                            @else
                                <span class="badge bg-warning">Vô hiệu hóa</span>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-success m-2 w-75" onclick="getTemplateEdit('{{ $banner->title }}','banner-edit')">Edit</button>
                            <button class="btn btn-warning m-2 w-75" data-bs-toggle="tooltip"  title="Chức năng hiện tại chưa thể sử dụng !!!!" ><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-4 mt-4" id="banner-edit" style="border-left: 2px solid gray">
        <h4 class="title-lang">
            Chọn đối tượng để sửa !!!
        </h4>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(function() {
        var table = $('#myTable1').DataTable({
                processing: true,
                autoWidth: true,
                responsive: true,
               ajax: '{{ route('admin.setting.homepage.datatables') }}?c=sliders',
               columns: [
                        { data: 'image', name: 'image' },
                        { data: 'name', name: 'name' },
                        { data: 'status', name: 'status' },
                        { data: 'action', name: 'action' ,searchable: false, orderable: false}
                     ]
            });
        // removeProduct = function(product_id) {
        //     Swal.fire({
        //         title: 'Bạn có chắc?',
        //         text: "Thông tin sản phẩm sẽ được xóa!",
        //         iconHtml: '<img src="{{ asset("assets/images/logo-icons/slider_logo.webp") }}" width="100px" style="background-color:white;">',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Chắc chắn',
        //         cancelButtonText: 'Không'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             axios.get('{{ url('') }}' + '/admin/product/' + product_id + '/remove')
        //             .then(response =>{
        //                 table.ajax.url( '{{ route('admin.product.datatables') }}' ).load();
        //                 toastr.success("Thành công", response.data.message);
        //             })
        //         }
        //     })
        // }
        getTemplateEdit = function (title, areaID) {
            $(".loader").css('display', 'block')
            axios.get('{{ route('admin.settings') }}/' + title)
                .then(response =>{
                    $("#" + areaID).empty()
                    $("#" + areaID).append(response.data)
                    $('.loader').css('display', 'none')


            })
        }
    });
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })

</script>
@endsection