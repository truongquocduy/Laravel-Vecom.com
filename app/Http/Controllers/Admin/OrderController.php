<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use DataTables;


class OrderController extends Controller
{
    public function index(Request $request) {
        if( \Request::is('*/datatables') ) {
            if($request->type) {
                if($request->type != "all") {
                    $listOrders = Order::where('status', $request->type)
                        ->whereDate('created_at', '>=', $request->from )
                        ->whereDate('created_at', '<=', $request->to )
                        ->get();
                }
                else {
                    $listOrders = Order::whereDate('created_at', '>=', $request->from )
                        ->whereDate('created_at', '<=', $request->to )
                        ->get();
                }
            }
            else {
                $listOrders = Order::whereDate('created_at', '>=', $request->from )
                    ->whereDate('created_at', '<=', $request->to )
                    ->get();
            }
            return Datatables::of($listOrders)
            ->addColumn('order_number', function ($order) {
                $html = $order->order_number . '<br>';
                if($order->payment_status == 0) {
                    return $html.'<span class="bg-warning text-light text-center ps-3 pe-3">Chưa thanh toán</span>';
                }
                return $html.'<span class="bg-success text-light text-center ps-3 pe-3">Đã thanh toán</span>';
            })
            ->addColumn('status', function ($order) {
                $html = '<select class="form-select" style="min-width:100px" onchange="updateStatusOrder(\''.$order->order_number.'\',this)">';
                if($order->status == "Cancel") {
                    $html.= '<option selected disabled>Đã hủy</option>';
                    return $html.'</select>';
                }
                if($order->status == "Pending") {
                    $html.= '<option value="Pending" selected>Đang chuẩn bị</option>';
                }
                else {
                    $html.= '<option value="Pending">Đang chuẩn bị</option>';
                }
                if($order->status == "Delivery") {
                    $html.= '<option value="Delivery" selected>Đang vận chuyển</option>';
                }
                else {
                    $html.= '<option value="Delivery">Đang vận chuyển</option>';
                }
                if($order->status == "Complete") {
                    $html.= '<option value="Complete" selected>Đã giao hàng</option>';
                }
                else {
                    $html.= '<option value="Complete">Đã giao hàng</option>';
                }
              return $html.'</select>';
            })
            ->addColumn('order_by', function ($order) {
                $userBuy = User::where('id', $order->user_id)->first();
                if(!$userBuy) {
                    return "Tài khoản không tồn tại";
                }
                return $userBuy->email;
            })
            ->addColumn('total_price', function ($order) {
                return number_format($order->total_price);
            })
            ->addColumn('created_at', function ($order) {
                return date_format($order->created_at,'Y-m-d h:i:s');
            })
            ->addColumn('action', function ($order) {
                $button_view_all = '<div class="dropdown">
                <button type="button" class="btn dropdown-toggle text-light" data-bs-toggle="dropdown">
                    Action More
                </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orderDetail" onclick="openDetail(\'' . $order->order_number . '\')">Xem biên lai</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orderAddress" onclick="openChangeAddress(\'' . $order->order_number . '\')">Thay đổi địa chỉ nhận</a></li>';
                        if($order->status != "Cancel") {
                            $button_view_all.= '<li><a class="dropdown-item" onclick="cancalOrder(\''. $order->order_number .'\')">Hủy đơn hàng</a></li>';
                        }
                return $button_view_all.'</ul></div>';
            })
            ->rawColumns(['order_number' ,'status' ,'action'])
            ->make(true);
        }
        return view('admin.pages.orders.order');
    }

    public function detail($order_number) {
        $orderTarget = Order::where('order_number', $order_number)->first();
        $user = User::where('id', $orderTarget->user_id)->first();
        $carts = unserialize($orderTarget->carts);
        $listCarts = array();
        if($carts) {
            foreach($carts as $item) {
                $detailItem = Product::findOrFail($item->id);
                if($detailItem){
                    $detailItem['quality'] = $item->quality;
                    array_push($listCarts,$detailItem);
                }
            }
        }
        $contents = \View::make('admin.pages.orders.detail-template',['orderTarget' => $orderTarget, 'user' => $user, 'listCarts' => $listCarts]);
        $response = \Response::make($contents, 200);
        $response->header('Content-Type', 'text/plain');
        return $response;
    }

    public function update(Request $request, $order_number) {
        $orderTarget = Order::where('order_number', $order_number)->first();
        if($request->status) {
            if($request->status == "Cancel") {
                $carts = unserialize($orderTarget->carts);
                if($carts) {
                    foreach($carts as $item) {
                        $detailItem = Product::findOrFail($item->id);
                        $detailItem->instock += $item->quality;
                        $detailItem->purchased -= $item->quality;
                        $detailItem->save();
                    }
                }
            }
            $orderTarget->status = $request->status;
        }
        $orderTarget->save();
        return response()->json([],207);
    }

    public function updateAddress(Request $request, $order_number) {
        $orderTarget = Order::where('order_number', $order_number)->first();
        if($request->isMethod('GET')) {
            $listProvince = Province::get();
            $listDistrict = District::where('province_id', $orderTarget->province_id)->get();
            $listWard = Ward::where('district_id', $orderTarget->district_id)->get();
            $contents = \View::make('admin.pages.orders.address-template',['orderTarget' => $orderTarget, 'listProvince' => $listProvince, 'listDistrict' => $listDistrict, 'listWard' => $listWard]);
            $response = \Response::make($contents, 200);
            $response->header('Content-Type', 'text/plain');
            return $response;
        }
        if ( $request->district_id == 0 ) {
            return response([
                'code' => 201,
                'status' => "003",
                'message' => "Quận huyện không được bỏ trống"
            ],201);
        }
        if ( $request->ward_id == 0 ) {
            return response([
                'code' => 201,
                'status' => "003",
                'message' => "Xã phường không được bỏ trống"
            ],201);
        }
        if ( $request->address == null ) {
            return response([
                'code' => 201,
                'status' => "003",
                'message' => "Số nhà không được bỏ trống"
            ],201);
        }
        if ( $request->phone == null ) {
            return response([
                'code' => 201,
                'status' => "003",
                'message' => "Số điện thoại không được bỏ trống"
            ],201);
        }

        $orderTarget->province_id = $request->province_id;
        $orderTarget->district_id = $request->district_id;
        $orderTarget->ward_id = $request->ward_id;
        $orderTarget->phone = $request->phone;
        $orderTarget->apartment_number = $request->address;
        $my_province = Province::where('province_id',$request->province_id)->first()->name;
        $my_district = District::where('district_id',$request->district_id)->first()->name;
        $my_ward = Ward::where('wards_id',$request->ward_id)->first()->name;
        $orderTarget->address = "$request->address, $my_ward, $my_district, $my_province";
        $orderTarget->save();
        return response([
            'code' => 201,
            'status' => "000",
            'message' => "Cập nhật thành công"
        ],201);
    }
}
