<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    public function index(){
        // $str = utf8_encode(serialize(array('name'=> "Trương Quốc Duy")));
        // dd($str, unserialize(utf8_decode($str)));
        return view('front.pages.homepage');
    }
}
