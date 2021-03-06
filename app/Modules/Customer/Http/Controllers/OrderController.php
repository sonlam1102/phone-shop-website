<?php

namespace App\Modules\Customer\Http\Controllers;

use App\Model\CartOrder;
use App\Model\Order;
use App\Model\OrderCheck;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class OrderController extends CustomerController
{
    public function make_order(Request $request) {
        $name = $request->post('name');
        $address = $request->post('address');
        $phone = $request->post('phone');
        $city_id = $request->post('city');
        $method = $request->post('method');
        $user_id = \Auth::user()->id;
        $total_price = \Auth::user()->current_cart()->total_price();
        $cart_id = \Auth::user()->current_cart()->id;

        $data = [
            'name' => $name,
            'address' => $address,
            'phone' => $phone,
            'city' => $city_id,
            'user' => $user_id,
            'total_price' => $total_price,
            'cart' => $cart_id,
            'method' => $method
        ];

        $order = Order::add_order($data);

        $cart_order = [
            'order_id' => $order,
            'cart_id' => \Auth::user()->current_cart()->id,
        ];
        CartOrder::add_cart_order($cart_order);

        return redirect()->back();
    }

    public function receipt($id) {
        $order = Order::find($id);

        return view('customer::order.receipt')->with('order', $order);
    }

    public function cancel($id) {
        $order = Order::find($id);

        $order->cancel();

        if (!$order->check) {
            OrderCheck::addOrderCheck(\Auth::user()->id, $order->id);
        }

        return redirect()->back();
    }

    public function delivery($id) {
        $order = Order::find($id);

        return view('customer::order.delivery')->with('order', $order);
    }
}
