<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use DataTables;
use Auth;


class BlogController extends Controller
{
    public function __construct(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    
    public function index() {
        $listBlogs = Blog::get();
        if( \Request::is('*/datatables') ) {
            return Datatables::of($listBlogs)
            ->addColumn('image', function ($blog) {
                return '<img src="'. asset('assets/images/blogs/' . $blog->image) .'"  width="300px" >';
            })
            ->addColumn('author', function ($blog) {
                return 'by ' . $blog->getAuthor();
            })
            ->addColumn('view', function ($blog) {
                return $blog->view . ' lượt xem';
            })
            ->addColumn('updated_at', function ($blog) {
                return date_format($blog->updated_at, "Y-m-d H:i:s");
            })
            ->addColumn('action', function ($blog) {
                $button_view_all = '<button class="btn btn-outline-success m-2">View All</button>';
                $button_edit = '<a href="'. route('admin.blog.edit', ['slug' => $blog->slug]) .'"><button class="btn btn-outline-warning m-2">Edit</button></a>';
                $button_remove = '<button class="btn btn-outline-danger m-2" onclick="removeBlog(\''. $blog->slug .'\')">Delete</button>';
                return $button_view_all . $button_edit .$button_remove;
            })
            ->rawColumns(['image' ,'author' , 'view' ,'action'])
            ->make(true);
        }
        return view('admin.pages.blogs.blogs');
    }

    public function create(Request $request) {
        if( $request->isMethod('GET') ) {
            return view('admin.pages.blogs.create');
        }
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required | mimes: jpeg,jpg,png'
        ]);

        $dateTime = new \DateTime();
        $dateTime->setTime(20, 0);
        $timestamp = $dateTime->getTimestamp();
        $newBlog = new Blog;
        $newBlog->title = $request->title;
        $newBlog->slug = \Str::slug($request->title . "_" . $timestamp);
        $newBlog->content = $request->content;
        $newBlog->author_id = Auth::guard('admin')->user()->id;
        $newBlog->view = 0;
        $hinh = $request->file('image');
        $nameimg = $hinh->getClientOriginalName();
        $hinh->move("assets/images/blogs", $nameimg); // chưa xử lý trường hợp tên file bị trùng
        $newBlog->image = $nameimg;
        $newBlog->save();
        $response = [
            'code' => 201,
            'status' => "000",
            'message' => "Tạo thành công !!!"
        ];
        return response()->json($response,$response['code']);
    }

    public function edit (Request $request, $slug ) {
        $blogTarget = Blog::where('slug', $slug)->first();
        if( !$blogTarget ) {
            return abort(404);
        }
        if( $request->isMethod('GET') ) {
            return view('admin.pages.blogs.edit', ['blogTarget' => $blogTarget]);
        }
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'mimes: jpeg,jpg,png'
        ]);
        $blogTarget->title = $request->title;
        if($request->title != $blogTarget->title) {
            $blogTarget->slug = \Str::slug($request->title);
        }
        $blogTarget->content = $request->content;
        
        if($hinh = $request->file('image')) {
            //Xóa hình cũ
            $fileImagePath = public_path() . "/assets/images/blogs/" . $blogTarget->image;
            if(file_exists( $fileImagePath )) {
                unlink($fileImagePath);
            }
            $nameimg = $hinh->getClientOriginalName();
            $hinh->move("assets/images/blogs", $nameimg);
            $blogTarget->image = $nameimg;
        }
        $blogTarget->save();

        $response = [
            'code' => 201,
            'status' => "000",
            'message' => "Cập nhật thành công !!!"
        ];
        return response()->json($response,$response['code']);
    }

    public function remove($slug) {
        $blogTarget = Blog::where('slug', $slug)->first();
        if( !$blogTarget ) {
            return abort(404);
        }
        $fileImagePath = public_path() . "/assets/images/blogs/" . $blogTarget->image;
        if(file_exists( $fileImagePath )) {
            unlink($fileImagePath);
        }
        $blogTarget->delete();

        $response = [
            'code' => 201,
            'status' => "000",
            'message' => "Xoá thành công !!!"
        ];
        return response()->json($response,$response['code']);
    }
}
