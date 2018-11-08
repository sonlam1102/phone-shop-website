<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

    public function products() {
        return $this->hasMany('App\Model\ProductCart', 'cart_id');
    }

    public static function add_new_cart($user_id) {
        $cart = new Cart();

        $cart->user_id = $user_id;
        $cart->save();

        return $cart->id;
    }
}
