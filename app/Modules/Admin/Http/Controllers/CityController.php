<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Model\City;
use Illuminate\Http\Request;

class CityController extends AdminController
{
    public function index() {
        $city = City::all();
        $data = $this->getUserInfo();

        return view('admin::city/city')
            ->with('city', $city)
            ->with('data', $data);
    }

    public function add(Request $request) {
        $name_city = $request->post('name_city');
        $code_city = $request->post('code_city');

        $data = [
            'name' => $name_city,
            'code' => $code_city
        ];

        $city_model = new City();
        $city_model->update_city($data);

        return redirect()->back();
    }

    public function update(Request $request, $id) {
        $name_city = $request->post('name_city');
        $code_city = $request->post('code_city');

        $data = [
            'name' => $name_city,
            'code' => $code_city
        ];

        $city_data = City::find($id);

        $city_data->update_city($data);

        return redirect()->back();
    }

    public function delete($id) {
        $city_data = City::find($id);

        $city_data->delete();

        return redirect()->back();
    }
}
