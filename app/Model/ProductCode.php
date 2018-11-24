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

        $product_code->save();

        return $product_code->id;
    }

    public static function findIdByCode($code) {
        return self::select('id')->where('code', '=', $code) ? self::select('id')->where('code', '=', $code)->first() : null;
    }

    public function sold() {
        $this->is_sold = true;

        $this->save();
    }

    public function sold_status() {
        return !$this->is_sold ? "có sẵn" : "không có sẵn";
    }
}
