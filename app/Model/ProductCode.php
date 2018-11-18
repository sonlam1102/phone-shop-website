<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductCode extends Model
{
    protected $table = "product_code";

    public function product() {
        return $this->belongsTo('App\Model\Product', 'product_id');
    }

    public static function add_products($product_id, $code, $price) {
        $product_code = new ProductCode();

        $product_code->product_id = $product_id;
        $product_code->code = $code;
        $product_code->price = $price;

        $product_code->save();

        return $product_code->id;
    }
}
