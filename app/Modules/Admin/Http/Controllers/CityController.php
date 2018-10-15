<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Model\City;

class CityController extends AdminController
{
    public function index() {
        $city = City::all();
        $data = $this->getUserInfo();

        return view('admin::city/city')
            ->with('city', $city)
            ->with('data', $data);
    }
}
