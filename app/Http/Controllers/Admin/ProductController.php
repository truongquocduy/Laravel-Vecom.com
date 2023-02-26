<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategorys;
use App\Models\ProductSubCategorys;
use DataTables;

class ProductController extends Controller
{
    public function __construct(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    
    public function index() {
        $listProducts = Product::get();
        if( \Request::is('*/datatables') ) {
            return Datatables::of($listProducts)
            ->addColumn('image', function ($product) {
                return '<img class="img-fluid" src="'. asset('assets/images/products/' . $product->image) .'"  width="80px" >';
            })
            ->addColumn('cost', function ($product) {
                return number_format($product->cost);
            })
            ->addColumn('price', function ($product) {
                return number_format($product->price);
            })
            ->addColumn('updated_at', function ($product) {
                return date_format($product->updated_at, "Y-m-d H:i:s");
            })
            ->addColumn('action', function ($product) {
                $button_view_all = '<button class="btn btn-outline-success m-2">View All</button>';
                $button_edit = '<a href="'. route('admin.product.edit', ['product_id' => $product->id]) .'"><button class="btn btn-outline-warning m-2">Edit</button></a>';
                $button_remove = '<button class="btn btn-outline-danger m-2" onclick="removeProduct('. $product->id .')">Delete</button>';
                return $button_view_all . $button_edit .$button_remove;
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
        }
        return view('admin.pages.products.product',['listProducts' => $listProducts]);
    }
    
    public function getCreateProduct() {
        $listCategory = ProductCategorys::get();
        return view('admin.pages.products.newproduct',['listCategory' => $listCategory]);
    }

    public function getThumbnail($product_id) {
        $listProducts = Product::findOrFail($product_id);
        $dataResponse['code'] = 200;
        $dataResponse['status'] = "000"; // Trạng thái thành công
        $dataResponse['message'] = "Thành công";
        if($listProducts !== null) {
            $dataResponse['data'] = json_decode($listProducts->thumbnails);
        }
        else{
            $dataResponse['data'] = [];
        }
        return response()->json($dataResponse,200);
    }

    public function createProduct(Request $request) {
        $dataResponse = [];
        if (!$request->name) {
            $dataResponse['code'] = 400;
            $dataResponse['status'] = "003"; // Trạng thái thiếu nội dung
            $dataResponse['message'] = "Name không được bỏ trống";
            return response()->json($dataResponse,400);
        }
        if (!$request->category) {
            $dataResponse['code'] = 400;
            $dataResponse['status'] = "003"; // Trạng thái thiếu nội dung
            $dataResponse['message'] = "Category không được bỏ trống";
            return response()->json($dataResponse,400);
        }
        if ($request->subcategory == "null") {
            $dataResponse['code'] = 400;
            $dataResponse['status'] = "003"; // Trạng thái thiếu nội dung
            $dataResponse['message'] = "Sub Category không được bỏ trống";
            return response()->json($dataResponse,400);
        }
        if (!$request->instock) {
            $dataResponse['code'] = 400;
            $dataResponse['status'] = "003"; // Trạng thái thiếu nội dung
            $dataResponse['message'] = "Instock không được bỏ trống";
            return response()->json($dataResponse,400);
        }
        if (!$request->image) {
            $dataResponse['code'] = 400;
            $dataResponse['status'] = "003"; // Trạng thái thiếu nội dung
            $dataResponse['message'] = "Hình không được bỏ trống";
            return response()->json($dataResponse,400);
        }
        if (!$request->price) {
            $dataResponse['code'] = 400;
            $dataResponse['status'] = "003"; // Trạng thái thiếu nội dung
            $dataResponse['message'] = "Giá không được bỏ trống";
            return response()->json($dataResponse,400);
        }
        else {
            if ($request->price < 0) {
                $dataResponse['code'] = 400;
                $dataResponse['status'] = "004"; // Trạng thái không hợp lệ
                $dataResponse['message'] = "Giá tiền phải lớn hơn 0";
                return response()->json($dataResponse,400);
            }
        }
        if ($request->cost && $request->cost < 0) {
            $dataResponse['code'] = 400;
            $dataResponse['status'] = "004"; // Trạng thái không hợp lệ
            $dataResponse['message'] = "Giá Cost phải lớn hơn 0";
            return response()->json($dataResponse,400);
        }

        // End Validate ----------------------------
        $dateTime = new \DateTime();
        $dateTime->setTime(20, 0);
        $timestamp = $dateTime->getTimestamp();
        $newProduct = new Product;
        $newProduct->name = $request->name;
        $newProduct->category = $request->category;
        $newProduct->sub_category = $request->subcategory;
        $newProduct->slug = \Str::slug($request->name) . "-" .$timestamp;
        $newProduct->price = $request->price;
        $newProduct->cost = ($request->cost !== null) ? $request->cost : $request->price;
        $newProduct->intro = $request->intro;
        $newProduct->details = $request->description;
        $newProduct->material = $request->material;
        
        $newProduct->rating = 0;
        $newProduct->purchased = 0;
        $newProduct->instock = $request->instock;
        $newProduct->save();

        $hinh = $request->file('image');
        $nameimg = $hinh->getClientOriginalName();
        $newProduct->image = "product" . $newProduct->id ."_a" . ".jpg";

        // $listThumbnails = array_filter($request->all(), function($k) {
        //     return strpos($k,"imagethumbnail") !== false;
        // }, ARRAY_FILTER_USE_KEY);
        $listThumbnails = $request->thumbnails;
        $pasteThumbnails = array();
        $thumbnailI = 0;
        foreach($listThumbnails as $item) {
            $namethumbnailitem = $item->getClientOriginalName();
            array_push($pasteThumbnails,"product" . $newProduct->id ."_b". $thumbnailI. ".jpg");
            $item->move("assets/images/products","product" . $newProduct->id ."_b". $thumbnailI. ".jpg");
            $thumbnailI++;
        }
        $newProduct->thumbnails = json_encode($pasteThumbnails);
        $newProduct->save();
        $storedPath = $hinh->move("assets/images/products",$newProduct->image);

        $dataResponse['code'] = 201;
        $dataResponse['status'] = "000"; // Trạng thái không hợp lệ
        $dataResponse['message'] = "Tạo sản phẩm thành công";
        return response()->json($dataResponse,201);
    }

    public function getEditProduct($product_id) {
        $productTarget = Product::findOrFail($product_id);
        $listCategory = ProductCategorys::get();
        $listSubCategory = ProductSubCategorys::where("category_id", $productTarget->category)->get();
        return view('admin.pages.products.edit-product',['listCategory' => $listCategory, 'listSubCategory' => $listSubCategory, 'productTarget' => $productTarget]);
    }

    public function editProduct(Request $request, $product_id) {
        $dataResponse = [];
        if (!$request->name) {
            $dataResponse['code'] = 400;
            $dataResponse['status'] = "003"; // Trạng thái thiếu nội dung
            $dataResponse['message'] = "Name không được bỏ trống";
            return response()->json($dataResponse,400);
        }
        if (!$request->category) {
            $dataResponse['code'] = 400;
            $dataResponse['status'] = "003"; // Trạng thái thiếu nội dung
            $dataResponse['message'] = "Category không được bỏ trống";
            return response()->json($dataResponse,400);
        }
        if ($request->subcategory == "null") {
            $dataResponse['code'] = 400;
            $dataResponse['status'] = "003"; // Trạng thái thiếu nội dung
            $dataResponse['message'] = "Sub Category không được bỏ trống";
            return response()->json($dataResponse,400);
        }
        if (!$request->instock) {
            $dataResponse['code'] = 400;
            $dataResponse['status'] = "003"; // Trạng thái thiếu nội dung
            $dataResponse['message'] = "Instock không được bỏ trống";
            return response()->json($dataResponse,400);
        }
        if (!$request->price) {
            $dataResponse['code'] = 400;
            $dataResponse['status'] = "003"; // Trạng thái thiếu nội dung
            $dataResponse['message'] = "Giá không được bỏ trống";
            return response()->json($dataResponse,400);
        }
        else {
            if ($request->price < 0) {
                $dataResponse['code'] = 400;
                $dataResponse['status'] = "004"; // Trạng thái không hợp lệ
                $dataResponse['message'] = "Giá tiền phải lớn hơn 0";
                return response()->json($dataResponse,400);
            }
        }
        if ($request->cost && $request->cost < 0) {
            $dataResponse['code'] = 400;
            $dataResponse['status'] = "004"; // Trạng thái không hợp lệ
            $dataResponse['message'] = "Giá Cost phải lớn hơn 0";
            return response()->json($dataResponse,400);
        }
        // End Validate ----------------------------

        $productTarget = Product::where("id", $product_id)->first();

        if(!$productTarget) {
            $dataResponse['code'] = 400;
            $dataResponse['status'] = "002"; // Trạng thái không tồn tại
            $dataResponse['message'] = "ID không tồn tại !!!";
            return response()->json($dataResponse, $dataResponse['code']);
        }

        $dateTime = new \DateTime();
        $dateTime->setTime(20, 0);
        $timestamp = $dateTime->getTimestamp();
        $productTarget->name = $request->name;
        $productTarget->category = $request->category;
        $productTarget->sub_category = $request->subcategory;
        $productTarget->slug = ($productTarget->name != $request->name) ? (\Str::slug($request->name) . "-" .$timestamp) : $productTarget->slug;
        $productTarget->price = $request->price;
        $productTarget->cost = ($request->cost !== null) ? $request->cost : $request->price;
        $productTarget->intro = $request->intro;
        $productTarget->details = $request->description;
        $productTarget->material = $request->material;
        $productTarget->instock = $request->instock;

        if($request->image !== null) { //có thay đổi hình đại diện
            $hinh = $request->file('image');
            $nameimg = $hinh->getClientOriginalName();
            $storedPath = $hinh->move("assets/images/products",$productTarget->image);
        }
        $listThumbnails = $request->thumbnails;
        $pasteThumbnails = json_decode($productTarget->thumbnails);
        $thumbnailI = (trim(explode('_b' , $pasteThumbnails[count($pasteThumbnails) - 1])[1],'.jpg'))*1 + 1;// khúc này
        foreach($listThumbnails as $item) {
            $namethumbnailitem = $item->getClientOriginalName();
            array_push($pasteThumbnails,"product" . $productTarget->id ."_b". $thumbnailI. ".jpg");
            $item->move("assets/images/products","product" . $productTarget->id ."_b". $thumbnailI. ".jpg");
            $thumbnailI++;
        }
        $productTarget->thumbnails = json_encode($pasteThumbnails);
        $productTarget->save();
        $dataResponse['code'] = 201;
        $dataResponse['status'] = "000"; // Trạng thái thành công
        $dataResponse['message'] = "Cập nhật sản phẩm thành công";
        return response()->json($dataResponse,201);

    }


    public function removeProduct($product_id) {
        $productTarget = Product::findOrFail($product_id);
        //Thực hiện xóa hình và thumbnail
        $fileImagePath = public_path() . "/assets/images/products/" . ($productTarget->image !== null) ? $productTarget->image : "";
        if(file_exists( $fileImagePath )) {
            unlink($fileImagePath);
        }
        //Thực hiện xóa thumbnail
        $listThumbnails = json_decode($productTarget->thumbnails);
        if($listThumbnails) {
            foreach($listThumbnails as $thumbnail) {
                $fileThumbnailPath = public_path() . "/assets/images/products/" . $thumbnail;
                if( file_exists($fileThumbnailPath) ) {
                    unlink($fileThumbnailPath);
                }
            }
        }
        $productTarget->delete();
        $dataResponse['code'] = 200;
        $dataResponse['status'] = "000"; // Trạng thái thành công
        $dataResponse['message'] = "Xóa sản phẩm thành công";
        return response()->json($dataResponse,$dataResponse['code']);
    }

    public function category(Request $request) {
        if($request->isMethod('GET')) {
            $listCategory = [];
            return view('admin.pages.products.category', ['listCategory' => $listCategory]);
        }
        $categoryTarger = ProductCategorys::where('slug', $request->slug)->first();
        if( !$categoryTarger ) {
            $newCategory = new ProductCategorys;
            $newCategory->name = $request->name;
            $newCategory->slug = \Str::slug($request->name);
            $newCategory->save();
        }
        else {
            $categoryTarger->name = $request->name;
            $categoryTarger->slug = \Str::slug($request->name);
            $categoryTarger->save();
        }

        return redirect()->route('admin.product.category');
    }

    public function categoryDatatable() {
        $listCategory = ProductCategorys::get();
        if( \Request::is('*/datatables') ) {
            return Datatables::of($listCategory)
            ->addColumn('name', function ($category) {
                return '<h3><span class="badge bg-primary">'. $category->name .'</span></h3>';
            })
            ->addColumn('subcategory', function ($category) {
                $listSub = ProductSubCategorys::where('category_id', $category->id)->get();
                if( count($listSub) == 0 ) {
                    return "Không Subcategory <table class='table text-light'><tr><td colspan='2'><button class='btn btn-warning ms-3 w-75' onclick='getTemplateSubCategory(0,".$category->id.")'>Add Sub</button></td></tr></table>";
                }
                $result = "<table class='table text-light'>";
                foreach($category->getSub() as $sub) {
                    $result .= '<tr><td>'. $sub['name'] .'</td><td><button class="btn btn-warning ms-3" onclick="getTemplateSubCategory('.$sub["id"].')">Edit Sub</button><button class="btn btn-danger m-2" onclick="">Delete</button></td></tr>';
                }
                $result.= "<tr><td colspan='2'><button class='btn btn-warning ms-3 w-75' onclick='getTemplateSubCategory(0,".$category->id.")'>Add Sub</button></td></tr></table>";
                return $result;
            })
            ->addColumn('action', function ($category) {
                $button_edit = '<button class="btn btn-warning m-2" onclick="getTemplateCategory(\''. $category->slug .'\')">Edit</button>';
                $button_remove = '<button class="btn btn-danger m-2" onclick="removeCategory(\''. $category->slug .'\')">Delete</button>';
                return $button_edit.$button_remove;
            })
            ->rawColumns(['name', 'subcategory', 'action'])
            ->make(true);
        }
    }
    public function getTemplateEditCategory($slug) {
        $categoryTarger = ProductCategorys::where('slug', $slug)->first();
        if(!$categoryTarger) {
            $categoryTarger = [];
        }
        $contents = \View::make('admin.includes.categorys.edit-category')->with('data', $categoryTarger);
        $response = \Response::make($contents, 200);
        $response->header('Content-Type', 'text/plain');
        return $response;
    }

    public function subTemplateCategory($id = 0, $category_id = 0) {

        $subCategoryTarger = ProductSubCategorys::where('id', $id)->first();
        if(!$subCategoryTarger) {
            $subCategoryTarger = ['category_id'=> $category_id];
        }
        $contents = \View::make('admin.includes.categorys.edit-sub-category')->with('data', $subCategoryTarger);
        $response = \Response::make($contents, 200);
        $response->header('Content-Type', 'text/plain');
        return $response;
    }

    public function subCategory(Request $request) {
        $subCategoryTarger = ProductSubCategorys::where('id', $request->id)->first();
        if( !$subCategoryTarger ) {
            $newSubCategory = new ProductSubCategorys;
            $newSubCategory->name = $request->name;
            $newSubCategory->slug = \Str::slug($request->name);
            $newSubCategory->category_id = $request->category_id;
            $newSubCategory->save();

        }
        else {
            $subCategoryTarger->name = $request->name;
            $subCategoryTarger->slug = \Str::slug($request->name);
            $subCategoryTarger->save();
        }

        return redirect()->route('admin.product.category');
    }
    public function removeCategory($slug) {
        $categoryTarget = ProductCategorys::where('slug', $slug)->first();
        if( !$categoryTarget ) {
            return abort(404);
        }
        $listSubCategory = ProductSubCategorys::where('category_id', $categoryTarget->id)->get();
        foreach($listSubCategory as $sub) {
            $sub->delete();
        }
        $categoryTarget->delete();

        return response()->json(['status' => "000"],204);
    }

    public function removeThumbnail($product_id,$name_thumbnail) {
        $productTarget = Product::findOrFail($product_id);
        $listThumbnails = json_decode($productTarget->thumbnails);
        $thumbnailTargetIndex = array_search($name_thumbnail, $listThumbnails);
        if($thumbnailTargetIndex) {
            array_splice($listThumbnails,$thumbnailTargetIndex,1);
            $fileThumbnailPath = public_path() . "/assets/images/products/" . $name_thumbnail;
            if( file_exists($fileThumbnailPath) ) {
                unlink($fileThumbnailPath);
            }
        }
        $productTarget->thumbnails = json_encode($listThumbnails);
        $productTarget->save();

        return response([],201);
    }

}
