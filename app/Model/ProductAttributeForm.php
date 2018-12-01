<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeForm extends Model
{
    protected $table = "product_attribute_form";

    public function attributes() {
        return $this->hasMany('App\Model\AttributeFormItem', 'product_attribute_form_id');
    }

    public function cateogry() {
        return $this->belongsTo('App\Model\Category', 'category_id');
    }

    public function makeForm($name, $category) {
        $product_form = new ProductAttributeForm();

        $product_form->name = $name;
        $product_form->category_id = $category;

        $product_form->save();

        return $product_form->id;
    }
}
