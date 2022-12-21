<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use Auth;
use App\Classes\Address;

class UserController extends Controller
{
    public function loginTemplate() {
        // Auth::logout();
        return view('front.pages.login');
    }

    public function login(Request $request){
        $dataLogin = array(
            'email' => $request->email,
            'password' => $request->password
        );
        if( Auth::attempt($dataLogin) ){
            $data = array(
                'status' => "000",
                'data' => Auth::user()
            );
        }
        else {
            $data = array(
                'status' => "001",
            );
        }
        return response()->json($data);

    }

    public function register(Request $request){
        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $data = array(
            'status' => "000",
            'data' => $newUser
        );
        return response()->json($data);
    }

    public function checkExistEmail($email){
        $existUser = User::where('email', $email)->first();
        if (!$existUser) {
            return response()->json(array('status'=> "000"));
        }
        return response()->json(array('status'=> "001"));
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->route('front.user.login');
    }

    public function newAddress(Request $request) {
        $user = Auth::user();
        $address = new Address;
        $oldAddress = $user->address;
        if($oldAddress === null) {
            $oldAddress = array();
            $address->status = true;
        }
        else{
            $oldAddress = unserialize($user->address);
        }
        $address->province_id = $request->province_id;
        $address->district_id = $request->district_id;
        $address->ward_id = $request->ward_id;
        $address->phone = $request->phone;
        $address->address = $request->address;
        $address->phone = $request->phone;
        $address->note = $request->note;
        array_push($oldAddress,$address);
        $user->address = serialize($oldAddress);
        $user->save();
        foreach($oldAddress as $item) {
            $my_province = Province::where('province_id',$item->province_id)->first()->name;
            $my_district = District::where('district_id',$item->district_id)->first()->name;
            $my_ward = Ward::where('wards_id',$item->ward_id)->first()->name;
            $item->detail = "$item->address, $my_ward, $my_district, $my_province";
        }
        $data = array(
            'status' => "000",
            'message' => "Success",
            'data' => $oldAddress
        );
        return response()->json($data);

    }

    public function getAddress() {
        $listAddress = Auth::user()->address;
        if($listAddress === null) {
            $listAddress = array();
        }
        else{
            $listAddress = unserialize($listAddress);
        }
        foreach($listAddress as $item) {
            $my_province = Province::where('province_id',$item->province_id)->first()->name;
            $my_district = District::where('district_id',$item->district_id)->first()->name;
            $my_ward = Ward::where('wards_id',$item->ward_id)->first()->name;
            $item->detail = "$item->address, $my_ward, $my_district, $my_province";
        }
        $data = array(
            "status" => "000",
            "message" => "Success",
            "data" => $listAddress
        );
        return response()->json($data);
    }
}
