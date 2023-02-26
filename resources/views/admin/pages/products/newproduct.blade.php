@extends('admin.layout.layout')
@section('styles')
<style>
    .custom-file-input::-webkit-file-upload-button {
        visibility: hidden;
    }
    .custom-file-input::before {
        content: 'Add Thumbnail';
        display: inline-block;
        background: linear-gradient(top, #f9f9f9, #e3e3e3);
        border: 1px solid #999;
        border-radius: 3px;
        padding: 5px 8px;
        outline: none;
        white-space: nowrap;
        -webkit-user-select: none;
        cursor: pointer;
        text-shadow: 1px 1px #fff;
        font-weight: 700;
        font-size: 10pt;
    }
    .custom-file-input:hover::before {
        border-color: black;
    }
    .custom-file-input:active::before {
        background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
    }
    .trash-thumbnail{
        background-color: gray;
        padding: 8px;
    }
</style>
@endsection
@section('content')
<span>Dashboard <ion-icon name="chevron-forward-outline"></ion-icon> Products <ion-icon name="chevron-forward-outline"></ion-icon> New Product</span>
<div class="row mt-3 p-3" >
    <div class="col-lg-12">
        <form @submit="createProduct($event)" id="my-form">
            <div class="row">
                <div class="col-lg-8 background-primary p-3 mb-2" style="border-radius: 8px;">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Product Name:</label>
                        <input type="text" class="form-control input-primary" id="name" placeholder="Enter Product Name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category:</label>
                        <select class="form-select input-primary" v-model="categorySelect"  name="category" id="category" @change="getlistSubCategory()">
                            <option value="null" disabled>Select Product Category, please </option>
                            @foreach($listCategory as $item)
                            <option value="{{ $item->id }}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="subcategory" class="form-label">Sub Category:</label>
                        <select class="form-select input-primary"  name="subcategory" id="subcategory">
                            <option value="null" v-if="listSubCategory.length == 0">Select Product Category, please </option>
                            <option v-for="item in listSubCategory" :value="item.id">@{{ item.name }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="instock" class="form-label">Product Stock:</label>
                        <input type="number" class="form-control input-primary" id="instock" placeholder="Enter Product Stock" name="instock" value="{{ old('stock') }}">
                    </div>
                    <div class="mb-3">
                        <label for="intro" class="form-label">Intro:</label>
                        <textarea class="form-control input-primary" rows="7" id="intro" name="intro"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea class="form-control input-primary" rows="7" id="description" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="material" class="form-label">Material:</label>
                        <textarea class="form-control input-primary" rows="7" id="material" name="material"></textarea>
                    </div>
                </div>
                <div class="col-lg-3 p-3 background-primary mx-auto" style="border-radius: 8px;">
                    <div class="mb-3 p-3">
                        <label for="stock" class="form-label">Feature Image:</label>
                        <img src="{{ asset('assets/images/logo-icons/no-image.jpg') }}" alt="" class="w-100" id="productImagePrimary" style="border-radius: 4px;">
                        <input type="file" class="btn btn-primary w-100 mt-2" name="image" onchange="readURL(this,'productImagePrimary')"></input>
                    </div>
                    <a class="text-light nav-link" data-bs-toggle="modal" data-bs-target="#myThumbnails"><i class="fa-solid fa-download"></i> Add Thumbnails</a>
                    <!-- <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="imageThumbnailcheck" v-model="imageThumbnailCheck">
                        <label class="form-check-label" for="imageThumbnailcheck" >Set Thumbnail</label>
                    </div>
                    <div class="mb-3 bg-light text-dark p-2" v-if="imageThumbnailCheck" style="border-radius: 4px;">
                        <table>
                            <tr class="thumbnailItemArea" v-for="(item,index) in thumbnailQty" :id="'thumbnailItemArea' + index">
                                <td>
                                    <img src="{{ asset('assets/images/logo-icons/no-image.jpg') }}" :id="'imagethumbnailItem' + index" width="80px" alt="" style="border-radius: 4px;">
                                </td>
                                <td class="ps-2" style="display: flex;overflow: hidden;">
                                    <input type="file" class="btn btn-primary w-100 mt-2" :id="index" :name="'imagethumbnail'+index" onchange="readURL(this,'imagethumbnailItem')"></input>
                                    <button type="button" class="btn btn-danger mt-2 nav-link text-light removeThumbnail ms-2" @click="removeThumbnailMethod('thumbnailItemArea' + index)"><ion-icon name="trash-outline"></ion-icon></button>
                                </td>
                            </tr>
                        </table>
                        <button type="button" class="btn btn-outline-success mx-auto d-block mt-1 w-100" @click="thumbnailQty++">Add Thumbnail</button>
                    </div> -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Price:</label>
                        <input type="number" class="form-control input-primary" id="price" placeholder="Enter Price" name="price">
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="salePricecheck" v-model="checkSale">
                        <label class="form-check-label" for="salePricecheck" >Allow Sale</label>
                    </div>
                    <div class="mb-3" v-if="checkSale">
                        <label for="salePrice" class="form-label">Price After Sale:</label>
                        <input type="number" class="form-control input-primary" id="salePrice" placeholder="Enter Price After Sale" name="cost">
                    </div>
                    <button type="submit" class="btn btn-success w-100 p-3">CREATE PRODUCT</button>
                </div>

            </div>
            <div class="modal fade" id="myThumbnails">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-body">
                            <input type="file" name="thumbnails[]" class="custom-file-input text-dark" multiple id="gallery-photo-add">
                            <div class="gallery"></div>
                        </div>
                    </div>
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
            checkSale: false,
            imageThumbnailCheck:false,
            thumbnailQty:1,
            categorySelect: "null",
            listSubCategory:[],
        },
        methods:{
            removeThumbnailMethod: function(id){
                document.getElementById(id).remove()
            },
            getlistSubCategory: function(){
                axios.get('{{ url('') }}' + '/product/category/'+ this.categorySelect +'/subcategorys')
                    .then(response =>{
                        this.listSubCategory = response.data.data
                    })
            },
            createProduct: function(event){
                if(event) {
                    event.preventDefault()
                }
                const formData = new FormData(event.target);
                const data = {};
                formData.forEach((value, key) => {
                    if(key == 'thumbnails[]') {
                        if(data[key] == undefined) {
                            data[key] = []
                        }
                        data[key].push(value)
                    }
                    else {
                        (data[key] = value);
                    }
                });
                axios({
                    headers: { 'Content-Type': 'multipart/form-data' },
                    method: 'post',
                    url: "{{ route('admin.product.create') }}",
                    data: data
                })
                .then(res => {
                    if(res.data.status == "000") {
                        toastr.success("Thành công", res.data.message);
                    }
                })
                .catch(err => {
                    toastr.warning("Cảnh báo", err.response.data.message);
                })
            
            }
            
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
    
    $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
        $(placeToInsertImagePreview).empty()
        if (input.files) {
            var filesAmount = input.files.length;

            for (let i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img class="m-2" width="200px" id="thumbnail-item-'+i+'"><span class="trash-thumbnail" class="text-dark" onclick="removeFileFromFileList('+i+',this)"><i class="fa-solid fa-trash"></i></span>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };
    removeFileFromFileList = function(index,span) {
        $("#thumbnail-item-" + index).remove()
        $(span).remove()
        const dt = new DataTransfer()
        const input = document.getElementById('gallery-photo-add')
        const { files } = input
        
        for (let i = 0; i < files.length; i++) {
            const file = files[i]
            if (index !== i)
            dt.items.add(file) // here you exclude the file. thus removing it.
        }
        
        input.files = dt.files // Assign the updates list
    }

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});
    
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
    CKEDITOR.replace('intro');
    CKEDITOR.replace('description');
    CKEDITOR.replace('material');
</script>
@endsection