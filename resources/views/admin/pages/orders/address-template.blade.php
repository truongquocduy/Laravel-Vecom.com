<h4>Thay đổi địa chỉ giao hàng</h4>
<form onsubmit="changeAddress(event,'{{ $orderTarget->order_number }}')">
    <div class="row">
        <div class="col-lg-7">
            <div class="form-group mt-2">
                <select class="form-control" name="province_id" onchange="getDistrict(this)">
                    <option value="0" selected disabled>Chọn Tỉnh/Thành phố</option>
                    @foreach($listProvince as $province)
                    <option value="{{ $province->province_id }}" @if($province->province_id == $orderTarget->province_id) selected @endif> {{ $province->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <select class="form-control" id="district_option" name="district_id" onchange="getWard(this)">
                    <option value="0" selected disabled>Chọn Quận/Huyện</option>
                    @foreach($listDistrict as $district)
                    <option value="{{ $district->district_id }}" @if($district->district_id == $orderTarget->district_id) selected @endif> {{ $district->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <select class="form-control" id="ward_option" name="ward_id">
                    <option value="0" selected disabled>Chọn Phường/Xã</option>
                    @foreach($listWard as $ward)
                    <option value="{{ $ward->wards_id }}" @if($ward->wards_id == $orderTarget->ward_id) selected @endif> {{ $ward->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <textarea class="form-control" rows="5" id="diachi" name="address" placeholder="Số nhà">{{ $orderTarget->apartment_number }}</textarea>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group mt-2">
                <input type="text" class="form-control" name="phone" value="{{ $orderTarget->phone }}" placeholder="Số điện thoại">
            </div>
            <div class="form-group mt-2">
                <label for="note">Ghi chú:</label>
                <textarea class="form-control" rows="5" id="note" name="note"></textarea>
            </div>
            <button class="btn btn-outline-success w-100 p-3 mt-3">Cập nhật</button>
        </div>
    </div>
</form>
<script>
    $(function() {
        getDistrict = function(element) {
            var province_id = element.value
                axios.get("{{ route('front.address.district') }}/" + province_id)
                    .then(response =>{
                            $('#district_option').empty()
                            $('#ward_option').empty()
                            $('#district_option').append('<option value="0" selected>Chọn Quận/Huyện</option>')

                            $('#ward_option').append('<option value="0" selected>Chọn Phường/Xã</option>')
                            response.data[0].data.forEach((item)=> {
                                var html = '<option value="'+ item.district_id +'">'+ item.name +'</option>';
                                $('#district_option').append(html)
                            })
                        
                        }
                    )
        }

        getWard = function(element) {
            var district_id = element.value
            axios.get("{{ route('front.address.ward') }}/" + district_id)
                    .then(response =>{
                            $('#ward_option').empty()
                            $('#ward_option').append('<option value="0" selected>Chọn Phường/Xã</option>')
                            // $('#district_option').append(option_first)
                            response.data[0].data.forEach((item)=> {
                                var html = '<option value="'+ item.wards_id +'">'+ item.name +'</option>';
                                $('#ward_option').append(html)
                            })
                        }
                    )
        }

        
    })
</script>