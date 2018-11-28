<?php

namespace App\Modules\Staff\Http\Controllers;

use App\Model\WarrantyRequest;
use Illuminate\Http\Request;

class WarrantyController extends StaffController
{
    public function index() {
        $request_warranty = WarrantyRequest::all();
        $data = $this->getUserInfo();

        return view('staff::warranty/index')
            ->with('data', $data)
            ->with('requests', $request_warranty);
    }

    public function confirm(Request $request, $id) {
        $status = $request->post('status');

        $warranty_request = WarrantyRequest::find($id);

        if ($status == WarrantyRequest::CONFIRM) {
            $warranty_request->confirm();
        }

        if ($status == WarrantyRequest::SUCCESS) {
            $warranty_request->success();
        }

        if ($status == WarrantyRequest::CANCEL) {
            $warranty_request->cancel();
        }

        return redirect()->back();
    }
}
