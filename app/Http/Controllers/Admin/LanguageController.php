<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function languages(Request $request) {
        $path = public_path() . "/assets/languages/KaHVx5OUEY.json";
        $listLanguagues = json_decode(file_get_contents($path), true);
        if ($request->getMethod() == 'GET') {
            return view('admin.pages.language', ['listLanguagues' => $listLanguagues]);
        }
        $newData = [];
        $i = 0;
        foreach($request->all() as $key => $item) {
            if($i != 0) {
                $newData[$key] = $item;
            }
            $i++;
        }
        $newJsonString = json_encode($newData, JSON_PRETTY_PRINT);
        // dd($newJsonString);
        file_put_contents($path, $newJsonString);
        return view('admin.pages.language', ['listLanguagues' => $newData]);
    }

}
