<?php

namespace App\Modules\Manager\Http\Controllers;

use App\Model\Order;
use App\Model\OrderCheck;
use App\Model\Product;
use App\Model\ProductCode;
use App\Model\ProductWarranty;
use App\Model\SubscribedProduct;
use Illuminate\Http\Request;

class OrderController extends ManagerController
{
    public function index() {
        $orders = Order::all();
        $data = $this->getUserInfo();

        return view('manager::order/order')
            ->with('data', $data)
            ->with('order', $orders);
    }

    public function checkOrder(Request $request, $id) {
        $status = $request->post('order_status');
        $order = Order::find($id);

        $order->update_status($status);

        if (!$order->check) {
            OrderCheck::addOrderCheck(\Auth::user()->id, $order->id);
        }

        return redirect()->back();
    }

    public function confirmOrder($id) {
        $order = Order::find($id);
        $data = $this->getUserInfo();

        return view('manager::order/confirm')
            ->with('data', $data)
            ->with('order', $order);
    }

    public function confirm(Request $request, $id) {
        $order = Order::find($id);
        $subscribed_item = $request->post('subscribed_item');
        $subscribed_item = json_decode($subscribed_item);

        $is_correct = true;
        foreach ($subscribed_item as $item) {
            $product_id = $item->product_id;

            $product_codes = [];
            foreach (Product::find($product_id)->codes as $pcode) {
                if (!$pcode->is_sold)
                    array_push($product_codes, $pcode->code);
            }

            foreach ($item->codes as $code) {
                if (!in_array($code, $product_codes)) {
                    $is_correct = false;
                    break;
                }
            }
            if (!$is_correct) {
                break;
            }
        }
        if ($is_correct) {
            foreach ($subscribed_item as $item) {
                foreach ($item->codes as $code) {
                    $product_code = ProductCode::findIdByCode($code);
                    SubscribedProduct::add_subsribed_product($product_code->id, $order->id);
                    ProductWarranty::add_Warranty($product_code->id, date('Y-m-d'));
                }
            }
            $order->confirm();
        }

        return redirect('/manager/order');
    }

    public function review($id) {
        $order = Order::find($id);
        $data = $this->getUserInfo();

        return view('manager::order/review')
            ->with('data', $data)
            ->with('order', $order);
    }
}
