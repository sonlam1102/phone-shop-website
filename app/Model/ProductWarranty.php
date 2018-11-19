<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

//Bao hanh san pham (theo ma san pham)
class ProductWarranty extends Model
{
    protected $table = "warranty";

    public function product() {
        return $this->belongsTo('App\Model\ProductCode', 'product_code_id');
    }

    public static function add_Warranty($product_code_id, $month) {
        $warranty = new ProductWarranty();

        $warranty->product_code_id = $product_code_id;
        $warranty->month = $month;

        return $warranty->save();
    }

    public function update_warranty($month) {
        $this->month = $month;

        return $this->save();
    }
}
