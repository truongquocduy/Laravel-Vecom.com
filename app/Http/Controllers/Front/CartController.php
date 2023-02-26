<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use App\Models\Order;

class CartController extends Controller
{
    public function __construct(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    public function index(){
        return view('front.pages.carts');
    }

    public function getCart(){
        $carts = unserialize(Auth::user()->carts);
        $data = array();
        if($carts) {
            foreach($carts as $item) {
                $detailItem = Product::findOrFail($item->id);
                if($detailItem){
                    $detailItem->quality = $item->quality;
                    array_push($data,$detailItem);
                }
            }
        }
        return response()->json($data);
    }

    public function addCart(Request $request) {
        if(Auth::check()){
            $existProduct = Product::findOrFail($request->product_id);
            if($existProduct) {
                $user = Auth::user();
                // dd(unserialize($user->carts));
                if (!$oldCarts = unserialize($user->carts)) {
                    $oldCarts = array();
                }
                $exist_item_carts = array_search($request->product_id,array_column($oldCarts, 'id'));
                if(count($oldCarts) > 0 ) {
                    if($existProduct->instock >= (($exist_item_carts)?$oldCarts[$exist_item_carts]->quality : 0) + $request->quality && $existProduct->instock > 0){
                        if($exist_item_carts !== false) {
                            $oldCarts[$exist_item_carts]->quality += $request->quality;
                        }
                        else{
                            $newItem = new \stdClass;
                            $newItem->id = $request->product_id;
                            $newItem->quality = $request->quality;
                            array_push($oldCarts, $newItem);
                        }
                        $data = array(
                            'status' => "000",
                            'message' => "Success"
                        );
                    }
                    else{
                        $oldCarts[$exist_item_carts]->quality = $existProduct->instock;
                        $data = array(
                            'status' => "004",
                            'message' => "Không đủ số lượng"
                        );
                    }
                }
                else {
                    if($existProduct->instock >= $request->quality && $existProduct->instock > 0){
                        $newItem = new \stdClass;
                        $newItem->id = $request->product_id;
                        $newItem->quality = $request->quality;
                        array_push($oldCarts, $newItem);
                        $data = array(
                            'status' => "000",
                            'message' => "Success"
                        );
                    }
                    else{
                        $data = array(
                            'status' => "004",
                            'message' => "Không đủ số lượng"
                        );
                    }
                }
                $user->carts = serialize($oldCarts);
                $user->save();
                // $user->carts = 
            }
            else {
                $data = array(
                    'status' => "003",
                    'message' => "ID product not exist !!!"
                );
            }
        }
        else {
            $data = array(
                'status' => "001",
                'message' => "Please Login !!!"
            );
        }
        return response()->json($data);
    }

    public function changeQuality(Request $request){
        $existProduct = Product::findOrFail($request->product_id);
        if($existProduct) {
            $user = Auth::user();
            $oldCarts = unserialize($user->carts);
            $exist_item_carts = array_search($request->product_id,array_column($oldCarts, 'id'));
            if($exist_item_carts !== false) {
                if($request->method == "up"){
                    if($existProduct->instock >= $oldCarts[$exist_item_carts]->quality + 1){
                        $oldCarts[$exist_item_carts]->quality++;
                        $data = array(
                            'status' => "000",
                            'message' => "Success"
                        );
                    }
                    else{
                        $data = array(
                            'status' => "004",
                            'message' => "Không đủ số lượng"
                        );
                    }
                }
                else{
                    if($oldCarts[$exist_item_carts]->quality > 0){
                        $oldCarts[$exist_item_carts]->quality--;
                        $data = array(
                            'status' => "000",
                            'message' => "Success"
                        );
                    }
                    else{
                        $data = array(
                            'status' => "004",
                            'message' => "Không thể giảm"
                        );
                    }
                }
            }
            $user->carts = serialize($oldCarts);
            $user->save();  
        }
        else{
            $data = array(
                'status' => "003",
                'message' => "ID product not exist !!!"
            );
        }

        return response()->json($data);
    }
    public function removeCarts($product_id){
        $existProduct = Product::findOrFail($product_id);
        if($existProduct) {
            $user = Auth::user();
            $oldCarts = unserialize($user->carts);
            $exist_item_carts = array_search($product_id,array_column($oldCarts, 'id'));
            if($exist_item_carts !== false) {
                if($product_id != "all"){
                    array_splice($oldCarts,$exist_item_carts,1);
                }
                else{
                    $oldCarts = array();
                }
            }
            $user->carts = serialize($oldCarts);
            $user->save();
            $data = array(
                'status' => "000",
                'message' => "Success"
            );  
        }
        else{
            $data = array(
                'status' => "003",
                'message' => "ID product not exist !!!"
            );
        }

        return response()->json($data);
    }

    public function checkout(Request $request){
        $carts = unserialize(Auth::user()->carts);
        if( count($carts) == 0 ) {
            return abort(404); //Chuyển quay lại trang mua hàng
        }
        //Kiểm tra số lượng cuối cùng
        $qualityItem = 0;
        if($carts) {
            foreach($carts as $item) {
                $detailItem = Product::findOrFail($item->id);
                if($detailItem->instock < $item->quality){
                    dd("Không đủ số lượng");
                }
                $qualityItem += $item->quality;
            }
        }
        //Xong bước kiểm tra
        $user = Auth::user();
        $newOrder = new Order;
        $newOrder->user_id = $user->id;
        do {
            $order_code = \Str::random(8);
            $order_number = strtoupper("O".date('Ymd').$order_code);
        } while (Order::where("order_number", "=", $order_number)->first() instanceof User);
        $newOrder->order_number = $order_number;
        $newOrder->carts = $user->carts;
        $newOrder->quality = $qualityItem;
        $newOrder->status = "Pending";
        $newOrder->payment_status = 0; // 0 là trang thái unpaid
        $newOrder->payment_method = $request->paymentMethod;
        $newOrder->address = $request->address;
        $newOrder->province_id = $request->province_id;
        $newOrder->district_id = $request->district_id;
        $newOrder->ward_id = $request->ward_id;
        $newOrder->apartment_number = $request->address_use;
        $newOrder->phone = $request->phone;
        $newOrder->total_price = $request->totalPrice;
        $newOrder->transit_method = ($request->transit_fee == 25000) ? "GHTK" : "GHN";
        $newOrder->transit_fee = $request->transit_fee;
        $today = date('Y-m-d');
        $newOrder->delivery_date = ($request->transit == 25000) ? date('Y-m-d', strtotime($today. ' + 5 days')) : date('Y-m-d', strtotime($today. ' + 3 days'));
        $newOrder->save();

        // Cập nhật lại số lượng sản phẩm
        if($carts) {
            foreach($carts as $item) {
                $detailItem = Product::findOrFail($item->id);
                $detailItem->instock -= $item->quality;
                $detailItem->purchased += $item->quality;
                $detailItem->save();
            }
        }
        //clear giỏ hàng
        $user->carts = serialize(array());
        $user->save();
        $response = [
            'code' => 201,
            'status' => "000",
            'message' => "Thanh toán thành công",
            'order_number' => $order_number
        ];
        return response()->json($response,$response['code']);
    }

    public function resultTemplate($order_number) {
        $orderTarget = Order::where('order_number', $order_number)->first();
        if( !$orderTarget ) {
            return abort(404);
        }
        if( Auth::check() ) {
            if( Auth::user()->id == $orderTarget->user_id) {
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
                return view('front.pages.carts.result-checkout',['orderTarget' => $orderTarget, 'user' => Auth::user(), 'listCarts' => $listCarts]);
            }
            return "Bạn không thể xem hóa đơn của người khác!!!";   
        }
        else {
            return "Vui lòng đăng nhập để xem !!!";
        }
    }
}
