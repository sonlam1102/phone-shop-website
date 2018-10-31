<?php
namespace App\Tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Upload {
    public static function imageUploadProfile($request, $user_id)
    {
        $file = $request->file('img');

        if (!$file) {
            return null;
        }

        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if(!File::exists(public_path('/image/avatar'))) {
            File::makeDirectory(public_path('/image/avatar'), $mode = 0777, true, true);
        }

        try {
            $imageName = $user_id.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('image/avatar'), $imageName);
            return '/image/avatar/'.$imageName;
        } catch (\Exception $e) {
            return null;
        }
    }

    public static function productImageUpload($request, $product_name)
    {
        $file = $request->file('product_img');
        if (!$file) {
            return null;
        }

        $request->validate([
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if(!File::exists(public_path('/image/product'))) {
            File::makeDirectory(public_path('/image/product'), $mode = 0777, true, true);
        }

        if (!$product_name) {
            $product_name = date("D M d, Y G:i");
        }
        else {
            $product_name = $product_name.date("D M d, Y G:i");
        }

        try {
            $imageName = $product_name.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/image/product'), $imageName);
            return '/image/product/'.$imageName;
        } catch (\Exception $e) {
            return null;
        }
    }
}