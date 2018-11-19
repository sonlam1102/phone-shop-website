<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

//San pham nhap vao theo phieu nhap
class ProductImport extends Model
{
    protected $table = "product_import";

    public function import() {
        return $this->belongsTo('App\Model\Import', 'import_id');
    }

    public function product_code() {
        return $this->belongsTo('App\Model\ProductCode', 'product_code_id');
    }

    public static function add_product_import($import_id, $product_code_id) {
        $product_import = new ProductImport();

        $product_import->import_id = $import_id;
        $product_import->product_code_id = $product_code_id;

        return $product_import->save();
    }
}
