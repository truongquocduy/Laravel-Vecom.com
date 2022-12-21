<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Auth;

class ProductController extends Controller
{
    public function __construct(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }

    public function index(Request $request){
        if (!$request->search) {
            $products = Product::get();
        }
        else{
            $products = Product::where('name','like', '%'.$request->search.'%')->get();
        }
        return view('front.pages.products',['products'=> $products]);
    }
    public function detail($slug) {
        $productTaret = Product::where('slug',$slug)->first();
        if(!$productTaret) {
            return abort(404);
        }
        return view('front.pages.detail', ['productTarget' => $productTaret]);
    }
    public function create(){
        // $newProduct = new Product;
        // $newProduct->name = "LA MER The Treatment Lotion Hydrating Mask - Mặt nạ tái tạo da";
        // $newProduct->trademark = 1;
        // $newProduct->image = "sp4_1.jpg";
        // $newProduct->thumbnails = "sp4_2.jpg";
        // $newProduct->slug = "la-mer-the-treatment-lotion-hydrating-mask-mat-na-tai-tao-da";
        // $newProduct->price = 620000;
        // $newProduct->cost = 620000;
        // $newProduct->instock = 5;
        // $newProduct->intro = "Mặt nạ “siêu dưỡng da” được ngâm trong 30ml The Treatment Lotion ngay lập tức mang đến sự tăng cường hydrat hoá giúp chữa lành, làm căng đầy và cung cấp năng lượng cho một làn da sáng khoẻ mạnh chỉ trong vài phút.";
        // $newProduct->details = "Mặt nạ tấm với công nghệ ôm sát của Nhật Bản và hàng triệu sợi vi mô tinh khiết độc đáo tăng cường sự tập trung của quá trình hydrat hóa chữa lành, làm rạng rỡ, đầy đặn và truyền vào da một nguồn năng lượng mạnh mẽ có tác dụng hồi sinh làn da chỉ trong tíc tắc.<br>- Kết cấu vi mô độc đáo của các sợi phản lực tinh khiết nhẹ nhàng ôm lấy làn da để chúng ta có thể hoạt động trong khi sử dụng mặt nạ.<br>- “Thuốc tiên” Miracle Broth tái tạo và phục hồi các chức năng tự nhiên của da, làm mờ các khuyết điểm, làm mịn và làm đầy rãnh nhăn, se khít lỗ chân lông.<br>- Phức hợp tái tạo lên men độc quyền với sự kết hợp của tảo và 73 khoáng chất từ biển cung cấp độ ẩm sâu và bổ sung các tế bào da.<br>- Làm dịu làn da kích ứng, mẩn đỏ và cải thiện kết cấu da.<br>-Giải pháp cho: da khô, xỉn màu, mất kết cấu, da lão hoá, chảy sệ...<br>Công dụng chính: dưỡng ẩm và giữ ẩm, dưỡng sáng và rạng rỡ, làm dịu kích ứng, làm đầy các rãnh và xoá mờ nếp nhăn...<br>Phù hợp với mọi loại da, kể cả da nhạy cảm, kích ứng.<br>Sản xuất tại Nhật Bản";
        // $newProduct->material = "Water, Algae (Seaweed) Extract, Glycerin, Methyl Gluceth-20, Bis-Peg-18 Methyl EtherDimethyl Silane, Butylene Glycol, Hypnea Musciformis (Algae) Extract, Sucrose, Propanediol, Sesamum Indicum (Sesame) Seed Oil, Medicago Sativa (Alfalfa) Seed Powder, Helianthus Annuus (Sunflower) Seedcake, Prunus Amygdalus Dulcis (Sweet Almond) Seed Meal, Eucalyptus Globulus (Eucalyptus) Leaf Oil, Sodium Gluconate, Copper Gluconate, Calcium Gluconate, Magnesium Gluconate, Zinc Gluconate, Tocopheryl Succinate, Niacin, Sesamum Indicum (Sesame) Seed Powder, Citrus Aurantifolia (Lime) Peel Extract, Glycine Soja (Soybean) Seed Extract, Acetyl Hexapeptide-8, Acetyl Dipeptide-1 Cetyl Ester, Sea Salt\\Maris Sal\\Sel Marin, Codium Tomentosum Extract, Gelidiella Acerosa Extract, Caffeine, Laminaria Saccharina Extract, Alcaligenes Polysaccharides, Dipotassium Glycyrrhizate, Glycereth-26, Laminaria Digitata Extract, PlanktonExtract, Glycosaminoglycans, Palmaria Palmata Extract, Peg-8, Ethylhexylglycerin, Sodium Pca, Urea, Ppg-5-Ceteth-20, Jojoba Wax Peg-120 Esters, Polysorbate 20, Carbomer, Yeast Extract\\Faex\\Extrait De Levure, Sodium Hyaluronate, Xanthan Gum, Pentylene Glycol, Trehalose, Laureth-3, Hydrolyzed Yeast Protein, Hydroxyethylcellulose, Caprylyl Glycol, Fragrance, Tourmaline, Hydroxypropyl Cyclodextrin, Glycine Soja (Soybean) Protein, Alcohol Denat., Sodium Hydroxide, Lecithin, Polyquaternium-51, Disodium Edta, Citronellol, Geraniol, Hydroxycitronellal, Linalool, Limonene, Potassium Sorbate, Chlorphenesin, Phenoxyethanol.";
        // $newProduct->rating = 4;
        // $newProduct->save();
        // $products = Product::get();
    }

    public function addComment(Request $request) {
        $existProduct = Product::findOrFail($request->product_id);
        if($existProduct) {
            $oldComments = $existProduct->comments;
            if($oldComments === null){
                $oldComments = array();
            }else{
                $oldComments = unserialize(utf8_decode($oldComments));
            }
            $res = new \stdClass;
            $res->user_id = Auth::user()->id;
            $res->content = json_decode($request->ojb_comment)->content;
            $res->image = json_decode($request->ojb_comment)->images;
            $res->create_At = date("H:i d-m-Y");
            $res->status = true;

            array_push($oldComments,$res);
            $existProduct->comments = utf8_encode(serialize($oldComments));
            $existProduct->save();
            $resultComment = array_reverse(unserialize(utf8_decode($existProduct->comments)));
            foreach($resultComment as $item) {
                $detailItem = User::findOrFail($item->user_id);
                if($detailItem){
                    $item->user_name = $detailItem->name;
                }
                else{
                    $item->user_name = "Chưa xác định";
                }
            }
            $data = array(
                'status' => "000",
                'message' => "Success",
                'data' => $resultComment
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
    public function getComment($product_id) {
        $existProduct = Product::findOrFail($product_id);
        if($existProduct) {
            if($existProduct->comments !== null) {
                $oldComments = array_reverse(unserialize(utf8_decode($existProduct->comments)));
            }
            else{
                $oldComments = array();
            }
            foreach($oldComments as $item) {
                $detailItem = User::findOrFail($item->user_id);
                if($detailItem){
                    $item->user_name = $detailItem->name;
                }
                else{
                    $item->user_name = "Chưa xác định";
                }
            }
            $data = array(
                'status' => "000",
                'message' => "Success",
                'data' => $oldComments
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
