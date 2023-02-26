@extends('admin.layout.layout')
@section('content')
<span>Dashboard <ion-icon name="chevron-forward-outline"></ion-icon> Blogs <ion-icon name="chevron-forward-outline"></ion-icon> Edit Blog</span>
<div class="row mt-3 p-3" >
    <div class="col-lg-12">
        <form @submit="createBlog($event)" id="my-form">
            <div class="row">
                <div class="col-lg-8 background-primary p-3 mb-2" style="border-radius: 8px;">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Blog Title:</label>
                        <input type="text" class="form-control input-primary" id="name" placeholder="Enter Blog Title" name="title" >
                    </div>
                    {{--<div class="mb-3">
                        <label for="author" class="form-label">Author:</label>
                        <select class="form-select input-primary" v-model="categorySelect"  name="author" id="author">
                            <option value="null" disabled>Select Author Category, please </option>
                            @foreach($listCategory as $item)
                            <option value="{{ $item->id }}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>--}}
                    <div class="mb-3">
                        <label for="contenttt" class="form-label">Content:</label>
                        <textarea class="form-control input-primary" id="contenttt" name="content"></textarea>
                    </div>
                </div>
                <div class="col-lg-3 p-3 background-primary mx-auto" style="border-radius: 8px;">
                    <div class="mb-3 p-3">
                        <label for="stock" class="form-label">Feature Image:</label>
                        <img src="{{ asset('assets/images/logo-icons/no-image.jpg' ) }}" alt="" class="w-100" id="productImagePrimary" style="border-radius: 4px;">
                        <input type="file" class="btn btn-primary w-100 mt-2" name="image" onchange="readURL(this,'productImagePrimary')"></input>
                    </div>
                    <button type="submit" class="btn btn-success w-100 p-3">CREATE BLOG</button>
                </div>

            </div>
        </form>

    </div>
</div>
@endsection
@section('scripts')
<script src="//cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
<script>
    Vue.config.ignoredElements = [/^ion-/]
    var app1 = new Vue({
        el: '#app',
        data: {
        },
        methods:{
            createBlog: function(event){
                if(event) {
                    event.preventDefault()
                }
                Swal.fire({
                    title: 'Bạn có chắc?',
                    text: "Thông tin bài viết sẽ được thay đổi!",
                    iconHtml: '<img src="{{ asset("assets/images/logo-icons/slider_logo.webp") }}" width="100px" style="background-color:white;">',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Chắc chắn',
                    cancelButtonText: 'Không'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const formData = new FormData(event.target);
                        const data = {};
                        formData.forEach((value, key) => (data[key] = value));
                        axios({
                            headers: { 'Content-Type': 'multipart/form-data' },
                            method: 'post',
                            url: "{{ route('admin.blog.create') }}",
                            data: data
                        })
                        .then(res => {
                            if(res.data.status == "000") {
                                toastr.success("Thành công", res.data.message);
                                window.location.reload();
                            }
                        })
                        .catch(err => {
                            toastr.warning("Cảnh báo", err.response.data.errors.title[0]);
                        })
                    }
                })
            
            }
            
        },
        mounted: function() {
            
        }

    })
</script>
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
<script>
    $(document).ready(function(){
        $("#name").on('input',function(){
            $('#errorsLog').hide()
        });
        $("#category").on('input',function(){
            $('#alertError').hide()
        });
    });
    
</script>
<script>
    CKEDITOR.replace('contenttt');
</script>
@endsection