<?php

namespace App\Modules\Manager\Http\Controllers;

use App\Model\Order;
use App\Model\OrderCheck;
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
}
