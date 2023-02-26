<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = ["*"];

    public function getImage2() {
        $listThumbnail = json_decode($this->thumbnails);
        if($listThumbnail !== null) {
            $fileImagePath = public_path() . "/assets/images/products/" . $listThumbnail[0];
            if(file_exists( $fileImagePath )) {
                return $listThumbnail[0];
            }
            return 'no-product.jpg';
        }
        return $this->image;
    }

    public function getThumbnail() {
        $listThumbnail = json_decode($this->thumbnails);
        if($listThumbnail !== null) {
            return $listThumbnail;
        }
        return [];
    }
    public function getImageAttribute($value) {
        $fileImagePath = public_path() . "/assets/images/products/" . $value;
        if(file_exists( $fileImagePath )) {
            return $value;
        }
        return 'no-product.jpg';
    } 
}
