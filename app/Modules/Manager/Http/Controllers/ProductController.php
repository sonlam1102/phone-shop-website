<?php

namespace App\Modules\Manager\Http\Controllers;

use App\Model\ProductAttributeForm;
use Illuminate\Http\Request;
use App\Model\Product;

class ProductController extends ManagerController
{
    public function index() {
        $product = \Auth::user()->manager->company->products;
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
        $warranty_month = $request->post('warranty_month');

        $company = \Auth::user()->manager->company->id;
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
            'description' => $description,
            'warranty_month' => $warranty_month
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
        $warranty_month = $request->post('warranty_month');

        $company = \Auth::user()->manager->company->id;
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
            'description' => $description,
            'warranty_month' => $warranty_month
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

    public function list_products($id) {
        $product = Product::find($id);
        $data = $this->getUserInfo();

        return view('manager::product/list')
            ->with('data', $data)
            ->with('product', $product);
    }

    public function list_attribute_form($id) {
        $form = ProductAttributeForm::getByCategory($id);

        $data = [];
        if ($form) {
            foreach ($form->attribute_items as $item) {
                $temp = ['attribute' => $item->attribute_id];
                array_push($data, $temp);
            }
        }

        return json_encode($data);
    }
}
