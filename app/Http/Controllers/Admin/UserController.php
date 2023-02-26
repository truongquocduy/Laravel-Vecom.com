<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class UserController extends Controller
{
    public function index() {
        $listUsers = User::get();
        if( \Request::is('*/datatables') ) {
            return Datatables::of($listUsers)
            ->addColumn('image', function ($user) {
                // return '<img class="img-fluid" src="'. asset('assets/images/products/' . $product->image) .'"  width="80px" >';
                return '<img class="img-fluid" src="'. asset('assets/images/logo-icons/undraw_profile.svg') .'"  width="40px" >';
            })
            ->addColumn('address', function ($user) {
                // return '<img class="img-fluid" src="'. asset('assets/images/products/' . $product->image) .'"  width="80px" >';
                return $user->getAddress();
            })
            ->addColumn('phone', function ($user) {
                // return '<img class="img-fluid" src="'. asset('assets/images/products/' . $product->image) .'"  width="80px" >';
                return $user->getPhonePrimary();
            })
            ->addColumn('created_at', function ($user) {
                return date_format($user->updated_at, "Y-m-d H:i:s");
            })
            ->addColumn('action', function ($user) {
                $button_view_all = '<button class="btn btn-outline-success m-2">View All</button>';
                $button_secret_login = '<button class="btn btn-outline-primary m-2">Secret Login</button>';
                $button_edit = '<a href=""><button class="btn btn-outline-warning m-2">Edit</button></a>';
                $button_remove = '<button class="btn btn-outline-danger m-2">Delete</button>';
                return $button_secret_login. $button_view_all . $button_edit .$button_remove;
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
        }
        return view('admin.pages.customers.customer');
    }

    public function loginHard($user_id, Request $request) {
        // $userTarget = User::findOrFail($user_id);
        // Auth::user();
        dd($request::ip());
        return redirect()->route('front.homepage');
    }
}
