<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

//Bao hanh san pham (theo ma san pham)
class ProductWarranty extends Model
{
    protected $table = "warranty";

    public function product() {
        return $this->belongsTo('App\Model\ProductCode', 'product_code_id');
    }

    public static function add_Warranty($product_code_id, $from) {
        $warranty = new ProductWarranty();

        $warranty->product_code_id = $product_code_id;
        $warranty->from = $from;
        $warranty->to = Carbon::parse($warranty->from)->addMonths(ProductCode::find($product_code_id)->product->warranty_month);

        return $warranty->save();
    }

}
