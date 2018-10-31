<?php
namespace App\Tools;
use Illuminate\Http\Request;

class Upload {
    public static function imageUploadProfile($request, $user_id)
    {
        if (!$request->img) {
            return null;
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
        if (!$request->product_img) {
            return null;
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
            $imageName = $product_name.'.'.$request->product_img->getClientOriginalExtension();
            $request->img->move(public_path('image/product'), $imageName);
            return '/image/product/'.$imageName;
        } catch (\Exception $e) {
            return null;
        }
    }
}