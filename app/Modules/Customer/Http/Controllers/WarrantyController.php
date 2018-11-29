<?php

namespace App\Modules\Customer\Http\Controllers;

use App\Model\ProductCode;
use App\Model\ProductWarranty;
use App\Model\WarrantyRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class WarrantyController extends CustomerController
{
    public function warranty_request(Request $request) {
        $product_code = $request->post('product_code');
        $reason = $request->post('reason');

        $code = ProductCode::findIdByCode($product_code);

        if ($code) {
            if ($code->warranty) {
                if ($code->warranty_request && in_array($code->current_request()->status, [WarrantyRequest::PENDING, WarrantyRequest::CONFIRM])) {
                    $data = "Sản phẩm Đã yêu cầu bảo hành";
                }
                elseif (date('Y-m-d') >= $code->warranty->from and date('Y-m-d') <= $code->warranty->to) {
                    WarrantyRequest::addRequest(\Auth::user()->id, $code->id, $reason);
                    $data = "Sản phẩm trong thời gian bảo hành. Đã yêu cầu bảo hành";
                }
                else {
                    $data = "Sản phẩm đã hết thời gian bảo hành";
                }
            }
            else {
                $data = "Không có thông tin BH";
            }
        } else {
            $data = "Không có thông tin SP";
        }

        return $data;
    }

    public function cancel($id) {
        $request = WarrantyRequest::find($id);

        $request->cancel();

        return redirect()->back();
    }
}
