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

        $model = Userinfo::where('user_id', \Auth::user()->id)->first();

        if (!$model) {
            $model = new Userinfo();

        }
        $model->fullname = $fullname;
        $model->address = $address;
        $model->birthday = $birthday;
        $model->city_id = $city;
        $model->user_id = \Auth::user()->id;
        $model->cmnd = $cmnd;

        $model->save();

        return redirect('/');
    }
}