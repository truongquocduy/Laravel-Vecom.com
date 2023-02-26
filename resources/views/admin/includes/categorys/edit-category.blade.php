<h3>CATEGORY</h3>
<form action="{{ route('admin.product.category') }}" method="POST">
    @csrf
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Category Name:</label>
        <input type="text" class="form-control input-primary" id="name" placeholder="Enter Category Name" name="name" value="{{ (isset($data->name)) ? $data->name : '' }}">
        <input type="hidden" name="slug" value="{{ ( isset($data->slug) ) ? $data->slug : '' }}">
    </div>
    <button type="submit" class="btn btn-success w-100 p-3">{{ ( isset($data->slug) ) ? 'CHỈNH SỬA' : 'THÊM MỚI' }}</button>
</form>
