<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductCart extends Model
{
    protected $table = 'products_cart';

    public function product() {
        return $this->belongsTo('App\Model\Product', 'product_id');
    }

    public function cart() {
        return $this->belongsTo('App\Model\Cart', 'cart_id');
    }

    public function order() {
        return $this->belongsTo('App\Model\Order', 'order_id');
    }

    public static function add_product_cart($product_id, $cart_id) {
        $product_cart = new ProductCart();

        $product_cart->product_id = $product_id;
        $product_cart->cart_id = $cart_id;

        $product_cart->save();
    }
}
