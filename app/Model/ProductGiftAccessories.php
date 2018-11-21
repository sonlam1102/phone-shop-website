<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductGiftAccessories extends Model
{
    protected $table = "product_gift_accessories";

    public function product() {
        return $this->belongsTo('App\Model\Product', 'product_id');
    }

    public static function add_accessories($product_gift_id, $product_id, $quantity) {
        $accessories = new ProductGiftAccessories();

        $accessories->product_gift_id = $product_gift_id;
        $accessories->product_id = $product_id;
        $accessories->quantity = $quantity;

        return $accessories->save();
    }
}
