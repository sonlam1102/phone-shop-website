<?php

namespace App\Modules\Manager\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;

class ProductController extends ManagerController
{
    public function index() {
        $product = \Auth::user()->company->products;
        $data = $this->getUserInfo();

        return view('manager::product/product')
            ->with('data', $data)
            ->with('product', $product);
    }

    public function add(Request $request) {
        $name = $request->post('name');
        $category = $request->post('category');
        $brand = $request->post('brand');
        $price = $request->post('price');
        $original_price = $request->post('original_price');
        $manufacture_date = $request->post('manu_date');
        $attributes = $request->post('attributes');
        $description = $request->post('description');

        $company = \Auth::user()->company->id;
        $product_img = \App\Tools\Upload::productImageUpload($request, $name);
        $data = [
            'name' => $name,
            'category' => $category,
            'brand' => $brand,
            'price' => $price,
            'original_price' => $original_price,
            'manufacture_date' => $manufacture_date,
            'company' => $company,
            'img' => $product_img,
            'attributes' => json_decode($attributes),
            'description' => $description
        ];

        try {
            \App\Model\Product::addProduct($data);
        }
        catch (\Exception $e) {
            //TODO: Return error
        }

        return redirect()->back();
    }

    public function update(Request $request, $id) {
        $name = $request->post('name');
        $category = $request->post('category');
        $brand = $request->post('brand');
        $price = $request->post('price');
        $original_price = $request->post('original_price');
        $manufacture_date = $request->post('manu_date');
        $attributes = $request->post('attributes');
        $description = $request->post('description');

        $company = \Auth::user()->company->id;
        $product_img = \App\Tools\Upload::productImageUpload($request, $name);

        $product = Product::find($id);
        $data = [
            'name' => $name,
            'category' => $category,
            'brand' => $brand,
            'price' => $price,
            'original_price' => $original_price,
            'manufacture_date' => $manufacture_date,
            'company' => $company,
            'img' => $product_img,
            'attributes' => json_decode($attributes),
            'description' => $description
        ];

        try {
            $product->editProduct($data);
        }
        catch (\Exception $e) {
            //TODO: Return error
        }
        return redirect()->back();
    }

    public function delete($id) {
        $product = Product::find($id);

        try {
            $product->delete();
        }
        catch (\Exception $e) {
            //TODO: Return error
        }

        return redirect()->back();
    }
}
