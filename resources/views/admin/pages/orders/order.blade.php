@extends('admin.layout.layout')
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin/classic.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/admin/classic.date.css') }}">
<style>
    #myTable tbody tr td {
        vertical-align: middle;
    }
</style>
@endsection
@section('content')
<span>Orders</span>
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
        <form class="datepickers me-5" style="display: flex;" onsubmit="filterDate(event)">
            <div class="form-group">
                <div class="input-group date" id="id_0" style="width: 200px;">
                <label for="" class="me-3 mt-1"><span>Form: </span></label>
                <input id="input_from" type="text" value="" class="form-control" placeholder="MM/DD/YYYY" required/>
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
                    <th>Order Number</th>
                    <th>Status</th>
                    <th>Order By</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Total Price</th>
                    <th>Invoice date</th>
                    <th>Delivery date</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="orderDetail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body text-dark" id="detail-content">
                Modal body..
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="orderAddress">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body text-dark" id="address-content">
                Modal body..
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/admin/picker.js') }}"></script>
<script src="{{ asset('assets/js/admin/picker.date.js') }}"></script>
<script src="{{ asset('assets/js/admin/main.js') }}"></script>
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
            //    ajax: '{{ route('admin.order.datatables') }}',
                initComplete: function(){
                    $("div#myTable_filter")
                        .append(`<span class="ms-2 me-2">Loại: </span><select class="form-select" id="filter-type" style="width:100px;float:right" onchange="filterType(this)">
                                    <option value="all">Tất cả</option>
                                    <option value="Pending">Đang chuẩn bị</option>
                                    <option value="Delivery">Đang vận chuyển</option>
                                    <option value="Complete">Đã giao hàng</option>
                                    <option value="Cancel">Đã hủy</option>
                                </select>`);           
                },
               columns: [
                    { data: 'order_number', name: 'order_number' },
                    { data: 'status', name: 'status' ,searchable: false, orderable: false},
                    { data: 'order_by', name: 'order_by' },
                    { data: 'address', name: 'address' },
                    { data: 'phone', name: 'phone' },
                    { data: 'total_price', name: 'total_price' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'delivery_date', name: 'delivery_date' },
                    { data: 'action', name: 'action',searchable: false, orderable: false}
                ]
            });
        $(window).on("load",function () {
            var date_from = $("#input_from").val()
            var date_to = $("#input_to").val()
            table.ajax.url( '{{ route('admin.order.datatables') }}' + '?from=' + date_from + '&to=' +  date_to).load();

        });
        
        cancalOrder = function(order_number) {
            Swal.fire({
                title: 'Bạn có chắc?',
                text: "Đơn hàng sẽ bị hủy!",
                iconHtml: '<img src="{{ asset("assets/images/logo-icons/slider_logo.webp") }}" width="100px" style="background-color:white;">',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Chắc chắn',
                cancelButtonText: 'Không'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post('{{ url('') }}' + '/admin/order/' + order_number, null, { params: {
                    status: 'Cancel'
                    }})
                    .then(response =>{
                        var date_from = $("#input_from").val()
                        var date_to = $("#input_to").val()
                        table.ajax.url( '{{ route('admin.order.datatables') }}' + '?from=' + date_from + '&to=' +  date_to).load();
                    })
                }
            })
        }

        openDetail = function (order_number) {
            axios.get('{{ url('') }}' + '/admin/order/' + order_number)
                .then(response =>{
                    $("#detail-content").empty()
                    $("#detail-content").append(response.data);
                })
        }

        openChangeAddress = function (order_number) {
            axios.get('{{ url('') }}' + '/admin/order/address/' + order_number)
                .then(response =>{
                    $("#address-content").empty()
                    $("#address-content").append(response.data);
                })
        }

        updateStatusOrder = function (order_number,element) {
            axios.post('{{ url('') }}' + '/admin/order/' + order_number, null, { params: {
                    status:element.value
                }})
                .then(response =>{
                    var date_from = $("#input_from").val()
                    var date_to = $("#input_to").val()
                    table.ajax.url( '{{ route('admin.order.datatables') }}' + '?from=' + date_from + '&to=' +  date_to).load();
                })
        },
        filterType = function(element) {
            var date_from = $("#input_from").val()
            var date_to = $("#input_to").val()
            table.ajax.url( '{{ route('admin.order.datatables') }}?type=' + element.value + '&from=' + date_from + '&to=' +  date_to ).load();
        },
        filterDate = function (event) {
            if(event) {
                event.preventDefault()
            }
            $("#filter-type").val('all')
            var date_from = $("#input_from").val()
            var date_to = $("#input_to").val()
            table.ajax.url( '{{ route('admin.order.datatables') }}' + '?from=' + date_from + '&to=' +  date_to).load();
        }
        changeAddress = function (event,order_number) {
            if(event) {
                event.preventDefault()
            }
            const formData = new FormData(event.target);
                const data = {};
                formData.forEach((value, key) => (data[key] = value));
                axios({
                    method: 'post',
                    url: "{{ route('admin.order.address') }}/" + order_number,
                    data: data
                })
                .then(res => {
                    if(res.data.status == "000") {
                        $('#orderAddress').modal('hide')
                        toastr.success("Thành công", res.data.message);
                        var date_from = $("#input_from").val()
                        var date_to = $("#input_to").val()
                        table.ajax.url( '{{ route('admin.order.datatables') }}' + '?from=' + date_from + '&to=' +  date_to).load();
                    }
                    else{
                        toastr.warning("Cảnh báo", res.data.message);
                    }
                })
                
        }
    });

</script>
@endsection