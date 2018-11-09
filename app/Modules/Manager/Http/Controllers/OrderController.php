<?php

namespace App\Modules\Manager\Http\Controllers;

use App\Model\Order;
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
}
