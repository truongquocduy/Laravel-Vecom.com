<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategorys extends Model
{
    use HasFactory;
    protected $fillable = ["*"];

    public function getSub() {
        $listSub = ProductSubCategorys::where('category_id', $this->id)->get()->toArray();
        if( count($listSub) == 0 ) {
            return "Không Subcategory";
        }
        return $listSub;
    }
}
