<?php

namespace App\Modules\Customer\Http\Controllers;

use App\Model\Cart;
use App\Model\ProductCart;
use Illuminate\Http\Request;

use App\Http\Controllers\HomeController;

class CustomerController extends HomeController
{
    public function add_cart($id) {
        $customer = \Auth::user();

        $current_cart = $customer->carts ?  $customer->carts->where('user_id','=', \Auth::user()->id)->where('order_id', null)->first() : null;

        if (!$current_cart) {
            $cart = Cart::add_new_cart(\Auth::user()->id);
        }
        else {
            $cart = $current_cart->id;
        }

        ProductCart::add_product_cart($id, $cart);
    }
}
