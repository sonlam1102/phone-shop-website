<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

//Gio hang
class Cart extends Model
{
    protected $table = 'cart';

    public function products() {
        return $this->hasMany('App\Model\ProductCart', 'cart_id');
    }

    public function ordered() {
        return $this->hasOne('App\Model\CartOrder', 'cart_id');
    }

    public function total_price() {
        $product = $this->products;

        $total = 0;
        foreach ($product as $item) {
            if ($item->product->gift) {
                $p_price = ($item->product->price * $item->product->gift->discount) / 100;
                $total = $total + (int)$p_price*$item->quantity;
            }
            else {
                $total = $total + (int)$item->product->price*$item->quantity;
            }
        }

        return $total;
    }

    public static function add_new_cart($user_id) {
        $cart = new Cart();

        $cart->user_id = $user_id;
        $cart->save();

        return $cart->id;
    }

    public function make_order($order_id) {
        $this->order_id = $order_id;
        $this->save();
    }
}
