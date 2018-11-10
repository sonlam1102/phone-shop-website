<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CartOrder extends Model
{
    protected $table = 'cart_order';

    public static function add_cart_order($data) {
        $cart_order = new CartOrder();

        $cart_order->cart_id = $data['cart_id'];
        $cart_order->order_id = $data['order_id'];

        return $cart_order->save();
    }
}
