<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Model\Brand;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class BrandController extends AdminController
{
    public function index() {
        $brand = Brand::all();
        $data = $this->getUserInfo();

        return view('admin::brand/brand')
            ->with('brand', $brand)
            ->with('data', $data);
    }

    public function add(Request $request) {
        $name = $request->post('name');
        $category = $request->post('category');

        $data = [
            'name' => $name,
            'category' => $category
        ];

        Brand::addBrand($data);

        return redirect()->back();
    }

    public function update(Request $request, $id) {
        $brand = Brand::find($id);

        $name = $request->post('name');
        $category = $request->post('category');

        $data = [
            'name' => $name,
            'category' => $category
        ];

        $brand->updateBrand($data);

        return redirect()->back();
    }

    public function delete($id) {
        $brand = Brand::find($id);

        $brand->delete();

        return redirect()->back();
    }
}
