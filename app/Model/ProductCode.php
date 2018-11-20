<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

//Ma san pham (thuc the san pham - so imei, so seri)
class ProductCode extends Model
{
    protected $table = "product_code";

    public function product() {
        return $this->belongsTo('App\Model\Product', 'product_id');
    }

    public function warranty() {
        return $this->hasOne('App\Model\ProductWarranty', 'product_code_id');
    }

    public static function add_products($product_id, $code) {
        $product_code = new ProductCode();

        $product_code->product_id = $product_id;
        $product_code->code = $code;
        $product_code->price = Product::find($product_id)->original_price;

        $product_code->save();

        return $product_code->id;
    }
}
