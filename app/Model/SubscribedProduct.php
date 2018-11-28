<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

//Nhung san pham da duoc ban di theo order
class SubscribedProduct extends Model
{
    protected $table = "subscribed_product";

    public function code() {
        return $this->belongsTo('App\Model\ProductCode', 'product_code_id');
    }

    public function order() {
        return $this->belongsTo('App\Model\Order', 'order_id');
    }

    public static function add_subsribed_product($product_code, $order) {
        $subscribed_product = new SubscribedProduct();
        $p_code = ProductCode::find($product_code);

        $subscribed_product->product_code_id = $product_code;
        $subscribed_product->order_id = $order;

        $p_code->sold();
        return $subscribed_product->save();
    }
}
