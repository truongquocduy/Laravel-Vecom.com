<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;

class AddressController extends Controller
{
    public function getProvince(){
        $listProvince = Province::get();
        $data = array([
            'status' => 200,
            'data' => $listProvince
        ]);
        return response()->json($data,200);
    }

    public function getDistrict($province_id){
        $listDistrict = District::where('province_id', $province_id)->get();
        $data = array([
            'status' => 200,
            'data' => $listDistrict
        ]);
        return response()->json($data,200);
    }

    public function getWard($district_id){
        $listWard = Ward::where('district_id', $district_id)->get();
        $data = array([
            'status' => 200,
            'data' => $listWard
        ]);
        return response()->json($data,200);
    }
}
