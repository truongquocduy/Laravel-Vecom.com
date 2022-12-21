<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[App\Http\Controllers\Front\HomeController::class,'index'])->name('front.homepage');

//SECTION PRODUCT ---------------------------------------
Route::get('/products',[App\Http\Controllers\Front\ProductController::class,'index'])->name('front.product.index');
Route::get('/products/{slug?}',[App\Http\Controllers\Front\ProductController::class,'detail'])->name('front.product.detail');
Route::post('/products/comment',[App\Http\Controllers\Front\ProductController::class,'addComment'])->name('front.product.comment');
Route::get('/products/comment/{product_id?}',[App\Http\Controllers\Front\ProductController::class,'getComment'])->name('front.product.comment');

//SECTION CART
Route::get('/carts',[App\Http\Controllers\Front\CartController::class,'index'])->name('front.cart.index')->middleware(App\Http\Middleware\CheckUser::class);
Route::get('/get-carts',[App\Http\Controllers\Front\CartController::class,'getCart'])->name('front.cart.get');
Route::post('/add-cart',[App\Http\Controllers\Front\CartController::class,'addCart'])->name('front.cart.add');
Route::post('/change-cart',[App\Http\Controllers\Front\CartController::class,'changeQuality'])->name('front.cart.quality');
Route::get('/remove-carts/{product_id?}',[App\Http\Controllers\Front\CartController::class,'removeCarts'])->name('front.cart.remove');


Route::get('/provinces',[App\Http\Controllers\Front\AddressController::class,'getProvince'])->name('front.address.province');
Route::get('/districts/{province_id?}',[App\Http\Controllers\Front\AddressController::class,'getDistrict'])->name('front.address.district');
Route::get('/wards/{district_id?}',[App\Http\Controllers\Front\AddressController::class,'getWard'])->name('front.address.ward');

Route::get('/search',[App\Http\Controllers\Front\SearchController::class,'index'])->name('front.search.index');

//SECTION LOGIN
Route::get('/login',[App\Http\Controllers\Front\UserController::class,'loginTemplate'])->name('front.user.login');
Route::get('/logout',[App\Http\Controllers\Front\UserController::class,'logout'])->name('front.user.logout');
Route::post('/login',[App\Http\Controllers\Front\UserController::class,'login'])->name('front.user.login');
Route::post('/register',[App\Http\Controllers\Front\UserController::class,'register'])->name('front.user.register');
Route::get('/checkexistemail/{email?}',[App\Http\Controllers\Front\UserController::class,'checkExistEmail'])->name('front.user.check.email');

//SECTION USER
Route::get('/user/address',[App\Http\Controllers\Front\UserController::class,'getAddress'])->name('front.user.address');
Route::post('/user/address',[App\Http\Controllers\Front\UserController::class,'newAddress'])->name('front.user.address');
