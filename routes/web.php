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
Route::post('/products/rating',[App\Http\Controllers\Front\ProductController::class,'rating'])->name('front.product.rating');

Route::get('/product/categorys', [App\Http\Controllers\Admin\CategoryController::class, 'getCategorys'])->name('front.product.category');
Route::get('/product/category/{id}/subcategorys', [App\Http\Controllers\Admin\CategoryController::class, 'getSubCategorys'])->name('front.product.subcategory');
Route::get('/product/{product_id}/thumbnails', [App\Http\Controllers\Admin\ProductController::class, 'getThumbnail'])->name('front.product.thumbnails');
//SECTION CART
Route::get('/carts',[App\Http\Controllers\Front\CartController::class,'index'])->name('front.cart.index')->middleware(App\Http\Middleware\CheckUser::class);
Route::get('/get-carts',[App\Http\Controllers\Front\CartController::class,'getCart'])->name('front.cart.get');
Route::post('/add-cart',[App\Http\Controllers\Front\CartController::class,'addCart'])->name('front.cart.add');
Route::post('/change-cart',[App\Http\Controllers\Front\CartController::class,'changeQuality'])->name('front.cart.quality');
Route::get('/remove-carts/{product_id?}',[App\Http\Controllers\Front\CartController::class,'removeCarts'])->name('front.cart.remove');
Route::post('/checkout',[App\Http\Controllers\Front\CartController::class,'checkout'])->name('front.cart.checkout')->middleware(App\Http\Middleware\CheckUser::class);
Route::get('/checkout/{order_number}',[App\Http\Controllers\Front\CartController::class,'resultTemplate'])->name('front.cart.result');

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
Route::post('/user/address/change/default/{id}',[App\Http\Controllers\Front\UserController::class,'updateAddressDefault'])->name('front.user.address.update');
Route::post('/user/address/remove/default/{id}',[App\Http\Controllers\Front\UserController::class,'removeAddress'])->name('front.user.address.remove');

Route::get('/user/email-verified/{token_api}',[App\Http\Controllers\Front\UserController::class,'emailVerified'])->name('front.user.verified');

//SECTION BLOG
Route::get('/blogs',[App\Http\Controllers\Front\BlogController::class,'index'])->name('front.blog');
Route::get('/blogs/{slug}',[App\Http\Controllers\Front\BlogController::class,'detail'])->name('front.blog.detail');

