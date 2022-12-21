<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Product;

class CartController extends Controller
{
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
                    if($existProduct->instock >= ($oldCarts[$exist_item_carts]->quality | 0) + $request->quality && $existProduct->instock > 0){
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
}
