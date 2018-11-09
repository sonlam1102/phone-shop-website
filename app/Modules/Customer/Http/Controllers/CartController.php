<?php

namespace App\Modules\Customer\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\ProductCart;

class CartController extends CustomerController
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

    public function update_product_cart(Request $request) {
        $data = $request->post('data');

        foreach ($data as $item) {
            $product_cart = ProductCart::find($item['id']);
            if ($product_cart) {
                $product_cart->update_product_quantity($item['quantity']);
            }
        }
    }

    public function delete_cart($id) {
        $product_card = ProductCart::find($id);
        $product_card->delete();
    }
}
