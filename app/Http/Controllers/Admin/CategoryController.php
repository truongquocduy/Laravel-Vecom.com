<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategorys;
use App\Models\ProductSubCategorys;


class CategoryController extends Controller
{
    public function getCategorys() {
        $listCategorys = ProductCategorys::get();
        $data = [
            'code' => 200,
            'status' => "000",
            'message' => "Thành công",
            'data' => $listCategorys
        ];
        return response()->json($data,200);
    }

    public function getSubCategorys($id) {
        $listSubCategorys = ProductSubCategorys::where("category_id", $id)->get();
        $data = [
            'code' => 200,
            'status' => "000",
            'message' => "Thành công",
            'data' => $listSubCategorys
        ];
        return response()->json($data,200);
    }
}
