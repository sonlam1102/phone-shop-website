<?php

namespace App\Modules\Customer\Http\Controllers;

use App\Model\ProductCode;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class WarrantyController extends CustomerController
{
    public function warranty_check(Request $request) {
        $product_code = $request->post('product_code');

        $code = ProductCode::findIdByCode($product_code);

        if ($code) {
            if ($code->warranty) {
                $data = "Sản phẩm: ".$code->warranty->product->product->name." - "."Thời hạn bảo hành từ: ".$code->warranty->from." đến: ".$code->warranty->to;
            }
            else {
                $data = "Không có thông tin BH";
            }
        } else {
            $data = "Không có thông tin SP";
        }

        return $data;
    }
}
