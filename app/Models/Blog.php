<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ["*"];

    public function getCreateAt() {
        $date= date_create($this->created_at);
        $day = date_format($date,"d");
        $month = date_format($date,"m");
        $year = date_format($date,"Y");
        return $day. ' Tháng ' . $month . ', ' .$year;
    }

    public function getCommentQty() {
        return 0;
    }

    public function getAuthor() {
        $author = Members::findOrFail($this->author_id);
        return $author->name;
    }
}
