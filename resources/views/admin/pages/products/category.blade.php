@extends('admin.layout.layout')
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin/classic.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/admin/classic.date.css') }}">
@endsection
@section('content')
<span>Dashboard <ion-icon name="chevron-forward-outline"></ion-icon> Products <ion-icon name="chevron-forward-outline"></ion-icon> Category</span>
<div class="row mt-3 p-3" >
    <div class="col-lg-10 mb-3 p-3" style="background-color: #2a2e3f; border-radius: 6px; display: flex;">
        <form action="" method="post" class="datepickers me-5" style="display: flex;">
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
        <input type="text" class="ps-5 pe-5 text-light" style="height: 38px;border-radius:5px; border: 1px solid gray;background-color: unset;min-width: 16%;"
            placeholder="Tìm kiếm category. . .">
        <button class="btn btn-outline-success ms-3" style="height: 36px;">
            Tìm Kiếm Ngay!
        </button>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-8 background-primary p-3 mb-2" style="border-radius: 8px;">
                <button class="btn btn-primary mb-3" onclick="getTemplateCategory('none')">Add Category</button>
                <table class="table text-light table-hover w-100" id="myTable" style="background-color: #2a2e3f;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Sub Category</th>
                            <th>Settings</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="col-lg-3 p-3 background-primary mx-auto" id="edit-area" style="border-radius: 8px;" v-if="optionDefault">
                
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
    $(function() {
        var table = $('#myTable').DataTable({
                processing: true,
                autoWidth: true,
                responsive: true,
                ajax: '{{ route('admin.product.category.datatables') }}',
                columns: [
                        { data: 'name', name: 'name' },
                        { data: 'slug', name: 'slug' },
                        { data: 'subcategory', name: 'subcategory' },
                        { data: 'action', name: 'action' ,searchable: false, orderable: false}
                     ]
            });

            getTemplateCategory = function (slug = "") {
                $(".loader").css('display', 'block')
                axios.get('{{ route('admin.product.category.edit') }}/' + slug)
                    .then(response =>{
                        $("#edit-area").empty()
                        $("#edit-area").append(response.data)
                        $('.loader').css('display', 'none')


                })
            }

            getTemplateSubCategory = function (id = 0, category_id = 0) {
                $(".loader").css('display', 'block')
                axios.get('{{ route('admin.product.subcategory.edit') }}/' + id + '/' + category_id)
                    .then(response =>{
                        $("#edit-area").empty()
                        $("#edit-area").append(response.data)
                        $('.loader').css('display', 'none')


                })
            }
            
            removeCategory = function (slug) {
                Swal.fire({
                    title: 'Bạn có chắc?',
                    text: "Thông tin này sẽ bị xóa!",
                    iconHtml: '<img src="{{ asset("assets/images/logo-icons/slider_logo.webp") }}" width="100px" style="background-color:white;">',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Chắc chắn',
                    cancelButtonText: 'Không'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios({
                            method: 'post',
                            url: "{{ url('') }}" +  '/admin/product/category/'+ slug +'/remove'
                        })
                        .then(res => {
                            toastr.success("Thành công", "Xóa thành công")
                            table.ajax.url( '{{ route('admin.product.category.datatables') }}' ).load();
                        })
                        
                    }
                })
            }
    });

</script>
@endsection