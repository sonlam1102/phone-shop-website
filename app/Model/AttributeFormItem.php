<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AttributeFormItem extends Model
{
    protected $table = "attribute_form_item";

    public function form() {
        return $this->belongsTo('App\Model\ProductAttributeForm', 'product_attribute_form_id');
    }

    public function attribute() {
        return $this->belongsTo('App\Model\Attribute', 'attribute_id');
    }

    public static function addItem($form, $attribute) {
        $attribute_item = new AttributeFormItem();

        $attribute_item->product_attribute_form_id = $form;
        $attribute_item->attribute_id = $attribute;

        return $attribute_item->save();
    }

}
