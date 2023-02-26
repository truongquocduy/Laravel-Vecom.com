<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class MemberController extends Controller
{
    public function login(Request $request) {
        if ($request->getMethod() == 'GET') {
            return view('admin.pages.login');
        }
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function logout() {
        Auth::guard('admin')->logout();
        // return response()->json(['status'=>"000"],200);
        return redirect()->route('admin.login');
    }
}
