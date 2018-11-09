<?php

namespace App\Modules\Customer\Http\Controllers;

use App\Model\Order;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class OrderController extends CustomerController
{
    public function make_order(Request $request) {
        $name = $request->post('name');
        $address = $request->post('address');
        $phone = $request->post('phone');
        $city_id = $request->post('city');
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
            'cart' => $cart_id
        ];

        $order = Order::add_order($data);
        \Auth::user()->current_cart()->make_order($order);

        return redirect()->back();
    }
}
