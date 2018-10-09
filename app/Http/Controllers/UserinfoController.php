<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Model\Userinfo;
use Illuminate\Support\Facades\Redirect;

class UserinfoController extends Controller
{
    public function update(Request $request) {
        $fullname = $request->post('fullname');
        $address = $request->post('address');
        $city = $request->post('city');
        $cmnd = $request->post('cmnd');
        $birthday = $request->post('birthday');
        $phone = $request->post('phone');

        $model = Userinfo::where('user_id', \Auth::user()->id)->first();

        $user_id = \Auth::user()->id;

//        try {
//            if ($request->img) {
//                $imageName = $user_id.'.'.$request->img->getClientOriginalExtension();
//                $request->img->move(public_path('image/avatar/'), $imageName);
//
//                $imagePath = '/image/avatar/'.$imageName;
//            }
//            else {
//                $imagePath = null;
//            }
//        } catch (\Exception $e) {
//            $imagePath = null;
//        }
        $imagePath = \App\Tools\Upload::imageUploadProfile($request, \Auth::user()->id);

        if (!$model) {
            $model = new Userinfo();

        }
        $model->fullname = $fullname;
        $model->address = $address;
        $model->birthday = $birthday;
        $model->city_id = $city;
        $model->user_id = \Auth::user()->id;
        $model->cmnd = $cmnd;
        $model->phone = $phone;
        $model->img = $imagePath;

        $model->save();

        return redirect('/');
    }
}
