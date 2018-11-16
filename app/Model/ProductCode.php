<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductCode extends Model
{
    protected $table = "product_code";

    public function product() {
        return $this->belongsTo('App\Model\Product', 'product_id');
    }
}
