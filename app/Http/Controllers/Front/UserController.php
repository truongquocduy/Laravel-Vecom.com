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
    public function __construct(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    
    public function loginTemplate() {
        if(Auth::user()) {
            return redirect()->route('front.homepage');
        }
        // Auth::logout();
        return view('front.pages.login');
    }

    public function login(Request $request){
        $dataLogin = array(
            'email' => $request->email,
            'password' => $request->password
        );
        if( Auth::attempt($dataLogin) ){
            if(Auth::user()->email_verified == 0) {
                $data = array(
                    'status' => "002",
                );
                Auth::logout();
            }
            else{
                $data = array(
                    'status' => "000",
                    'data' => Auth::user()
                );
            }
        }
        else {
            $data = array(
                'status' => "001",
            );
        }
        return response()->json($data);

    }

    public function register(Request $request){
        do {
            $token_api = \Str::random(24);
        } while (User::where("token_api", "=", $token_api)->first() instanceof User);
        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'token_api' => $token_api,
            'email_verified' => 0,
            'password' => Hash::make($request->password),
        ]);
        $mail_data = [
            'recipient' => $request->email,
            'fromEmail' => "truongquocduy.mo@gmail.com",
            'fromName' => "Vecom.com",
            'subject' => "Xác nhận đăng ký tài khoản !!!",
            'body' => $token_api
        ];
        \Mail::send('admin.includes.login-email-template', $mail_data, function ($message) use ($mail_data){
            $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'])
                    ->subject($mail_data['subject']);
        });
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
            if(count($oldAddress) == 0) {
                $address->status = true;
            }
        }
        $address->id = (count($oldAddress) != 0) ? $oldAddress[count($oldAddress) - 1]->id + 1 : 1;
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

    public function emailVerified($token_api) {
        $userTarget = User::where('token_api', $token_api)->first();
        if(!$userTarget) {
            return abort(404);
        }
        $userTarget->email_verified = 1;
        $userTarget->save();
        return view('admin.includes.result-email-template');
    }

    public function updateAddressDefault($id) {
        $user = Auth::user();
        $oldAddress = unserialize($user->address);
        
        foreach($oldAddress as $address) {
            $address->status = false;
        }
        $addressTargetIndex = array_search($id, array_column($oldAddress, 'id'));
        $oldAddress[$addressTargetIndex]->status = true;
        $user->address = serialize($oldAddress);
        $user->save();
        $data = array(
            'status' => "000",
            'message' => "Success"
        );
        return response()->json($data);
    }

    public function removeAddress($id) {
        $user = Auth::user();
        $oldAddress = unserialize($user->address);
        $addressTargetIndex = array_search($id, array_column($oldAddress, 'id'));
        $addressTarget = $oldAddress[$addressTargetIndex];
        array_splice($oldAddress,$addressTargetIndex,1);
        
        if($addressTarget->status) {
            if(count($oldAddress) > 0) {
                $oldAddress[count($oldAddress) - 1]->status = true;
            }
        }
        $user->address = serialize($oldAddress);
        $user->save();
        $data = array(
            'status' => "000",
            'message' => "Success"
        );
        return response()->json($data);
        
    }
}
