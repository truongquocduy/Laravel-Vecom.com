<h3>SUB CATEGORY</h3>
<form action="{{ route('admin.product.subcategory.editP')  }}" method="POST">
    @csrf
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Category Name:</label>
        <input type="text" class="form-control input-primary" id="name" placeholder="Enter Category Name" name="name" value="{{ (isset($data->name)) ? $data->name : '' }}">
        <input type="hidden" name="id" value="{{ ( isset($data->id) ) ? $data->id : '' }}">
        <input type="hidden" name="category_id" value="{{ ( isset($data['category_id']) ) ? $data['category_id'] : '' }}">
    </div>
    <button type="submit" class="btn btn-success w-100 p-3">{{ ( isset($data->id) ) ? 'CHỈNH SỬA' : 'THÊM MỚI' }}</button>
</form>
