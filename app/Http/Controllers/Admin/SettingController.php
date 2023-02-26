<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use DataTables;

class SettingController extends Controller
{
    public function homepage(Request $request) {
        if($request->isMethod('GET')) {
            $listBanners = Setting::where('page', 'homepage')
                ->where('title', 'like', 'banner-%')
                ->orWhere('title', 'like', 'background-%')
                ->get();
            return view('admin.pages.settings.homepage', ['listBanners' => $listBanners]);
        }
        $settingTarger = Setting::where('title', $request->title)->first();
        if(!$settingTarger) {
            return abort(404);
        }
        $settingTarger->name = $request->name;
        if($request->value) {
            $fileImagePath = public_path() . "/assets/images/banners/" . $settingTarger->value;
            if(file_exists( $fileImagePath )) {
                unlink($fileImagePath);
            }
            $hinh = $request->file('value');
            $nameimg = $hinh->getClientOriginalName();
            $hinh->move("assets/images/banners", $settingTarger->title. $nameimg);
            $settingTarger->value = $settingTarger->title. $nameimg;
        }
        if(!$request->status) {
            $settingTarger->status = 0;
        }
        else {
            $settingTarger->status = 1;
        }
        $settingTarger->save();
        return redirect()->route('admin.setting.homepage');
        
    }
    public function datatables (Request $request) {
        $listSlider = Setting::where('page', 'homepage')
            ->where('title', 'like' , 'slider%')
            ->get();
        if( $request->c == 'sliders' ) {
            return Datatables::of($listSlider)
            ->addColumn('image', function ($item) {
                return '<img src="'. asset('assets/images/banners/' . $item->value) .'"  width="300px" >';
            })
            ->addColumn('status', function ($item) {
                if($item->status) {
                    return '<span class="badge bg-primary">Actived</span>';
                }
                else {
                    return '<span class="badge bg-warning">Vô hiệu hóa</span>';
                }
            })
            ->addColumn('action', function ($item) {
                $button_edit = '<button class="btn btn-success m-2 w-75" onclick="getTemplateEdit(\''.$item->title.'\', \'slider-edit\')">Edit</button>';
                $button_remove = ' <button class="btn btn-warning m-2 w-75"><i class="fa-solid fa-trash"></i></button>';
                return $button_edit .$button_remove;
            })
            ->rawColumns(['image', 'status' ,'action'])
            ->make(true);
        }
    }
    public function getSetting ($title) {
        $settingTarger = Setting::where('title', $title)->first();
        if(!$settingTarger) {
            return abort(404);
        }
        $contents = \View::make('admin.includes.settings.slider-detail')->with('data', $settingTarger);
        $response = \Response::make($contents, 200);
        $response->header('Content-Type', 'text/plain');
        return $response;
    }

    public function master(Request $request) {
        if($request->isMethod('GET')) {
            $settingMaster = Setting::where('page', 'master')
                ->get();
            return view('admin.pages.settings.master', ['settingMaster' => $settingMaster]);
        }
        foreach($request->all() as $key=>$setting) {
            $settingTarger = Setting::where('title', $key)->first();
            if($settingTarger !== null) {
                if($settingTarger->value != $setting && $key != 'website-logo-header' && $key != 'website-logo-footer' && $key != 'website-logo-leader') {
                    $settingTarger->value = $setting;
                    $settingTarger->save();
                }
            }
        }

        $listLogo = array_filter($request->all(), function($k) {
            return strpos($k,"website-logo") !== false;
        }, ARRAY_FILTER_USE_KEY);
        
        foreach($listLogo as $key => $setting) {
            $settingTarger = Setting::where('title', $key)->first();
            if($settingTarger !== null) {
                $fileImagePath = public_path() . "/assets/images/logo-icons/" . $settingTarger->value;
                if(file_exists( $fileImagePath )) {
                    unlink($fileImagePath);
                }
                $nameIMG = $setting->getClientOriginalName();
                $setting->move("assets/images/logo-icons",$key.'-'.$nameIMG);
                $settingTarger->value = $key.'-'.$nameIMG;
                $settingTarger->save();
            }
        }
        return redirect()->route('admin.setting.master');
    }
}
