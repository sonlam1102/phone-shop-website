<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Userinfo;

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

        $imagePath = \App\Tools\Upload::imageUploadProfile($request, \Auth::user()->id);

        if (!$model) {
            $model = new Userinfo();

        }

        $data = [
            "fullname" => $fullname,
            "address" => $address,
            "birthday" => $birthday,
            "user_id"=> \Auth::user()->id,
            "city_id" => $city,
            "cmnd" => $cmnd,
            "phone" => $phone,
            "imagePath" => $imagePath
        ];

        $model->update_info($data);

        return redirect('/');
    }
}
