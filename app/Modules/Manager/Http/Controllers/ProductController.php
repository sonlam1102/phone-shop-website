<?php

namespace App\Modules\Manager\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;

class ProductController extends ManagerController
{
    public function index() {
        $product = Product::all();
        $data = $this->getUserInfo();

        return view('manager::product/product')
            ->with('data', $data)
            ->with('product', $product);
    }

    public function add(Request $request) {
        $name = $request->post('name');
        $code = $request->post('code');
        $category = $request->post('category');
        $brand = $request->post('brand');
        $price = $request->post('price');
        $manufacture_date = $request->post('manu_date');
        $attributes = $request->post('attributes');

        $company = \Auth::user()->company->id;
        $product_img = \App\Tools\Upload::productImageUpload($request, $name);
        $data = [
            'name' => $name,
            'code' => $code,
            'category' => $category,
            'brand' => $brand,
            'price' => $price,
            'manufacture_date' => $manufacture_date,
            'company' => $company,
            'img' => $product_img,
            'attributes' => json_decode($attributes)
        ];

        \App\Model\Product::addProduct($data);

        return redirect()->back();
    }

    public function update(Request $request, $id) {
        $name = $request->post('name');
        $code = $request->post('code');
        $category = $request->post('category');
        $brand = $request->post('brand');
        $price = $request->post('price');
        $manufacture_date = $request->post('manu_date');
        $attributes = $request->post('attributes');

        $company = \Auth::user()->company->id;
        $product_img = \App\Tools\Upload::productImageUpload($request, $name);

        $product = Product::find($id);
        $data = [
            'name' => $name,
            'code' => $code,
            'category' => $category,
            'brand' => $brand,
            'price' => $price,
            'manufacture_date' => $manufacture_date,
            'company' => $company,
            'img' => $product_img,
            'attributes' => json_decode($attributes)
        ];

        $product->editProduct($data);

        return redirect()->back();
    }

    public function delete($id) {
        $product = Product::find($id);
        $product->delete();

        return redirect()->back();
    }
}
