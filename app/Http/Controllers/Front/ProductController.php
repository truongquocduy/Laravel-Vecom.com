<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategorys;
use App\Models\User;
use Auth;

class ProductController extends Controller
{
    protected $status;

    public function __construct(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }

    public function index(Request $request){
        if (!$request->search && !$request->s && !$request->f) {
            $products = Product::orderBy('id', 'DESC')
                ->paginate(9);
        }
        else{
            if($request->s) {
                if($request->s == 'trends') {
                    $products = Product::whereColumn('cost', 'price')
                        ->orderBy('purchased', 'DESC')
                        ->paginate(9);
                }
                elseif ($request->s == 'discounts') {
                    $products = Product::whereColumn('cost', '<>', 'price')
                        ->orderBy('purchased', 'DESC')
                        ->paginate(9);
                }
                else {
                    return abort(404);
                }
            }
            elseif($request->f) {
                $products = Product::join('product_sub_categorys', 'products.sub_category', '=', 'product_sub_categorys.id')
                    ->where('product_sub_categorys.slug', $request->f)
                    ->select(['products.*'])
                    ->paginate(9);
            }
            else{
                $products = Product::where('name','like', '%'.$request->search.'%')->paginate(9);
            }
        }
        
        $listCategory = \DB::table('product_categorys')->join('product_sub_categorys', 'product_categorys.id', '=', 'product_sub_categorys.category_id')->select(['product_categorys.name as name', 'product_categorys.slug', 'product_sub_categorys.id','product_sub_categorys.name as subname', 'product_sub_categorys.slug as sub_slug'])->orderBy('product_sub_categorys.category_id', 'ASC')->get();

        $listBuyMost = Product::orderBy('purchased','DESC')
            ->limit(5)
            ->get();

        return view('front.pages.products',['products'=> $products->appends(request()->input()), 'listCategory' => $listCategory, 'listBuyMost' => $listBuyMost]);
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
        // $newProduct->name = "LA MER The Treatment Lotion Hydrating Mask - M???t n??? t??i t???o da";
        // $newProduct->trademark = 1;
        // $newProduct->image = "sp4_1.jpg";
        // $newProduct->thumbnails = "sp4_2.jpg";
        // $newProduct->slug = "la-mer-the-treatment-lotion-hydrating-mask-mat-na-tai-tao-da";
        // $newProduct->price = 620000;
        // $newProduct->cost = 620000;
        // $newProduct->instock = 5;
        // $newProduct->intro = "M???t n??? ???si??u d?????ng da??? ???????c ng??m trong 30ml The Treatment Lotion ngay l???p t???c mang ?????n s??? t??ng c?????ng hydrat ho?? gi??p ch???a l??nh, l??m c??ng ?????y v?? cung c???p n??ng l?????ng cho m???t l??n da s??ng kho??? m???nh ch??? trong v??i ph??t.";
        // $newProduct->details = "M???t n??? t???m v???i c??ng ngh??? ??m s??t c???a Nh???t B???n v?? h??ng tri???u s???i vi m?? tinh khi???t ?????c ????o t??ng c?????ng s??? t???p trung c???a qu?? tr??nh hydrat h??a ch???a l??nh, l??m r???ng r???, ?????y ?????n v?? truy???n v??o da m???t ngu???n n??ng l?????ng m???nh m??? c?? t??c d???ng h???i sinh l??n da ch??? trong t??c t???c.<br>- K???t c???u vi m?? ?????c ????o c???a c??c s???i ph???n l???c tinh khi???t nh??? nh??ng ??m l???y l??n da ????? ch??ng ta c?? th??? ho???t ?????ng trong khi s??? d???ng m???t n???.<br>- ???Thu???c ti??n??? Miracle Broth t??i t???o v?? ph???c h???i c??c ch???c n??ng t??? nhi??n c???a da, l??m m??? c??c khuy???t ??i???m, l??m m???n v?? l??m ?????y r??nh nh??n, se kh??t l??? ch??n l??ng.<br>- Ph???c h???p t??i t???o l??n men ?????c quy???n v???i s??? k???t h???p c???a t???o v?? 73 kho??ng ch???t t??? bi???n cung c???p ????? ???m s??u v?? b??? sung c??c t??? b??o da.<br>- L??m d???u l??n da k??ch ???ng, m???n ????? v?? c???i thi???n k???t c???u da.<br>-Gi???i ph??p cho: da kh??, x???n m??u, m???t k???t c???u, da l??o ho??, ch???y s???...<br>C??ng d???ng ch??nh: d?????ng ???m v?? gi??? ???m, d?????ng s??ng v?? r???ng r???, l??m d???u k??ch ???ng, l??m ?????y c??c r??nh v?? xo?? m??? n???p nh??n...<br>Ph?? h???p v???i m???i lo???i da, k??? c??? da nh???y c???m, k??ch ???ng.<br>S???n xu???t t???i Nh???t B???n";
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
                    $item->user_name = "Ch??a x??c ?????nh";
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
                    $item->user_name = "Ch??a x??c ?????nh";
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

    public function rating() {
        dd("duy");
    }
}
