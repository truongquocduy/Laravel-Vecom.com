<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Setting;
use Auth;
class HomeController extends Controller
{
    public function index(){
        $listSlider = Setting::where('page', 'homepage')
            ->where('title', 'like' ,'slider-%')
            ->where('status' , 1)
            ->get();
        
        $listSBanner = Setting::where('page', 'homepage')
        ->where('title', 'like' ,'banner-%')
        ->orWhere('title', 'like' ,'background-%')
        ->where('status' , 1)
        ->get();

        $trend_products = Product::inRandomOrder()
            ->whereColumn('cost', 'price')
            ->orderBy('purchased', 'DESC')
            ->limit(8)
            ->get();

        $discount_products = Product::inRandomOrder()
            ->whereColumn('cost','<>' , 'price')
            ->orderBy('purchased', 'DESC')
            ->limit(8)
            ->get();

        $response = [
            'listSlider' => $listSlider,
            'listSBanner' => $listSBanner,
            'trend_products' => $trend_products,
            'discount_products' => $discount_products
        ];
        return view('front.pages.homepage', $response);
    }
}
