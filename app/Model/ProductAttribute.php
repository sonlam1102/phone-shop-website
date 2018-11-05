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

    public static function createAttribute($product_id, $attribute_id, $value) {
        $product_attr = new ProductAttribute();

        $product_attr->product_id = $product_id;
        $product_attr->attribute_id = $attribute_id;
        $product_attr->value = $value;

        return $product_attr->save();
    }

    public function updateAttribute($value, $attribute) {
        $this->value = $value;
        $this->attribute_id = $attribute;

        return $this->save();
    }
}