//SECTION ADMIN
Route::group(['prefix' => 'admin', 'middleware' => 'admin'],function () {
    Route::get('/',[App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.index');

    Route::get('/products',[App\Http\Controllers\Admin\ProductController::class,'index'])->name('admin.product.index');
    Route::get('/products/datatables',[App\Http\Controllers\Admin\ProductController::class,'index'])->name('admin.product.datatables');
    Route::get('/product/create',[App\Http\Controllers\Admin\ProductController::class,'getCreateProduct'])->name('admin.product.create');
    Route::post('/product/create',[App\Http\Controllers\Admin\ProductController::class,'createProduct'])->name('admin.product.create');
    Route::post('/product/test',[App\Http\Controllers\Admin\ProductController::class,'test'])->name('admin.product.test');
    Route::get('/product/{product_id}/edit',[App\Http\Controllers\Admin\ProductController::class,'getEditProduct'])->name('admin.product.edit');
    Route::post('/product/{product_id?}/edit',[App\Http\Controllers\Admin\ProductController::class,'editProduct'])->name('admin.product.edit');
    Route::post('/product/{product_id?}/{name_thumbnail}/remove-thumbnail',[App\Http\Controllers\Admin\ProductController::class,'removeThumbnail'])->name('admin.product.remove.thumbnail');
    Route::get('/product/{product_id?}/remove',[App\Http\Controllers\Admin\ProductController::class,'removeProduct'])->name('admin.product.remove');
    Route::match(['get', 'post'],'/product/category',[App\Http\Controllers\Admin\ProductController::class,'category'])->name('admin.product.category');
    Route::post('/product/category/{slug?}/remove',[App\Http\Controllers\Admin\ProductController::class,'removeCategory'])->name('admin.product.category.remove');
    Route::get('/product/category/edit/{slug?}',[App\Http\Controllers\Admin\ProductController::class,'getTemplateEditCategory'])->name('admin.product.category.edit');
    Route::get('/product/category/datatables',[App\Http\Controllers\Admin\ProductController::class,'categoryDatatable'])->name('admin.product.category.datatables');
    Route::get('/product/sub-category/edit/{id?}/{category_id?}',[App\Http\Controllers\Admin\ProductController::class,'subTemplateCategory'])->name('admin.product.subcategory.edit');
    Route::post('/product/sub-category/editP', [App\Http\Controllers\Admin\ProductController::class,'subCategory'])->name('admin.product.subcategory.editP');

    Route::get('/users',[App\Http\Controllers\Admin\UserController::class,'index'])->name('admin.user.index');
    Route::get('/users/datatables',[App\Http\Controllers\Admin\UserController::class,'index'])->name('admin.user.datatables');
    Route::get('/users/hard/login/{user_id}',[App\Http\Controllers\Admin\UserController::class,'loginHard'])->name('admin.user.loginHard');

    Route::match(['get', 'post'],'/languages', [App\Http\Controllers\Admin\LanguageController::class, 'languages'])->name('admin.language');

    Route::any('/settings/homepage', [App\Http\Controllers\Admin\SettingController::class, 'homepage'])->name('admin.setting.homepage');
    Route::get('/settings/homepage/datatables', [App\Http\Controllers\Admin\SettingController::class, 'datatables'])->name('admin.setting.homepage.datatables');
    Route::any('/settings/master', [App\Http\Controllers\Admin\SettingController::class, 'master'])->name('admin.setting.master');
    Route::get('/settings/{title?}', [App\Http\Controllers\Admin\SettingController::class, 'getSetting'])->name('admin.settings');

    // Route::post('/product/category',[ProductController::class,'createCategory'])->name('product.category.create');
    // Route::get('/product/categorys/del/{id}',[ProductController::class,'deleteCategory'])->name('product.category.delete');
    // Route::get('/product/categorys/{id}/category',[ProductController::class,'getCategory'])->name('product.subcategory.get');
    // Route::post('/product/categorys/update',[ProductController::class,'updateCategory'])->name('product.category.update');
    // SECTION BLOG ADMIN
    Route::get('/blogs', [App\Http\Controllers\Admin\BlogController::class, 'index'])->name('admin.blog');
    Route::get('/blogs/datatables', [App\Http\Controllers\Admin\BlogController::class, 'index'])->name('admin.blog.datatables');
    Route::match(['get', 'post'], '/blogs/{slug}/edit', [App\Http\Controllers\Admin\BlogController::class, 'edit'])->name('admin.blog.edit');
    Route::get('/blogs/{slug}/remove', [App\Http\Controllers\Admin\BlogController::class, 'remove'])->name('admin.blog.remove');
    Route::match(['get', 'post'], '/blogs/create', [App\Http\Controllers\Admin\BlogController::class, 'create'])->name('admin.blog.create');

    Route::get('/order', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.order');
    Route::get('/order/datatables', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.order.datatables');
    Route::get('/order/{order_number}', [App\Http\Controllers\Admin\OrderController::class, 'detail'])->name('admin.order.detail');
    Route::post('/order/{order_number}', [App\Http\Controllers\Admin\OrderController::class, 'update'])->name('admin.order.update');
    Route::match(['get', 'post'], '/order/address/{order_number?}', [App\Http\Controllers\Admin\OrderController::class, 'updateAddress'])->name('admin.order.address');



    Route::get('/post',[PostController::class,'index'])->name('post.index');
    Route::get('/logout',[App\Http\Controllers\Admin\MemberController::class, 'logout'])->name('admin.logout');
});
Route::match(['get', 'post'], 'admin/login', [App\Http\Controllers\Admin\MemberController::class, 'login'])->name('admin.login');