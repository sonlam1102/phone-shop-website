<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $table = 'product_attributes';

    public function product() {
        return $this->belongsTo('App\Model\Product', 'product_id');
    }

    public function attribute() {
        return $this->belongsTo('App\Model\Attribute', 'attribute_id');
    }
}
