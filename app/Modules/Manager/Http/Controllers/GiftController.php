<?php

namespace App\Modules\Manager\Http\Controllers;

use App\Model\ProductGift;
use Illuminate\Http\Request;


class GiftController extends ManagerController
{
    public function index() {
        $gifts = \Auth::user()->manager->company->gifts;
        $data = $this->getUserInfo();

        return view('manager::gift/gift')
            ->with('data', $data)
            ->with('gift', $gifts);
    }

    public function add(Request $request) {
        $discount = $request->post('discount');
        $product = $request->post('product');
        $description = $request->post('description');
        $accessories = $request->post('accessories');

        $data = [
            'discount' => $discount,
            'product' => $product,
            'description' => $description,
            'company' => \Auth::user()->manager->company->id,
            'accessories' => json_decode($accessories)
        ];

        ProductGift::add_gift($data);

        return redirect()->back();
    }

    public function list_accessories($id) {
        $data = $this->getUserInfo();
        $accessories = ProductGift::find($id)->accessories;

        return view('manager::gift/accessories')
            ->with('data', $data)
            ->with('accessories', $accessories);
    }

    public function update(Request $request, $id) {
        $discount = $request->post('discount');
        $description = $request->post('description');
        $status = $request->post('status');

        $product_gift = ProductGift::find($id);

        $data = [
            'discount' => $discount,
            'description' => $description,
            'company' => \Auth::user()->manager->company->id,
            'status' => $status
        ];

        $product_gift->update_gift($data);

        return redirect()->back();
    }
}
