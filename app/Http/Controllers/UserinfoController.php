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
        $newpass = $request->post('newpass');
        $retype_newpass = $request->post('retype_newpass');

        $model = Userinfo::where('user_id', \Auth::user()->id)->first();

        $isChange = 0;
        if ($newpass && $retype_newpass) {
            $isChange = 1;
        }

        $imagePath = \App\Tools\Upload::imgurlUploadProfile($request);

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
            "imagePath" => $imagePath,
            "newpass" => $newpass,
            "retype_newpass" => $retype_newpass
        ];

        $model->update_info($data);
        if ($isChange == 1) {
            \Auth::logout();
            return redirect('/login');
        }

        return redirect('/');
    }
}
