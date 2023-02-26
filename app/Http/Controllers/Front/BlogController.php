<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index () {
        $listBlogs = Blog::get();
        return view('front.pages.blogs.blogs', ['listBlogs' => $listBlogs]);
    }

    public function detail( $slug ) {
        $blogTarget = Blog::where('slug',$slug)->first();
        if( !$blogTarget ) {
            return abort(404);
        }
        return view('front.pages.blogs.detail', ['blogTarget' => $blogTarget]);
    }
}
