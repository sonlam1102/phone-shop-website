<?php
namespace App\Tools;
use Illuminate\Http\Request;

class Upload {
    public static function imageUploadProfile(Request $request, $user_id)
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
}