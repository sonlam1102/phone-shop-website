<?php

namespace App\Modules\Staff\Http\Controllers;

use App\Model\Import;
use App\Model\ProductCode;
use App\Model\ProductImport;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Model\Product;

class ProductController extends StaffController
{
    public function index() {
        $product = \Auth::user()->staff_info->company->products;
        $data = $this->getUserInfo();

        return view('staff::product/product')
            ->with('data', $data)
            ->with('product', $product);
    }

    public function import(Request $request) {
        $data = $request->post('data');

        $product_data = json_decode($data);

        $import = Import::add_import(\Auth::user()->id, \Auth::user()->staff_info->company->id);

        foreach ($product_data as $item) {
            $product_code_id = ProductCode::add_products($item->product_id, $item->code, $item->price);
            ProductImport::add_product_import($import, $product_code_id);
        }

        return redirect()->back();
    }

    public function list_products($id) {
        $product = Product::find($id);
        $data = $this->getUserInfo();

        return view('staff::product/list')
            ->with('data', $data)
            ->with('product', $product);
    }
}