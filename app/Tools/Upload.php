<?php
namespace App\Tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Upload {
    public static function imageUploadProfile($request, $user_id)
    {
        if (!$request->img) {
            return null;
        }

        if(!File::exists('/image/avatar/')) {
            File::makeDirectory('/image/avatar/', $mode = 0777, true, true);
        }

        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $imageName = $user_id.'.'.$request->img->getClientOriginalExtension();
            $request->img->move(public_path('image/avatar'), $imageName);
            return '/image/avatar/'.$imageName;
        } catch (\Exception $e) {
            return null;
        }
    }

    public static function productImageUpload($request, $product_name)
    {
        if (!$request->file('product_img')) {
            return null;
        }

        if(!File::exists('/image/product/')) {
            File::makeDirectory('/image/product/', $mode = 0777, true, true);
        }

        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!$product_name) {
            $product_name = date("D M d, Y G:i");
        }
        else {
            $product_name = $product_name.date("D M d, Y G:i");
        }

        try {
            $imageName = $product_name.'.'.$request->file('product_img')->getClientOriginalExtension();
            $request->img->move(public_path('image/product'), $imageName);
            return '/image/product/'.$imageName;
        } catch (\Exception $e) {
            return null;
        }
    }
}