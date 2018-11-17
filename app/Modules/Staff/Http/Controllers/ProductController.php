<?php

namespace App\Modules\Staff\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Model\Product;

class ProductController extends StaffController
{
    public function index() {
        $product = Product::all();
        $data = $this->getUserInfo();

        return view('staff::product/product')
            ->with('data', $data)
            ->with('product', $product);
    }
}
