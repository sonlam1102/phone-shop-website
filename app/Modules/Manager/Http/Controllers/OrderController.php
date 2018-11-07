<?php

namespace App\Modules\Manager\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends ManagerController
{
    public function index() {
        $orders = Order::all();
        $data = $this->getUserInfo();

        return view('manager::product/product')
            ->with('data', $data)
            ->with('order', $orders);
    }
}
