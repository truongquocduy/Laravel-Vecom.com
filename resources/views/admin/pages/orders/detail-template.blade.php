<div class="row bg-light justify-content-center">
    <div class="col-lg-12 p-5 mt-3" style="background-color: white;">
        <div class="row">
            <div class="col-lg-6">
                <table class="table table-borderless">
                    <tr>
                        <td><strong>Mã hóa đơn:</strong></td>
                        <td><p>{{ $orderTarget->order_number }}</p></td>
                    </tr>
                    <tr>
                        <td><strong>Họ tên:</strong></td>
                        <td><p>{{ $user->name }}</p></td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td><p>{{ $user->email }}</p></td>
                    </tr>
                    <tr>
                        <td><strong>Số điện thoại:</strong></td>
                        <td><p>{{ $orderTarget->phone }}</p></td>
                    </tr>
                    <tr>
                        <td><strong>Địa chỉ nhận hàng:</strong></td>
                        <td><p>{{ $orderTarget->address }}</p></td>
                    </tr>
                    <tr>
                        <td><strong>Ngày đặt:</strong></td>
                        <td><p>{{ $orderTarget->created_at }}</p></td>
                    </tr>
                    <tr>
                        <td><strong>Dự kiến ngày nhận:</strong></td>
                        <td><p>{{ $orderTarget->delivery_date }}</p></td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-6">
                <table class="table table-borderless">
                    <tr>
                        <td><strong>Trạng thái:</strong></td>
                        <td>
                            @if( $orderTarget->payment_status == 0 )
                            <p class="bg-warning text-light text-center">Chưa thanh toán</p>
                            @else
                            <p class="bg-success text-light text-center">Đã thanh toán</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Quá trình:</strong></td>
                        <td>
                            @if( $orderTarget->status == "Pending" )
                            <p class="bg-warning text-light text-center">Đang chuẩn bị</p>
                            @elseif($orderTarget->status == "Delivery" )
                            <p class="bg-primary text-light text-center">Đang vận chuyển</p>
                            @elseif($orderTarget->status == "Complete" )
                            <p class="bg-success text-light text-center">Đã giao hàng</p>
                            @else
                            <p class="bg-danger text-light text-center">Đã hủy đơn hàng</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Phương thức vận chuyển:</strong></td>
                        <td><p>{{ ($orderTarget->transit_method == 'GHTK') ? "Giao hàng tiết kiệm" : "Giao hàng nhanh" }}</p></td>
                    </tr>
                    <tr>
                        <td><strong>Phương thức thanh toán:</strong></td>
                        <td><p>{{ ( $orderTarget->payment_method != 'cod' ) ? $$orderTarget->payment_method : "Thanh toán khi nhận hàng" }}</p></td>
                    </tr>
                    <tr>
                        <td><strong>Tổng sản phẩm:</strong></td>
                        <td><p>{{ $orderTarget->quality }}</p></td>
                    </tr>
                    <tr>
                        <td><strong>Giá sản phẩm:</strong></td>
                        <td><p>{{ number_format($orderTarget->total_price - $orderTarget->transit_fee) }} VNĐ</p></td>
                    </tr>
                    <tr>
                        <td><strong>Phí vận chuyển:</strong></td>
                        <td><p>{{ number_format($orderTarget->transit_fee) }} VNĐ</p></td>
                    </tr>
                    <tr>
                        <td><strong>Tổng tiền:</strong></td>
                        <td><p>{{ number_format($orderTarget->total_price) }} VNĐ</p></td>
                    </tr>
                </table>
            </div>
        </div>
        <h3 class="text-center">SẢN PHẨM ĐÃ MUA</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Tên hàng</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listCarts as $product)
                <tr >
                    <td><img src="{{ asset('assets/images/products/' . $product->image) }}" width="80px" alt=""
                            style="border-radius: 10px;"></td>
                    <td style="vertical-align: middle;">{{ $product->name }}</td>
                    <td style="vertical-align: middle;">{{ number_format($product->price) }} VNĐ</td>
                    <td style="vertical-align: middle;width: 150px;">
                        <button class="btn btn-secondary" disabled><strong>{{ $product->quality }}</strong></button>
                    </td>
                    <td style="vertical-align: middle;">{{ number_format($product->price * $product->quality) }} VNĐ</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>