<?php

namespace App;

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
}
