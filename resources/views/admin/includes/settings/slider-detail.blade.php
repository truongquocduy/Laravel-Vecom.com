<form action="{{ route('admin.setting.homepage') }}" method="POST" enctype='multipart/form-data'>
    @csrf
    <h4 class="title-lang">
        Khu vực chỉnh sửa
    </h4>
    <img src="{{ asset('assets/images/banners/' . $data->value) }}" width="100%" alt="" id="image">
    <div class="mt-2">Kích thước ( 3:1 ) <> 1200x400 px</div>
    <input type="file" class="mt-2" name="value" id="" onchange="readURL(this,'image')" accept="image/png, image/jpg, image/jpeg">
    <input type="text" class="form-control rounded-0 mt-2 bg-remove text-light" name="name" placeholder="Tiêu đề" value="{{ $data->name }}">
    <div class="form-check form-switch mt-2">
        <input class="form-check-input" type="checkbox" id="mySwitch" name="status" @if($data->status == 1) checked @endif>
        <label class="form-check-label" for="mySwitch">Trạng thái</label>
    </div>
    <input type="hidden" name="title" value="{{ $data->title }}">
    <div class="col-lg-12">
        <button class="btn btn-success mt-3">
            CHẤP NHẬN THAY ĐỔI
        </button>
    </div>
</form>
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