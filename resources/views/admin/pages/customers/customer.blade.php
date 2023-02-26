@extends('admin.layout.layout')
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/classic.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/classic.date.css') }}">
<style>
    #myTable tbody tr td {
        vertical-align: middle;
    }
</style>
@endsection
@section('content')
<span>Customers</span>
<div class="row justify-content-center">
    <div class="col-lg-3 me-2 mt-2 report-card p-3">
        <ion-icon name="people-outline" class="ms-2" style="font-size: 80px;"></ion-icon>
        <div class="ms-5 w-100 p-2 text-center">
            <span>Customers</span>
            <h3>1,000,000</h3>
        </div>
    </div>
    <div class="col-lg-3 me-2 mt-2 report-card p-3">
        <ion-icon name="people-outline" class="ms-2" style="font-size: 80px;"></ion-icon>
        <div class="ms-5 w-100 p-2 text-center">
            <span>Customers</span>
            <h3>1,000,000</h3>
        </div>
    </div>
    <div class="col-lg-3 me-2 mt-2 report-card p-3">
        <ion-icon name="people-outline" class="ms-2" style="font-size: 80px;"></ion-icon>
        <div class="ms-5 w-100 p-2 text-center">
            <span>Customers</span>
            <h3>1,000,000</h3>
        </div>
    </div>
    <div class="col-lg-3 me-2 mt-2 report-card p-3">
        <ion-icon name="people-outline" class="ms-2" style="font-size: 80px;"></ion-icon>
        <div class="ms-5 w-100 p-2 text-center">
            <span>Customers</span>
            <h3>1,000,000</h3>
        </div>
    </div>
</div>
<div class="row m-3 p-3" style="background-color: #2a2e3f; border-radius: 6px;">
    <div class="col-lg-12 m-3 p-3" style="background-color: #2a2e3f; border-radius: 6px; display: flex;">
        <form action="" method="post" class="datepickers me-5" style="display: flex;">
            <div class="form-group">
                <div class="input-group date" id="id_0" style="width: 200px;">
                <label for="" class="me-3 mt-1"><span>Form: </span></label>
                <input id="input_from" type="text" value="01/01/2022" class="form-control" placeholder="MM/DD/YYYY" required/>
                </div>
            </div>
            <div class="form-group ms-3">
                <div class="input-group date" id="id_1" style="width: 200px;">
                <label for="" class="me-3 mt-1"><span>To: </span></label>
                <input id="input_to" type="text" class="form-control" placeholder="MM/DD/YYYY" required/>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-warning ms-3" style="height: 36px;">
                Filter Now!
            </button>
        </form>
        <input type="text" class="ps-5 pe-5 text-light"
            style="height: 38px;border-radius:5px; border: 1px solid gray;background-color: unset;min-width: 16%;"
            placeholder="Tìm kiếm khách hàng. . .">
        <button class="btn btn-outline-success ms-3" style="height: 36px;">
            Tìm Kiếm Ngay!
        </button>
        <button class="btn btn-outline-warning ms-3" style="height: 36px;">
            Export Excel!
        </button>
    </div>
    <div class="col-lg-12">
        <table id="myTable" class="table text-light table-hover w-100" style="background-color: #2a2e3f;">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Created At</th>
                    <th>Setting</th>
                </tr>
            </thead>
            {{-- 
                <tbody>
                    @foreach($listProducts as $item)
                    <tr>
                        <td>
                            <img src="{{ asset('assets/images/products/'.$item->image) }}" alt="" width="80px">
                        </td>
                        <td style="vertical-align: middle;">{{ $item->name }}</td>
                        <td style="vertical-align: middle;">{{ number_format($item->cost) }} VND</td>
                        <td style="vertical-align: middle;">{{ number_format($item->price) }} VND</td>
                        <td style="vertical-align: middle;">{{ $item->updated_at }}</td>
                        <td style="vertical-align: middle;">
                            <button class="btn btn-outline-success m-2">View All</button>
                            <a href="{{ route('admin.product.edit', ['product_id' => $item->id]) }}">
                                <button class="btn btn-outline-warning m-2">Edit</button>
                            </a>
                            <button class="btn btn-outline-danger m-2" @click="removeProduct('{{ $item->id }}')">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            --}}
        </table>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/picker.js') }}"></script>
<script src="{{ asset('assets/js/picker.date.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    Vue.config.ignoredElements = [/^ion-/]
    var app1 = new Vue({
        el: '#app',
        data: {
            listProducts: []
        },
        methods:{
            
            reloadData: function () {
               
            }
        }

    })
</script>
<script>
    $(function() {
        // $('#myTable').DataTable({
        //     processing: true,
        //     autoWidth: true,
        //     responsive: true
        // });
        var table = $('#myTable').DataTable({
                processing: true,
                autoWidth: true,
                responsive: true,
               ajax: '{{ route('admin.user.datatables') }}',
               columns: [
                        { data: 'image', name: 'image' },
                        { data: 'name', name: 'name' },
                        { data: 'address', name: 'address' },
                        { data: 'phone', name: 'phone' },
                        { data: 'created_at', name: 'created_at'},
                        { data: 'action', name: 'action'}
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
    });

</script>
@endsection